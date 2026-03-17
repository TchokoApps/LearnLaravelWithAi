<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureSection;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the feature sections.
     */
    public function index()
    {
        $sections = FeatureSection::orderBy('display_order')->get();
        return view('admin.feature-sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new feature section.
     */
    public function create()
    {
        return view('admin.feature-sections.create');
    }

    /**
     * Store a newly created feature section in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'feature_title' => 'required|string|max:255',
            'feature_description' => 'required|string',
            'feature_icon' => 'nullable|image|mimes:jpeg,png,gif,svg|max:2048',
            'display_order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('feature_icon')) {
            $path = $request->file('feature_icon')->store('feature-sections/', 'public');
            $validated['feature_icon'] = $path;
        }

        FeatureSection::create($validated);

        return redirect()->route('admin.feature-sections.index')
            ->with('success', 'Feature Section created successfully.');
    }

    /**
     * Display the specified feature section.
     */
    public function show(FeatureSection $featureSection)
    {
        return view('admin.feature-sections.show', compact('featureSection'));
    }

    /**
     * Show the form for editing the specified feature section.
     */
    public function edit(FeatureSection $featureSection)
    {
        return view('admin.feature-sections.edit', compact('featureSection'));
    }

    /**
     * Update the specified feature section in storage.
     */
    public function update(Request $request, FeatureSection $featureSection)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'feature_title' => 'required|string|max:255',
            'feature_description' => 'required|string',
            'feature_icon' => 'nullable|image|mimes:jpeg,png,gif,svg|max:2048',
            'display_order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('feature_icon')) {
            $path = $request->file('feature_icon')->store('feature-sections/', 'public');
            $validated['feature_icon'] = $path;
        }

        $featureSection->update($validated);

        return redirect()->route('admin.feature-sections.index')
            ->with('success', 'Feature Section updated successfully.');
    }

    /**
     * Remove the specified feature section from storage.
     */
    public function destroy(FeatureSection $featureSection)
    {
        $featureSection->delete();

        return redirect()->route('admin.feature-sections.index')
            ->with('success', 'Feature Section deleted successfully.');
    }
}
