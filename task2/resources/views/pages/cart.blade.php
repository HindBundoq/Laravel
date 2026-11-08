@extends('layouts.app')

@section('title', 'Your cart')

@push('styles')
    <link href="{{ asset('assets/css/cart.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="container cart-page">
    <div class="cart-heading">
        <h1>Your cart</h1>
    </div>

    <div class="cart-layout">
        <ul class="cart-list">
            @foreach ($items as $item)
                <li class="cart-item">
                    <img src="{{ asset($item['toy']['images'][0]) }}" alt="{{ $item['toy']['name'] }}">

                    <div class="cart-item-info">
                        <a href="#">{{ $item['toy']['name'] }}</a>
                        <p>
                            {{ number_format($item['toy']['final_price'], 2) }} JOD
                            @if ($item['toy']['has_discount'])
                                <s>{{ number_format($item['toy']['price'], 2) }} JOD</s>
                            @endif
                        </p>
                    </div>

                    <div class="cart-qty">
                        <button type="button" aria-label="Decrease quantity">−</button>
                        <span>{{ $item['quantity'] }}</span>
                        <button type="button" aria-label="Increase quantity">+</button>
                    </div>

                    <strong class="cart-line-total">{{ number_format($item['toy']['final_price'] * $item['quantity'], 2) }} JOD</strong>

                    <button class="cart-remove" type="button" aria-label="Remove {{ $item['toy']['name'] }}" title="Remove">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M3 6h18"/><path d="M8 6V4h8v2"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/>
                        </svg>
                    </button>
                </li>
            @endforeach
        </ul>

        <aside class="cart-summary">
            <h2>Order summary</h2>
            <p><span>Subtotal</span> <strong>{{ number_format($subtotal, 2) }} JOD</strong></p>
            <p class="cart-note">Delivery fee is added at checkout. Cash on delivery.</p>
            <a class="btn btn-primary btn-block" href="#">Checkout</a>
            <button class="btn btn-outline btn-block cart-clear" type="button">Clear cart</button>
        </aside>
    </div>

    <section class="cart-suggestions">
        <h2>More toys to grow little minds</h2>
        <div class="toy-grid">
            @foreach ($suggestions as $toy)
                @include('partials.toy-card', ['toy' => $toy])
            @endforeach
        </div>
    </section>
</section>
@endsection
