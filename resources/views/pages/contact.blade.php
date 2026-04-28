@extends('layouts.app')

@section('title', 'Contact Us - ATS')

@section('content')
    <main class="max-w-[1280px] mx-auto px-6 md:px-10 py-16 md:py-24">
        
        <div class="text-center mb-16">
            <h1 class="text-[40px] md:text-[56px] font-space font-bold text-dark leading-tight tracking-tight mb-4">Get in Touch</h1>
            <p class="text-[18px] text-gray-body max-w-[650px] mx-auto leading-relaxed">Whether you need a hardware quote, technical support, or a complete infrastructure consultation, our team is ready to assist.</p>
        </div>

        <div class="grid lg:grid-cols-[1fr_1.5fr] gap-12 lg:gap-20 items-start">
            
            <!-- Contact Details -->
            <div class="space-y-10">
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-red-muted text-primary flex items-center justify-center flex-shrink-0 border border-primary/20 shrink-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[18px] text-dark mb-2">Sales & General Inquiries</h3>
                        <p class="text-[15px] text-gray-body mb-1">Mon-Thu: 9:00 AM - 5:00 PM</p>
                        <a href="tel:+201234567890" class="text-[16px] font-bold text-primary hover:underline block">+20 123 456 7890</a>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-red-muted text-primary flex items-center justify-center flex-shrink-0 border border-primary/20 shrink-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.93 1.93 0 01-2.06 0L2 7"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[18px] text-dark mb-2">Email Support</h3>
                        <p class="text-[15px] text-gray-body mb-1">Guaranteed 2-hour response during business hours.</p>
                        <a href="mailto:support@ats-egypt.com" class="text-[16px] font-bold text-primary hover:underline block">support@ats-egypt.com</a>
                        <a href="mailto:sales@ats-egypt.com" class="text-[16px] font-bold text-primary hover:underline block mt-1">sales@ats-egypt.com</a>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-red-muted text-primary flex items-center justify-center flex-shrink-0 border border-primary/20 shrink-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[18px] text-dark mb-2">Headquarters</h3>
                        <p class="text-[15px] text-gray-body leading-[1.6]">123 Tech Avenue, Smouha<br>Alexandria, Egypt<br>Postal: 21532</p>
                    </div>
                </div>

                <!-- Google Maps Embed placeholder -->
                <div class="w-full h-[200px] bg-gray-200 rounded-xl overflow-hidden border border-gray-border mt-8">
                    <img src="{{ asset('assets/images/downloaded/photo_1524661135_423995f22d0b.jpg') }}" alt="Map" class="w-full h-full object-cover opacity-80 mix-blend-multiply">
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white border border-gray-border rounded-2xl p-8 lg:p-12 box-shadow">
                <h2 class="text-[24px] font-bold text-dark mb-2 font-space">Send a Message</h2>
                <p class="text-[14px] text-gray-body mb-8">Fill out the form below and an ATS representative will contact you shortly.</p>
                
                <form id="contactForm" class="space-y-6">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[13px] font-bold text-dark mb-2">First Name *</label>
                            <input type="text" placeholder="Ahmed" class="input-field" required>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-dark mb-2">Last Name *</label>
                            <input type="text" placeholder="Ali" class="input-field" required>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[13px] font-bold text-dark mb-2">Email Address *</label>
                            <input type="email" placeholder="ahmed@company.com" class="input-field" required>
                        </div>
                        <div>
                            <label class="block text-[13px] font-bold text-dark mb-2">Phone Number</label>
                            <input type="tel" placeholder="+20 1xxxxxxxx" class="input-field">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Company Name</label>
                        <input type="text" placeholder="TechCorp Egypt" class="input-field">
                    </div>

                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Inquiry Type *</label>
                        <select class="input-field appearance-none bg-white font-medium" required>
                            <option value="">Select a category</option>
                            <option value="quote">Hardware Quote Request</option>
                            <option value="service">Professional Services Consultation</option>
                            <option value="support">Technical Support</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Your Message *</label>
                        <textarea rows="5" placeholder="How can we help you?" class="input-field w-full py-3 resize-none block bg-gray-50 border-gray-border focus:bg-white text-left placeholder:text-left" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-primary text-white hover:bg-[#C4182A] px-8 py-3.5 rounded-lg text-[15px] font-medium transition-colors box-shadow flex items-center justify-center gap-2">
                        Send Message <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                    <p class="text-center text-[12px] text-gray-body mt-4">We respect your privacy. Your information is secure.</p>
                </form>
            </div>
            
        </div>
    </main>
@endsection
