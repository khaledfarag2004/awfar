<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return response()->json([
            'success' => true,
            'message' => 'حول اوفر...',
            'data' => $about
        ]);
    }
}
