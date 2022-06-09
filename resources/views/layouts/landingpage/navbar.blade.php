<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="/">
                            <img src="/img/logo1.png" alt="">
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
                            <li class="{{ Request::is('products') ? 'current-list-item' : ''}}"><a
                                    href="/products">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="/products">Shop</a></li>
                                    <li><a href="/checkout">Check Out</a></li>

                                    <li><a href="/cart">Cart</a></li>
                                </ul>
                            </li>
                            <li>

                                @guest
                                @if (Route::has('login'))
                            <li><a class="" href="{{ route('login') }}">Login <i
                                        class="fa-solid fa-arrow-right-to-bracket"></i></a></li>
                            @endif
                            @else
                            @php
                            $mainOrder = \App\Models\Order::where('user_id', auth()->user()->id)->where('status',
                            0)->first();

                            if (!empty($mainOrder)){
                            $notification = \App\Models\OrderDetail::where('order_id', $mainOrder->id)->count();
                            }
                            @endphp

                            @if (!empty($mainOrder))


                            <div class="header-icons">
                                <li style="padding-left: 250px">
                                    <a class="shopping-cart position-relative" href="/cart"><i
                                            class="fas fa-shopping-cart"></i><span class="badge bg-danger"
                                            style="transform: translateY(-15px);margin-left: 3px;padding:3px 5px;border-radius: 30px">{{ $notification }}</span></a>
                                </li>
                                @else
                                <li style="padding-left: 250px"><a class="shopping-cart position-relative"
                                        href="/cart"><i class="fas fa-shopping-cart"></i><span class="badge bg-danger"
                                            style="transform: translateY(-15px);margin-left: 3px;padding:2px 4px;border-radius: 30px"></span></a>
                                </li>
                                @endif

                                <li><a href="">Hello, {{ Auth::user() -> username }}</a>
                                    <ul id="tes" style="width: 100%;padding: 5px" class="sub-menu text-end">
                                </li>
                                @if (Auth::user() -> level == 'admin')
                                <li style="height: 40px;overflow: hidden;"><a class="dropdown-item" href="/dashboard"
                                        style="height: 40px;">Dashboard
                                        <i class="fa-solid fa-house-chimney-user justify-content-end d-flex"
                                            style="transform: translateY(-20px)"></i></a></li>
                                @endif
                                <li style="height: 40px;overflow: hidden;"><a class="dropdown-item" href="/profile"
                                        style="height: 40px;">Profile <i
                                            class="fa-solid fa-user d-flex justify-content-end"
                                            style="transform: translateY(-20px)"></i></a></li>
                                <li style="height: 40px;overflow: hidden;"><a class="dropdown-item" href="/chatify"
                                                style="height: 40px;">Chat <i
                                                    class="fa-solid fa-message d-flex justify-content-end"
                                                    style="transform: translateY(-20px)"></i></a></li>
                                <li style="height: 40px;overflow: hidden;"><a class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();">
                                        {{ __('Logout') }} <i
                                            class="fa-solid fa-arrow-right-from-bracket justify-content-end d-flex align-baseline"
                                            style="transform: translateY(-20px)"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

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
