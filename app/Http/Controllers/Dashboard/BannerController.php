<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Banner\CreateBannerRequest;
use App\Http\Requests\Dashboard\Banner\UpdateBannerRequest;
use Illuminate\Http\Request;
use App\Models\Banner;
class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::paginate(10);
        return view('Dashboard.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('Dashboard.banners.create');
    }

    public function store(CreateBannerRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/img/banners', 'public');
        }

        Banner::create($data);
        return redirect()->route('banners.index')->with('success', 'Banner created successfully');
    }

    public function edit(Banner $banner)
    {
        return view('Dashboard.banners.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/img/banners', 'public');
        }

        $banner->update($data);
        return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully');
    }
}
