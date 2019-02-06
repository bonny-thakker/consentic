<footer class=app-footer id="footer">
    <div class=container>
        <div class="columns is-multiline is-mobile">
            <div class="column is-12-mobile is-2-tablet is-hidden-mobile">
                <div class="closure">
                    <a href="/" class="is-inline-block" title="Consentic">
                        <img src="/images/logo-light-sm.png" alt="">
                    </a>
                </div>
            </div>
            <div class="column is-12-mobile is-2-tablet">
                <div class=menu>
                    <ul class=menu-list>
                        <li> <a href="{{ url('/') }}">Home</a></li>
                        <li> <a href="{{ url('about') }}">About</a></li>
                        <li> <a href="{{ url('features') }}">Features</a></li>
                        <li> <a href="{{ url('pricing') }}">Pricing</a></li>
                    </ul>
                </div>
            </div>
            <div class="column is-12-mobile is-2-tablet">
                <div class=menu>
                    <ul class=menu-list>
                        {{-- <li> <a href="/blog">Blog</a></li> --}}
                        <li> <a href="{{ url('terms-and-conditions') }}">Terms &amp; Conditions</a></li>
                        <li> <a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                        <li> <a href="{{ url('contact-cc') }}">Contact Us</a></li>
                        {{-- <li> <a href="{{ url('faq') }">FAQs</a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="column is-12-mobile is-6-tablet">
                <h3 class="menu-label">Get our newsletter</h3>
                <form action="#" method="post" id="newsletter-form">
                    {{ csrf_field() }}
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium" type="email" placeholder="Enter your email" name="email" required>
                                </div>
                            </div>
                            <div class="field is-expanded">
                                <div class="control">
                                    <button class="button button-subscribe submit is-borderless is-fullwidth is-medium" href="/inquire-as-employer">Subscribe</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <a class="button social is-medium is-text" target="__blank" href="https://www.facebook.com/consentic">
                    <span class="icon is-medium">
                        <i class="mdi mdi-facebook-box"></i>
                    </span>
                </a>
                <a class="button social is-medium is-text" target="__blank" href="https://www.instagram.com/consentic">
                    <span class="icon is-medium">
                        <i class="mdi  mdi-instagram"></i>
                    </span>
                </a>
                <a class="button social is-medium is-text" target="__blank" href="https://twitter.com/consentic">
                    <span class="icon is-medium">
                        <i class="mdi  mdi-twitter"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</footer>