<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    public function index()
    {
        return view('dashboard.terms.index');
    }
}
