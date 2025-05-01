<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country; // Add this line to import Country model
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        // Start query to fetch cities
        $query = City::with('state.country'); // Make sure to load country with the state
    
        // Search by city name
        if ($request->filled('city_name')) {
            $query->where('city_name', 'like', '%' . $request->city_name . '%');
        }
    
        // Filter by state
        if ($request->filled('state_id')) {
            $query->where('state_id', $request->state_id);
        }
    
        // Filter by country
        if ($request->filled('country_id')) {
            $query->whereHas('state', function ($q) use ($request) {
                $q->where('country_id', $request->country_id);
            });
        }
    
        // Fetch filtered cities
        $cities = $query->latest()->paginate(10);
        
        // Fetch states and countries for filters
        $states = State::all();
        $countries = Country::all(); // Ensure the Country model is available

        return view('cities.index', compact('cities', 'states', 'countries'));
    }
    

    public function create()
    {
        $states = State::all();
        return view('cities.create', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'city_name' => 'required|string|max:255'
        ]);

        City::create($request->only('state_id', 'city_name'));

        return redirect()->route('cities.index')->with('success', 'City added successfully.');
    }

    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        $states = State::all();
        return view('cities.edit', compact('city', 'states'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'city_name' => 'required|string|max:255'
        ]);

        $city->update($request->only('state_id', 'city_name'));

        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
