@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>See more Details</p>
					<h1>Single Product</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="single-product-img">
					<img src="{{ asset($product->image) }}" alt="">
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-content">
					<h3>{{ $product -> name }}</h3>
					<p class="single-product-pricing"><span></span>Rp. {{ number_format($product -> price) }}</p>
					<p>{{ $product -> description }}</p>
					<div class="single-product-form">
						<p><strong>Stok :</strong>{{ $product -> quantity }}</p>
						<form action="index.html">
							<input type="number" placeholder="0">
						</form>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						<p><strong>Categories: </strong>{{ $product -> category -> name }}</p>
					</div>
					<h4>Share:</h4>
					<ul class="product-share">
						<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
						<li><a href=""><i class="fab fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="more-products mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Related</span> Products</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
						beatae optio.</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($related as $item)
			<div class="col-lg-4 col-md-6 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="/products/{{ $item -> slug }}"><img src="{{ asset($item -> image) }}" alt=""></a>
					</div>
					<h3>{{ $item -> name }}</h3>
					<p class="product-price"><span>{{ $item -> category -> name }}</span>Rp.
						{{ number_format($item -> price) }} </p>
					<a href="/products/{{ $item -> slug }}" class="cart-btn"><i class="fas fa-shopping-cart"></i>
						Detail</a>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</div>
<!-- end more products -->

@endsection