@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Shop</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- products -->

<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="product-filters">
					<ul>
						<li class="active" data-filter="*">All</li>
						@foreach ($categories as $category)
						<li data-filter=".{{ $category -> name }}">{{ $category -> name }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>

		<div class="row product-lists">
			@foreach ($products as $product)
			<div class="col-lg-4 col-md-6 text-center {{ $product -> category -> name }}">
				<div class="single-product-item">
					<div class="product-image">
						<a href="/products/{{ $product -> slug }}"><img src="
								@if ($product -> image == null)
									{{ asset('img/products/'.$product -> slug.'.jpg') }}
								@else
									{{ asset('storage/'.$product -> image) }}
								@endif" alt="{{ $product -> slug }}" height="250px"></a>
					</div>
					<h3>{{ $product -> name }}</h3>
					<p class="product-price"><span></span> Rp. {{ number_format($product -> price) }} </p>
					<a href="/products/{{ $product -> slug }}" class="cart-btn"><i class="fas fa-shopping-cart"></i>
						Order</a>
				</div>
			</div>
			@endforeach

		</div>

		<div class="d-flex justify-content-center py-5">
			{{ $products -> links() }}
		</div>

	</div>
</div>
<!-- end products -->


@endsection