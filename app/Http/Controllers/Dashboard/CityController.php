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

    public function create($locale)
    {
        return view('Dashboard.cities.create');
    }

    public function store($locale,CreateCityRequest $request)
    {
        $data = $request->validated();

        City::create($data);

        return redirect()->route('cities.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_city_created'));
    }

    public function edit($locale,City $city)
    {
        return view('Dashboard.cities.edit', compact('city'));
    }

    public function update(UpdateCityRequest $request,$locale, City $city)
    {
        $data = $request->validated();

        $city->update($data);

        return redirect()->route('cities.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_city_updated'));
    }

    public function destroy($locale,City $city)
    {
        $city->delete();
        return redirect()->route('cities.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_city_deleted'));
    }
}
