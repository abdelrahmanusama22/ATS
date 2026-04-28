@extends('layouts.app')

@section('title', 'Create Account - ATS')

@section('content')
    <main class="max-w-[560px] mx-auto px-6 py-14">
        <h1 class="text-[32px] font-bold mb-2">Create Account</h1>
        <p class="text-gray-body mb-8">Sign up to manage your profile, orders, and shipping updates.</p>

        <form id="signup-form" class="border border-gray-border rounded-xl p-5 bg-white space-y-4">
            <div>
                <label for="signup-name" class="block text-[13px] font-semibold mb-1">Full Name</label>
                <input id="signup-name" type="text" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="Ahmed Hassan">
            </div>
            <div>
                <label for="signup-email" class="block text-[13px] font-semibold mb-1">Email</label>
                <input id="signup-email" type="email" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="you@example.com">
            </div>
            <div>
                <label for="signup-password" class="block text-[13px] font-semibold mb-1">Password</label>
                <input id="signup-password" type="password" minlength="6" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="At least 6 characters">
            </div>
            <button type="submit" class="w-full h-[44px] rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Create Account</button>
            <p id="signup-feedback" class="text-[13px] text-gray-body"></p>
        </form>

        <p class="text-[14px] text-gray-body mt-5">Already have an account? <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Log in</a></p>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/auth-service.js') }}"></script>
    <script>
    (function () {
        var auth = window.ATSAuthService;
        var form = document.getElementById('signup-form');
        var feedback = document.getElementById('signup-feedback');

        form.addEventListener('submit', async function (event) {
            event.preventDefault();
            var name = document.getElementById('signup-name').value.trim();
            var email = document.getElementById('signup-email').value.trim().toLowerCase();
            var password = document.getElementById('signup-password').value;

            var result = await auth.signUp({ name: name, email: email, password: password });
            if (!result.ok) {
                if (result.code === 'EMAIL_EXISTS') {
                    feedback.textContent = 'An account with this email already exists.';
                } else if (result.code === 'WEAK_PASSWORD') {
                    feedback.textContent = 'Use at least 6 characters with letters and numbers.';
                } else if (result.code === 'INVALID_EMAIL') {
                    feedback.textContent = 'Please enter a valid email address.';
                } else {
                    feedback.textContent = 'Please check your details and try again.';
                }
                return;
            }

            feedback.textContent = 'Account created successfully. Redirecting...';
            setTimeout(function () { window.location.href = '{{ route('account') }}'; }, 400);
        });
    })();
    </script>
@endpush
