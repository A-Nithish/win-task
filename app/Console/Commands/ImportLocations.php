<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-locations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import countries, states & cities from JSON';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 1) Read JSON file
        $path = storage_path('app/countries+states+cities.json');
        if (!file_exists($path)) {
            $this->error("JSON file not found at {$path}");
            return 1;
        }
        $json = file_get_contents($path);
        $data = json_decode($json, true);
        if (!$data) {
            $this->error("Invalid JSON data");
            return 1;
        }

        // 2) Bulk insert countries
        $now = now();
        $countriesPayload = [];
        foreach ($data as $country) {
            $countriesPayload[] = [
                'country_name' => $country['country_name'],
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        DB::table('countries')->insertOrIgnore($countriesPayload);
        $this->info('Countries imported: ' . count($countriesPayload));

        // 3) Build map of country names → ids
        $countryMap = DB::table('countries')->pluck('id', 'country_name')->toArray();

        // 4) Bulk insert states
        $statesPayload = [];
        foreach ($data as $country) {
            $cId = $countryMap[$country['country_name']];
            foreach ($country['states'] as $state) {
                $statesPayload[] = [
                    'country_id'  => $cId,
                    'state_name'  => $state['state_name'],
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ];
            }
        }
        DB::table('states')->insertOrIgnore($statesPayload);
        $this->info('States imported: ' . count($statesPayload));

        // 5) Build map of state names → ids
        $stateMap = DB::table('states')->pluck('id', 'state_name')->toArray();

        // 6) Bulk insert cities
        $citiesPayload = [];
        foreach ($data as $country) {
            foreach ($country['states'] as $state) {
                $sId = $stateMap[$state['state_name']];
                foreach ($state['cities'] as $city) {
                    $citiesPayload[] = [
                        'state_id'   => $sId,
                        'city_name'  => $city['city_name'],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
        }
        DB::table('cities')->insertOrIgnore($citiesPayload);
        $this->info('Cities imported: ' . count($citiesPayload));

        $this->info('All done!');
        return 0;
    }
}
