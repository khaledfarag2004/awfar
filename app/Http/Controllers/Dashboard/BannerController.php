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

    public function create($locale)
    {
        return view('Dashboard.banners.create');
    }

    public function store(CreateBannerRequest $request,$locale)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/img/banners', 'public');
        }

        Banner::create($data);
        return redirect()->route('banners.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_banner_created'));
    }

    public function edit(Banner $banner,$locale)
    {
        return view('Dashboard.banners.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request,$locale, Banner $banner)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/img/banners', 'public');
        }

        $banner->update($data);
        return redirect()->route('banners.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_banner_updated'));
    }

    public function destroy(Banner $banner,$locale)
    {
        $banner->delete();
        return redirect()->route('banners.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_banner_deleted'));
    }
}
