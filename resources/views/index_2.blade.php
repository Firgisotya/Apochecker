@extends('layouts.landingpage.main')

@section('content')
<!-- home page slider -->
<div class="homepage-slider">
	<!-- single home slider -->
	<div class="single-homepage-slider homepage-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Fresh & Organic</p>
							<h1>Delicious Seasonal Fruits</h1>
							<div class="hero-btns">
								<a href="/shop" class="boxed-btn">Fruit Collection</a>
								<a href="/contact" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- single home slider -->
	<div class="single-homepage-slider homepage-bg-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Fresh Everyday</p>
							<h1>100% Organic Collection</h1>
							<div class="hero-btns">
								<a href="/shop" class="boxed-btn">Visit Shop</a>
								<a href="/contact" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- single home slider -->
	<div class="single-homepage-slider homepage-bg-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-right">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Mega Sale Going On!</p>
							<h1>Get December Discount</h1>
							<div class="hero-btns">
								<a href="/shop" class="boxed-btn">Visit Shop</a>
								<a href="/contact" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end home page slider -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="content">
						<h3>Free Shipping</h3>
						<p>When order over $75</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-phone-volume"></i>
					</div>
					<div class="content">
						<h3>24/7 Support</h3>
						<p>Get support all day</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="list-box d-flex justify-content-start align-items-center">
					<div class="list-icon">
						<i class="fas fa-sync"></i>
					</div>
					<div class="content">
						<h3>Refund</h3>
						<p>Get refund within 3 days!</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Our</span> Products</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
						beatae optio.</p>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach ( $products as $product )
			<div class="col-lg-4 col-md-6 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="/products/{{ $product -> slug }}"><img src="{{ $product -> image }}" alt=""></a>
					</div>
					<h3>{{ $product -> name }}</h3>
					<p class="product-price"> {{ number_format($product -> price) }} </p>
					<a href="/products/{{ $product -> slug }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add
						to Cart</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- end product section -->

<!-- cart banner section -->
<section class="cart-banner pt-100 pb-100">
	<div class="container">
		<div class="row clearfix">
			<!--Image Column-->
			<div class="image-column col-lg-6">
				<div class="image">
					<div class="price-box">
						<div class="inner-price">
							<span class="price">
								<strong>30%</strong> <br> <strong>Off...</strong>
							</span>
						</div>
					</div>
					<img style="border-radius: 10px" src="img/3.jpg" alt="">
				</div>
			</div>
			<!--Content Column-->
			<div class="content-column col-lg-6">
				<h3><span class="orange-text">Deal</span> of the month</h3>
				<h4>Hikan Strwaberry</h4>
				<div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique!
					Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit
					voluptatem accusant</div>
				<!--Countdown Timer-->
				<div class="time-counter">
					<div class="time-countdown clearfix" data-countdown="2020/2/01">
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Days</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Hours</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Mins</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Secs</div>
						</div>
					</div>
				</div>
				<a href="/products" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
			</div>
		</div>
	</div>
</section>
<!-- end cart banner section -->

<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 text-center">
				<div class="testimonial-sliders">
					@foreach ($testimonis as $testimoni)
					<div class="single-testimonial-slider">
						<div class="client-avater">
							<img src="{{ asset($testimoni -> photo) }}" alt="">
						</div>
						<div class="client-meta">
							<h3>{{ $testimoni -> name }} <span>{{ $testimoni -> job_title }}</span></h3>
							<p class="testimonial-body">
								" {{ $testimoni -> comment }} "
							</p>
							<div class="last-icon">
								<i class="fas fa-quote-right"></i>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end testimonail-section -->

<!-- advertisement section -->
<div class="abt-section mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="abt-bg">
					<img src="{{ asset('img/about1.jpg') }}" alt="">
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="abt-text">
					<p class="top-sub">Since Year 2022</p>
					<h2>We are <span class="orange-text">Apochecker</span></h2>
					<p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac
						vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet
						sapien sed, interdum velit. Nam eu molestie lorem.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat
						veritatis minus, et labore minima mollitia qui ducimus.</p>
					<a href="/about" class="boxed-btn mt-4">know more</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end advertisement section -->

<!-- shop banner -->
<section class="shop-banner">
	<div class="container">
		<h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
		<div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
		<a href="/shop" class="cart-btn btn-lg">Shop Now</a>
	</div>
</section>
<!-- end shop banner -->

<!-- latest news -->
<div class="latest-news pt-150 pb-150">
	<div class="container">

		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Our</span> News</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
						beatae optio.</p>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach ($recents as $recent)
			<div class="col-lg-4 col-md-6">
				<div class="single-latest-news">
					<a href="/news/{{ $recent -> slug }}">
						<img src="{{ asset($recent -> photo) }}" alt="">
					</a>
					<div class="news-text-box">
						<h3><a href="/news/{{ $recent -> slug }}">{{ $recent -> title }}</a></h3>
						<p class="blog-meta">
							<span class="author"><i class="fas fa-user"></i> {{ $recent -> user -> name }}</span>
							<span class="date"><i class="fas fa-calendar"></i>{{ $recent -> date }}</span>
						</p>
						<p class="excerpt">{{ $recent -> excerpt }}</p>
						<a href="/news/{{ $recent -> slug }}" class="read-more-btn">read more <i
								class="fas fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			@endforeach

		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<a href="/news" class="boxed-btn">More News</a>
			</div>
		</div>
	</div>
</div>
<!-- end latest news -->


@endsection