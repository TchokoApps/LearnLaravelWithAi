<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FeatureSection;

class FeatureSectionController extends Controller
{
    /**
     * Display smart financial sections for frontend
     */
    public function index()
    {
        $sections = FeatureSection::active()->get();

        // Group by section title to get the section heading
        $groupedSections = $sections->groupBy('section_title');

        return view('frontend.sections.smart-financial', compact('sections', 'groupedSections'));
    }
}
