<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Partner;
use App\Models\Career;
use App\Models\Faq;
use App\Models\ContactMessage;

class CompanyController extends Controller
{
    public function about()
    {
        $teamMembers = TeamMember::where('is_active', true)->get();
        $partners = Partner::where('is_active', true)->get();
        $timelineEvents = \App\Models\TimelineEvent::where('is_active', true)->orderBy('year', 'asc')->get();
        $certifications = \App\Models\Certification::where('is_active', true)->get();
        
        return view('pages.about', compact('teamMembers', 'partners', 'timelineEvents', 'certifications'));
    }

    public function careers()
    {
        $careers = Career::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('pages.careers', compact('careers'));
    }

    public function faq()
    {
        $faqs = Faq::where('is_active', true)->get();
        return view('pages.faq', compact('faqs'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string'
        ]);

        $validated['status'] = 'new';
        $validated['is_active'] = true;

        ContactMessage::create($validated);

        return redirect()->back()->with('success', __('Your message has been sent successfully. Our team will contact you shortly.'));
    }
}
