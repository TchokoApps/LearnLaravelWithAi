<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FaqController extends Controller
{
    /**
     * Display a listing of the faqs.
     */
    public function index(): View
    {
        $faqs = Faq::ordered()->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new faq.
     */
    public function create(): View
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created faq in storage.
     */
    public function store(StoreFaqRequest $request): RedirectResponse
    {
        Faq::create($request->validated());
        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully!');
    }

    /**
     * Show the form for editing the specified faq.
     */
    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified faq in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq): RedirectResponse
    {
        $faq->update($request->validated());
        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified faq from storage.
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully!');
    }

    /**
     * Get FAQs for frontend display (JSON API).
     */
    public function getFaqs()
    {
        $faqs = Faq::active()->ordered()->get();
        return response()->json($faqs);
    }
}
