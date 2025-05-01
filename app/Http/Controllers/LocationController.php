<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Country;
use App\Models\State;
use App\Models\City;

class LocationController extends Controller
{
    public function getCountries(Request $request)
    {
        $query = Country::query();

        if ($request->has('search')) {
            $query->where('country_name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->orderBy('country_name')->get());
    }

    public function getStates(Request $request)
    {
        $query = State::query();

        if ($request->has('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if ($request->has('search')) {
            $query->where('state_name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->orderBy('state_name')->get());
    }

    public function getCities(Request $request)
    {
        $query = City::query();

        if ($request->has('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        if ($request->has('search')) {
            $query->where('city_name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->orderBy('city_name')->get());
    }
}
