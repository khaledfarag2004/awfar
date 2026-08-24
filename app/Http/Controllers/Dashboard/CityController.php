<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Citys\CreateCityRequest;
use App\Http\Requests\Dashboard\Citys\UpdateCityRequest;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::paginate(10);
        return view('Dashboard.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('Dashboard.cities.create');
    }

    public function store(CreateCityRequest $request)
    {
        $data = $request->validated();

        City::create($data);

        return redirect()->route('cities.index')->with('success', 'City created successfully');
    }

    public function edit(City $city)
    {
        return view('Dashboard.cities.edit', compact('city'));
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        $data = $request->validated();

        $city->update($data);

        return redirect()->route('cities.index')->with('success', 'City updated successfully');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'City deleted successfully');
    }
}
