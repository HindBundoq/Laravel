@extends('layouts.app')

@section('title', 'Register')

@push('styles')
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="auth-section container">
    <div class="auth-card">
        <h1>Create an account</h1>
        <p>Join Kiddo's and find your next favourite toy.</p>

        <form method="post" action="#">
            @csrf

            <label for="first_name">First name</label>
            <input id="first_name" name="first_name" type="text" maxlength="50" autocomplete="given-name" required>

            <label for="last_name">Last name</label>
            <input id="last_name" name="last_name" type="text" maxlength="50" autocomplete="family-name" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" maxlength="120" autocomplete="email" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" maxlength="72" autocomplete="new-password" required>

            <label for="confirm_password">Confirm password</label>
            <input id="confirm_password" name="confirm_password" type="password" maxlength="72" autocomplete="new-password" required>

            <p class="auth-hint">Use a password of at least 8 characters.</p>

            <button class="btn btn-primary" type="submit">Register</button>
        </form>

        <p>Already registered? <a href="{{ route('login') }}">Log in</a></p>
    </div>
</section>
@endsection
