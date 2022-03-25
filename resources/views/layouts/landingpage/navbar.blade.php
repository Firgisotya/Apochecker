<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="/">
                            <img src="/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li style="padding-left: 100px" class="{{ Request::is('/') ? 'current-list-item' : ''}}"><a
                                    href="/">Home</a>

                            </li>
                            <li class="{{ Request::is('about') ? 'current-list-item' : ''}}"><a href="/about">About</a>
                            </li>

                            <li
                                class="{{ Request::is('news') || Request::is('single-news') ? 'current-list-item' : ''}}">
                                <a href="/news">News</a>

                            </li>
                            <li class="{{ Request::is('contact') ? 'current-list-item' : ''}}"><a
                                    href="/contact">Contact</a></li>
                            <li class="{{ Request::is('shop') ? 'current-list-item' : ''}}"><a href="/shop">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="/shop">Shop</a></li>
                                    <li><a href="/checkout">Check Out</a></li>
                                    <li><a href="/single-product">Single Product</a></li>
                                    <li><a href="/cart">Cart</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                            <li style="padding-left: 120px;"><a class="shopping-cart" href="/cart"><i
                                        class="fas fa-shopping-cart"></i></a></li>
                            <li style=""><a class="mobile-hide search-bar-icon" href="#"><i
                                        class="fas fa-search"></i></a></li>
                            @guest
                            @if (Route::has('login'))
                            <li><a class="" href="{{ route('login') }}">Login <i
                                        class="fa-solid fa-arrow-right-to-bracket"></i></a></li>
                            @endif
                            @else
                            <li style="margin-left: -100px"><a href="">Hello, {{ Auth::user() -> name }}</a>
                                <ul id="tes" style="width: 100px;padding: 5px" class="sub-menu text-end">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }} <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                </div>
                </li>
                </ul>
                </nav>
                <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                <div class="mobile-menu"></div>
                <!-- menu end -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input type="text" placeholder="Keywords">
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->