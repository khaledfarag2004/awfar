<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Term;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Term::latest()->get();
        return view('dashboard.terms.index', compact('terms'));
    }
}
