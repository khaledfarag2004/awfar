<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\About\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('dashboard.about.index', compact('abouts'));
    }

    public function show($locale,$id)
    {
        $about = About::findOrFail($id);
        return view('Dashboard.About.show', compact('about'));
    }

    public function edit($locale,$id)
    {
        $about = About::findOrFail($id);
        return view('Dashboard.About.edit', compact('about'));
    }

    public function update(UpdateAboutRequest $request,$locale, $id)
    {
        $about = About::findOrFail($id);

        $request->validated();

        $imageName = $about->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $about->update([
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('about.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_about_updated'));
    }

}
