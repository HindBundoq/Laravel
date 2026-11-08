<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/kiddos-logo-white.png') }}" alt="Kiddo's" width="167" height="40">
            </a>
            <p class="footer-tagline">Toys that grow little minds.</p>
            <p>Thoughtful toys for every stage of childhood, delivered across Jordan.</p>
        </div>

        <div>
            <h3>Contact us</h3>
            <ul>
                <li><a href="tel:+96260000000">+962 6 000 0000</a></li>
                <li><a href="mailto:care@kiddos.jo">care@kiddos.jo</a></li>
            </ul>
            <div class="footer-social">
                <a href="#" aria-label="Instagram">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".5"/></svg>
                </a>
                <a href="#" aria-label="Facebook">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="#" aria-label="WhatsApp">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 21l2.1-5.5A8.4 8.4 0 1 1 21 11.5z"/></svg>
                </a>
            </div>
        </div>

        <div>
            <h3>Payment</h3>
            <div class="pay-card">
                <span class="pay-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></svg>
                </span>
                <span>
                    <strong>Cash on Delivery</strong>
                    <small>Pay when your order arrives</small>
                </span>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <span>&copy; {{ date('Y') }} Kiddo's All rights reserved</span>
        </div>
    </div>
</footer>
