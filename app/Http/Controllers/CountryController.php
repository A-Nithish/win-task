<?php


namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|unique:countries',
        ]);

        Country::create($request->only('country_name'));

        return redirect()->route('countries.index')->with('success', 'Country added!');
    }

    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'country_name' => 'required|unique:countries,country_name,' . $country->id,
        ]);

        $country->update($request->only('country_name'));

        return redirect()->route('countries.index')->with('success', 'Country updated!');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('success', 'Country deleted!');
    }

    public function show($id)
    {
    $country = Country::findOrFail($id);
    return view('countries.show', compact('country'));
    }

}
