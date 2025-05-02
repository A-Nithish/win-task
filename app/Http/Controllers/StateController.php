<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $query = State::with('country');
    
        if ($request->filled('state_name')) {
            $query->where('state_name', 'like', '%' . $request->state_name . '%');
        }
    
        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }
    
        $states = $query->paginate(10);
        $countries = Country::all();
    
        return view('states.index', compact('states', 'countries'));
    }
    

    public function create()
    {
        $countries = Country::all();
        return view('states.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'state_name' => 'required|string|max:255',
        ]);

        State::create($request->all());

        return redirect()->route('states.index')->with('success', 'State added successfully!');
    }

    public function edit(State $state)
    {
        $countries = Country::all(); 
        return view('states.edit', compact('state', 'countries'));
    }

    public function update(Request $request, State $state)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'state_name' => 'required|string|max:255',
        ]);

        $state->update($request->all());

        return redirect()->route('states.index')->with('success', 'State updated successfully!');
    }

    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('success', 'State deleted successfully!');
    }

    public function show($id)
   {
    $state = State::with('cities', 'country')->findOrFail($id);
    return view('states.show', compact('state'));
   }

}
