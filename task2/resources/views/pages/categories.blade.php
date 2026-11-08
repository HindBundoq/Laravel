@extends('layouts.app')

@section('title', 'Categories')

@push('styles')
    <link href="{{ asset('assets/css/landing.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="container category-discovery category-hub">
    <span class="browse-eyebrow">Shop by category</span>
    <h1>Find the perfect toy</h1>

    <div class="category-discovery-grid">
        @foreach ($categories as $category)
            <a class="category-discovery-card" href="{{ route('toys', ['category' => $category['slug']]) }}">
                <span class="category-art">
                    <img src="{{ asset($category['image']) }}" alt="{{ $category['name'] }}" width="160" height="120" loading="lazy">
                </span>
                <span class="category-card-copy">
                    <strong>{{ $category['name'] }}</strong>
                    <small>{{ $category['toy_count'] }} toys to discover</small>
                </span>
                <span class="category-card-arrow" aria-hidden="true">↗</span>
            </a>
        @endforeach
    </div>

    <section class="category-gift" aria-labelledby="gift-heading">
        <div class="category-gift-intro">
            <span class="browse-eyebrow">A little help choosing</span>
            <h2 id="gift-heading">Find a gift they'll love</h2>
            <p>Start with their age and your budget. We'll show you the toys that fit.</p>
            <div class="category-discovery-links">
                <a href="{{ route('toys', ['offers' => 1]) }}">Explore offers <span aria-hidden="true">→</span></a>
                <a href="{{ route('toys') }}">See new arrivals <span aria-hidden="true">→</span></a>
            </div>
        </div>

        <form class="category-gift-form" action="{{ route('toys') }}" method="get">
            <div>
                <label for="gift-age">Who are you shopping for?</label>
                <select id="gift-age" name="age">
                    <option value="">All ages</option>
                    @foreach ($ageGroups as $group)
                        <option value="{{ $group['slug'] }}">{{ $group['name'] }} ({{ $group['min_age'] }}–{{ $group['max_age'] }} years)</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="gift-budget">Your budget</label>
                <select id="gift-budget" name="price">
                    <option value="">Any budget</option>
                    <option value="under-10">Under 10 JOD</option>
                    <option value="10-25">10–25 JOD</option>
                    <option value="25-50">25–50 JOD</option>
                    <option value="50-100">50–100 JOD</option>
                    <option value="over-100">100 JOD &amp; more</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Find toys</button>
        </form>
    </section>
</section>
@endsection
