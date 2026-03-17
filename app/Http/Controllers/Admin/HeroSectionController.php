<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSections = HeroSection::all();
        return view('admin.hero-sections.index', compact('heroSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_shape' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('hero', 'public');
        }

        if ($request->hasFile('hero_shape')) {
            $validated['hero_shape'] = $request->file('hero_shape')->store('hero', 'public');
        }

        HeroSection::create($validated);

        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSection $heroSection)
    {
        return view('admin.hero-sections.show', compact('heroSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $heroSection)
    {
        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSection $heroSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_shape' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'delete_hero_image' => 'nullable|boolean',
            'delete_hero_shape' => 'nullable|boolean',
        ]);

        // Delete hero_image if checkbox is checked
        if ($request->has('delete_hero_image') && $heroSection->hero_image) {
            \Storage::disk('public')->delete($heroSection->hero_image);
            $validated['hero_image'] = null;
        } elseif ($request->hasFile('hero_image')) {
            // Delete old image before storing new one
            if ($heroSection->hero_image) {
                \Storage::disk('public')->delete($heroSection->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('hero', 'public');
        }

        // Delete hero_shape if checkbox is checked
        if ($request->has('delete_hero_shape') && $heroSection->hero_shape) {
            \Storage::disk('public')->delete($heroSection->hero_shape);
            $validated['hero_shape'] = null;
        } elseif ($request->hasFile('hero_shape')) {
            // Delete old shape before storing new one
            if ($heroSection->hero_shape) {
                \Storage::disk('public')->delete($heroSection->hero_shape);
            }
            $validated['hero_shape'] = $request->file('hero_shape')->store('hero', 'public');
        }

        $heroSection->update($validated);

        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $heroSection)
    {
        $heroSection->delete();
        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section deleted successfully!');
    }
}

