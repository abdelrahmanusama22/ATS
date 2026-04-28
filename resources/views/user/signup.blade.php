@extends('layouts.app')

@section('title', 'Create Account - ATS')

@section('content')
    <main class="max-w-[560px] mx-auto px-6 py-14">
        <h1 class="text-[32px] font-bold mb-2">Create Account</h1>
        <p class="text-gray-body mb-8">Sign up to manage your profile, orders, and shipping updates.</p>

        <form action="{{ route('signup') }}" method="POST" class="border border-gray-border rounded-xl p-5 bg-white space-y-4">
            @csrf
            @if($errors->any())
                <div class="p-3 bg-red-50 text-red-600 rounded-md text-[13px] border border-red-200">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="signup-name" class="block text-[13px] font-semibold mb-1">Full Name</label>
                <input id="signup-name" name="name" type="text" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="Ahmed Hassan" value="{{ old('name') }}">
            </div>
            <div>
                <label for="signup-email" class="block text-[13px] font-semibold mb-1">Email</label>
                <input id="signup-email" name="email" type="email" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="you@example.com" value="{{ old('email') }}">
            </div>
            <div>
                <label for="signup-password" class="block text-[13px] font-semibold mb-1">Password</label>
                <input id="signup-password" name="password" type="password" minlength="8" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="At least 8 characters">
            </div>
            <div>
                <label for="signup-password-confirm" class="block text-[13px] font-semibold mb-1">Confirm Password</label>
                <input id="signup-password-confirm" name="password_confirmation" type="password" minlength="8" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="Confirm your password">
            </div>
            <button type="submit" class="w-full h-[44px] rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Create Account</button>
        </form>

        <p class="text-[14px] text-gray-body mt-5">Already have an account? <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Log in</a></p>
    </main>
@endsection

@push('scripts')
    <script>
        // JS mock signup removed, using server-side auth
    </script>
@endpush
