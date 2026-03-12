<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::all();
        return view('frontend.body.index', compact('heroSections'));
    }
}

