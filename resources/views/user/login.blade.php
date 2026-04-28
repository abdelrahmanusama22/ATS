@extends('layouts.app')

@section('title', 'Login - ATS')

@section('content')
    <main class="max-w-[520px] mx-auto px-6 py-14">
        <h1 class="text-[32px] font-bold mb-2">Log In</h1>
        <p class="text-gray-body mb-8">Access your account, orders, and tracking updates.</p>

        <form action="{{ route('login') }}" method="POST" class="border border-gray-border rounded-xl p-5 bg-white space-y-4">
            @csrf
            @if($errors->any())
                <div class="p-3 bg-red-50 text-red-600 rounded-md text-[13px] border border-red-200">
                    {{ $errors->first() }}
                </div>
            @endif
            <div>
                <label for="login-email" class="block text-[13px] font-semibold mb-1">Email</label>
                <input id="login-email" name="email" type="email" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="you@example.com" value="{{ old('email') }}">
            </div>
            <div>
                <label for="login-password" class="block text-[13px] font-semibold mb-1">Password</label>
                <input id="login-password" name="password" type="password" required class="w-full h-[42px] border border-gray-border rounded-md px-3" placeholder="••••••••">
            </div>
            <button type="submit" class="w-full h-[44px] rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Log In</button>
        </form>

        <p class="text-[14px] text-gray-body mt-5">No account yet? <a href="{{ route('signup') }}" class="text-primary font-semibold hover:underline">Create one</a></p>
    </main>
@endsection

@push('scripts')
    <script>
        // JS login mock removed, using server-side auth
    </script>
@endpush
