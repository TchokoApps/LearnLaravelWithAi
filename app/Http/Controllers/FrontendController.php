<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\FeatureSection;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::all();
        $featureSections = FeatureSection::active()->get();
        return view('frontend.body.index', compact('heroSections', 'featureSections'));
    }
}

