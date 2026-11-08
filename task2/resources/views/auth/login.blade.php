@extends('layouts.app')

@section('title', 'Login')

@push('styles')
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="auth-section container">
    <div class="auth-card">
        <h1>Welcome back</h1>
        <p>Log in to your Kiddo's account.</p>

        <form method="post" action="#">
            @csrf

            <label for="email">Email</label>
            <input id="email" name="email" type="email" maxlength="120" autocomplete="username" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>

            <button class="btn btn-primary" type="submit">Login</button>
        </form>

        <p>New here? <a href="{{ route('register') }}">Create an account</a></p>
    </div>
</section>
@endsection
