@extends('layouts.app')

@section('title', 'Login - ATS')

@section('content')
    <main class="max-w-[520px] mx-auto px-6 py-14">
        <h1 class="text-[32px] font-bold mb-2">Log In</h1>
        <p class="text-gray-body mb-8">Access your account, orders, and tracking updates.</p>

        <form id="login-form" class="border border-gray-border rounded-xl p-5 bg-white space-y-4">
            <div>
                <label for="login-email" class="block text-[13px] font-semibold mb-1">Email</label>
                <input id="login-email" type="email" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="you@example.com">
            </div>
            <div>
                <label for="login-password" class="block text-[13px] font-semibold mb-1">Password</label>
                <input id="login-password" type="password" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="••••••••">
            </div>
            <button type="submit" class="w-full h-[44px] rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Log In</button>
            <p id="login-feedback" class="text-[13px] text-gray-body"></p>
        </form>

        <p class="text-[14px] text-gray-body mt-5">No account yet? <a href="{{ route('signup') }}" class="text-primary font-semibold hover:underline">Create one</a></p>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/auth-service.js') }}"></script>
    <script>
    (function () {
        var auth = window.ATSAuthService;
        var form = document.getElementById('login-form');
        var feedback = document.getElementById('login-feedback');

        form.addEventListener('submit', async function (event) {
            event.preventDefault();
            var email = document.getElementById('login-email').value.trim().toLowerCase();
            var password = document.getElementById('login-password').value;

            var result = await auth.signIn({ email: email, password: password });
            if (!result.ok) {
                feedback.textContent = 'Invalid email or password.';
                return;
            }

            feedback.textContent = 'Login successful. Redirecting...';
            setTimeout(function () { window.location.href = '{{ route('account') }}'; }, 400);
        });
    })();
    </script>
@endpush
