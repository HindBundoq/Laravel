@php
    $navLinks = [
        ['label' => 'Home',       'url' => route('home'),                    'active' => request()->routeIs('home')],
        ['label' => 'Categories', 'url' => route('categories'),              'active' => request()->routeIs('categories')],
        ['label' => 'Toys',       'url' => route('toys'),                    'active' => request()->routeIs('toys') && request('offers') !== '1'],
        ['label' => 'Offers',     'url' => route('toys', ['offers' => 1]),   'active' => request()->routeIs('toys') && request('offers') === '1'],
    ];
@endphp

<input type="checkbox" id="nav-toggle" class="nav-toggle" aria-hidden="true" tabindex="-1">

<header class="site-header shop-header">
    <div class="container shop-header-row">
        <label for="nav-toggle" class="menu-btn" aria-label="Open menu">
            <span></span><span></span><span></span>
        </label>

        <a class="brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/kiddos-logo.png') }}" alt="Kiddo's" width="183" height="44">
        </a>

        <nav class="shop-nav" aria-label="Main">
            <ul>
                @foreach ($navLinks as $link)
                    <li>
                        <a href="{{ $link['url'] }}" class="{{ $link['active'] ? 'is-active' : '' }}">{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <form class="header-search" action="{{ route('toys') }}" method="get" role="search">
            <label class="sr-only" for="site-search">Search toys by name</label>
            <input id="site-search" type="search" name="q" maxlength="60" autocomplete="off"
                   placeholder="Search toys by name…" value="{{ request('q') }}">
            <button type="submit" aria-label="Search">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>
                </svg>
            </button>
        </form>

        <div class="header-actions">
            <a class="icon-link" href="{{ route('cart') }}" aria-label="Shopping cart">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M3 4h2l2.4 10.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 1.9-1.4L21 8H6.2"/>
                    <circle cx="10" cy="20" r="1.4"/><circle cx="17" cy="20" r="1.4"/>
                </svg>
            </a>

            <span class="header-divider desktop-only"></span>

            <a class="btn btn-outline btn-sm desktop-only" href="{{ route('login') }}">Login</a>
            <a class="btn btn-primary btn-sm desktop-only" href="{{ route('register') }}">Register</a>
        </div>
    </div>
</header>

<label for="nav-toggle" class="drawer-backdrop" aria-hidden="true"></label>

<aside class="drawer" aria-label="Menu">
    <div class="drawer-head">
        <img src="{{ asset('assets/images/kiddos-logo-white.png') }}" alt="Kiddo's" width="150" height="36">
        <label for="nav-toggle" class="drawer-close" aria-label="Close menu">&times;</label>
    </div>

    <div class="drawer-auth">
        <a class="btn btn-outline" href="{{ route('login') }}">Login</a>
        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
    </div>

    <ul class="drawer-links">
        @foreach ($navLinks as $link)
            <li>
                <a href="{{ $link['url'] }}" class="{{ $link['active'] ? 'is-active' : '' }}">{{ $link['label'] }} <span aria-hidden="true">›</span></a>
            </li>
        @endforeach
    </ul>
</aside>
