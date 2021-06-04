<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="header-area transparent-bar ptb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-4">
                    <div class="logo-small-device">
                        <a href="{{ route('home-site') }}"><img alt="count-price-add" src="{{ asset('principal/img/logo/logo.png') }}" class="logo-custom-w" id="logo-mf"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-8">
                    <div class="header-contact-menu-wrapper pl-45">
                        <div class="header-contact">
                            <p class="text-uppercase font-weight-light" style="font-size: 23px;margin-left: -40px;">&nbsp;</p>
                        </div>
                        <div class="menu-wrapper text-center">
                            <button class="menu-toggle open">
                                <img class="s-open" alt="" src="{{ asset('principal/img/icon-img/menu.png') }}">
                                <img class="s-close" alt="" src="{{ asset('principal/img/icon-img/menu-close.png') }}">
                            </button>
                            <div class="main-menu open">
                                <nav>
                                    <ul>
                                        <li><a href="{{ route('home-site') }}">INÍCIO</a></li>
                                        <li><a href="{{ route('about') }}">SOBRE</a></li>
                                        <li><a href="https://loja.motoformosa.com.br">LOJA</a>
                                        <li><a href="{{ route('blog') }}">BLOG</a></li>
                                        <li><a href="{{ route('contato.index') }}">CONTATO</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area col-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="{{ route('home-site') }}">Início</a></li>
                                <li><a href="{{ route('about') }}">Sobre</a></li>
                                <li><a href="#">Loja</a></li>
                                <li><a href="{{ route('blog') }}">BLOG</a></li>
                                <li><a href="{{ route('contato.index') }}"> Contato</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-cart-wrapper">
            <div class="header-cart">
                <button class="icon-cart" id="toCommerce" onclick="window.open('https://loja.motoformosa.com.br/', '_blank');">
                        <span class="count-price-add">
                            <img src="{{ asset('images/cart.svg') }}" style="filter: invert(1)" width="60">
                        </span>
                </button>
            </div>
        </div>
    </div>
</header>

