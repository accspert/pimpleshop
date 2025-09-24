<header>
    <div class="container">
        <h1>
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo_with-tag.png') }}" alt="PimpleVans Logo" class="logo">
            </a>
        </h1>
        
        <input type="checkbox" id="menu-toggle" class="hidden-checkbox">
        
        <label for="menu-toggle" class="hamburger-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </label>
        
        <nav id="main-nav">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('products.index') }}">Möbel</a></li>
                <li><a href="{{ route('cart.index') }}">Warenkorb</a></li>
                <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                
                @auth
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Abmelden</a>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Anmelden</a></li>
                    <li><a href="{{ route('register') }}">Registrieren</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>