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
		@if (session()->has('success'))
		<div class="alert alert-success alert-dismissible fade show p-3" role="alert">
			<strong>{{ session('success') }} <i class="fa-solid fa-circle-check"></i></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		@if (session()->has('error'))
		<div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
			<strong>{{ session('error') }} <i class="fa-solid fa-trash-can"></i></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		@if (session()->has('warning'))
		<div class="alert alert-warning alert-dismissible fade show p-3" role="alert">
			<strong>{{ session('warning') }} <i class="fa-solid fa-triangle-exclamation"></i> </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<form action="/pesan/{{ $product -> slug }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="@if ($product -> image == null)
									{{ asset('img/products/'.$product -> slug.'.jpg') }}
								@else
									{{ asset('storage/'.$product -> image) }}
								@endif" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>
							@if ($product -> stock > 0)
							<span class="badge bg-success text-white p-2"><i class="fa-solid fa-circle-check"></i> Ready
								Stok!</span>
							@else
							<span class="badge bg-danger text-white p-2"><i class="fa-solid fa-circle-xmark"></i> Stok
								Habis!</span>
							@endif
						</h3>
						<h3>{{ $product -> name }}</h3>
						<p class="single-product-pricing"><span></span>Rp. {{ number_format($product -> price) }}</p>
						<p>{{ $product -> description }}</p>
						<div class="single-product-form">
							{{-- <input type="text" name="name" id="" value="{{ $product -> name }}"
							placeholder="{{ $product -> name }}">
							<input type="text" name="image" id="" value="{{ $product -> image }}"
								placeholder="{{ $product -> image }}">
							<input type="text" name="price" id="" value="{{ $product -> price }}"
								placeholder="{{ $product -> price }}"> --}}
							<p><strong>Stok :</strong>{{ $product -> stock }}</p>
							<input type="number" min="0" name="quantity" id="" @if ($product -> stock == 0) disabled
							@endif
							><br>
							<button type="submit" class="cart-btn" style="border: none" @if ($product ->
								stock == 0 )
								disabled
								@endif><i class="fas fa-shopping-cart"></i> Add to
								Cart</button>
							<p><strong>Categories: </strong>{{ $product -> category -> name }}</p>
						</div>

					</div>
				</div>
			</div>
		</form>
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
					<p>Berikut ini kami juga menyediakan beberapa macam obat
						{{ Str::lower($product -> category -> name) }} yang ada
						di toko kami, dan juga sedang anda cari!</p>
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