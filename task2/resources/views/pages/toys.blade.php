@extends('layouts.app')

@section('title', $isOffers ? 'Offers' : 'Toys')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/toys-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/categories-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/browsing.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/catalog-browsing.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="toys-layout toys-pill-page catalog-page">
    <div class="catalog-topbar">
        <div class="catalog-toolbar">
            <p class="result-count" role="status">
                Showing <strong>{{ count($toys) }}</strong> {{ $isOffers ? 'offers' : 'toys' }}
            </p>
        </div>
    </div>

    <details class="catalog-sidebar" open>
        <summary>Filters <span aria-hidden="true">⌄</span></summary>
        <div class="catalog-sidebar-content">
            <section class="catalog-filters" aria-labelledby="catalog-filter-title">
                <h2 id="catalog-filter-title">Filters</h2>

                <form class="filter-bar" action="{{ route('toys') }}" method="get">
                    @if ($isOffers)
                        <input type="hidden" name="offers" value="1">
                    @endif

                    <div class="filter-field">
                        <label for="filter-category">Category</label>
                        <select id="filter-category" name="category">
                            <option value="">All categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['slug'] }}" @selected($selected === $category['slug'])>{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-field">
                        <label for="filter-age">Age</label>
                        <select id="filter-age" name="age">
                            <option value="">All ages</option>
                            @foreach ($ageGroups as $group)
                                <option value="{{ $group['slug'] }}">{{ $group['name'] }} ({{ $group['min_age'] }}–{{ $group['max_age'] }} Years)</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button class="btn btn-primary browse-apply" type="submit">Apply filters</button>
                        <a class="btn btn-outline" href="{{ $isOffers ? route('toys', ['offers' => 1]) : route('toys') }}">Clear all</a>
                    </div>
                </form>
            </section>
        </div>
    </details>

    <div class="toys-main">
        <div class="toys-content">
            @if (count($toys))
                <div class="toy-grid">
                    @foreach ($toys as $toy)
                        @include('partials.toy-card', ['toy' => $toy])
                    @endforeach
                </div>
            @else
                <div class="toys-empty">
                    <span aria-hidden="true">🧸</span>
                    <h2>No toys match these filters</h2>
                    <p>Try removing a filter.</p>
                    <a class="btn btn-outline" href="{{ route('categories') }}">Browse categories</a>
                    <a class="btn btn-primary" href="{{ route('toys') }}">Clear filters</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
