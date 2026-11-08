<article class="toy-card">
    <div class="toy-card-media {{ $toy['tint'] }}" data-card-gallery>
        @if ($toy['has_discount'])
            <span class="toy-badge">-{{ $toy['discount_pct'] }}%</span>
        @endif

        <span class="toy-card-circle">
            @foreach ($toy['images'] as $i => $image)
                <img src="{{ asset($image) }}" alt="{{ $toy['name'] }}"
                     class="{{ $i === 0 ? 'is-shown' : '' }}" loading="lazy" width="220" height="220">
            @endforeach
        </span>

        <span class="toy-age">{{ $toy['min_age'] }}–{{ $toy['max_age'] }} yrs</span>

        <button type="button" class="card-arrow is-prev" data-card-step="-1" aria-label="Previous image of {{ $toy['name'] }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <button type="button" class="card-arrow is-next" data-card-step="1" aria-label="Next image of {{ $toy['name'] }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
        </button>
        <span class="card-dots" aria-hidden="true">
            @foreach ($toy['images'] as $i => $image)
                <span class="{{ $i === 0 ? 'is-on' : '' }}"></span>
            @endforeach
        </span>
    </div>

    <div class="toy-card-body">
        <span class="toy-card-cat">{{ $toy['category_name'] }} · Unisex</span>

        <h3 class="toy-card-name">
            <a class="toy-card-link" href="#">{{ $toy['name'] }}</a>
        </h3>

        <p class="toy-card-desc">{{ $toy['description'] }}</p>

        <span class="toy-rating">
            <span class="stars" style="--rating: 0" role="img" aria-label="Rated 0 out of 5"></span>
            <span class="toy-rating-text">No reviews yet</span>
        </span>

        <div class="toy-card-foot">
            <span class="toy-price">
                <strong>{{ number_format($toy['final_price'], 2) }} JOD</strong>
                @if ($toy['has_discount'])
                    <del>{{ number_format($toy['price'], 2) }} JOD</del>
                @endif
            </span>
            <span class="toy-stock">{{ $toy['stock'] }} in stock</span>
        </div>

        <button class="btn btn-primary btn-block" type="button">Add to cart</button>
    </div>
</article>
