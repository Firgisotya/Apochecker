@php
$order = \App\Models\Order::where('user_id', auth()->user()->id)->where('status',
0)->first();

if (!empty($order)) {
$orderDetails = \App\Models\OrderDetail::where('order_id', $order->id)->get();
}
@endphp
@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Cart</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		@if (session()->has('success'))
		<div class="alert alert-success alert-dismissible fade show p-3" role="alert">
			<strong>{{ session('success') }}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<div class="row">

			<div class="btn-group col-lg-12 mb-4" role="group" aria-label="Basic example">
				{{-- <button type="button" class="btn btn-outline-info {{ Request::is('cart')? 'active'  : ''}}"><a
					href="/cart">Belum dibayar</a></button>
				<button type="button" class="btn btn-outline-info {{ Request::is('cart2')? 'active'  : ''}}"><a
						href="/cart2">Dalam proses</a></button> --}}
				<a class="btn btn-outline-danger {{ Request::is('cart')? 'active'  : ''}}" href="/cart"><strong>Belum
						dibayar</strong> <i class="fa-solid fa-calendar-clock"></i></a>
				<a class="btn btn-outline-info {{ Request::is('cart2')? 'active'  : ''}}" href="/cart2"><strong>Dalam
						proses</strong> </a>
				<a class="btn btn-outline-success {{ Request::is('cart3')? 'active'  : ''}}"
					href="/cart3"><strong>Riwayat
						Belanja</strong> </a>

			</div>

			<div class="col-lg-8 col-md-12">
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead class="cart-table-head" height="58px">
							<tr>
								<th class="text-center">Action</th>
								<th class="text-center">Product Image</th>
								<th class="text-center">Name</th>
								<th class="text-center">Price</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Total</th>

							</tr>
						</thead>
						<tbody>
							@if (!empty($order))
							@foreach ($orderDetails as $orderDetail)
							<tr class="table-body-row">
								<td class="product-remove">
									<form action="/order/{{ $orderDetail -> id }}" method="POST">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-danger"><i
												class="fa-solid fa-trash"></i></button>
									</form>
								</td>

								<td class="product-image"><img src="@if ($orderDetail -> product -> image == null)
								{{ asset('img/products/'.$orderDetail -> product -> slug.'.jpg') }}
								@else
								{{ asset('storage/'.$orderDetail -> image) }}
								@endif" alt=""></td>
								<td class="product-name">{{ $orderDetail -> product -> name }}</td>
								<td class="product-price">Rp. {{ number_format($orderDetail -> product -> price) }}</td>
								<td class="product-price">{{ $orderDetail -> quantity }}</td>
								<td class="product-total">Rp. {{ number_format($orderDetail -> price) }}</td>
							</tr>
							@endforeach
							@else
							<tr class="text-black text-center">
								<td colspan="7">
									{{-- <h3>Anda belum memesan product</h3> --}}
									<h5>Keranjangmu masih kosong nih!, <a href="/products">Ayo pesan Sesuatu!</a></h5>
								</td>
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="total-section">
					<table class="total-table">
						<thead class="total-table-head">
							<tr class="table-total-row">
								<th class="text-center">Total</th>
								<th class="text-center">Price</th>
							</tr>
						</thead>
						<tbody>
							@if (!empty($order))
							<tr class="total-data">
								<td class="text-center"><strong>Total: </strong></td>
								<td class="text-center">Rp. {{ number_format($order -> total) }}</td>
							</tr>
							@else
							{{-- <tr class="total-data">
								<td><strong>Subtotal: </strong></td>
								<td>0</td>
							</tr> --}}
							{{-- <tr class="total-data">
								<td><strong>Shipping: </strong></td>
								<td>0</td>
							</tr> --}}
							<tr class="total-data">
								<td><strong>Total: </strong></td>
								<td>0</td>
							</tr>
							@endif
						</tbody>
					</table>
					<div class="cart-buttons">
						<button class="boxed-btn text-center border-0 " @if (empty($order)) disabled @endif><a
								href="/checkout" class="text-white d-block " style="width: 100%;">Checkout</a>
						</button>
						{{-- <a href="/checkout" class="boxed-btn black"><button class="border-0 bg-transparent text-white"
								@if (empty($order)) disabled @endif>
								Check Out</button></a> --}}
					</div>
				</div>

				{{-- <div class="coupon-section">
					<h3>Apply Coupon</h3>
					<div class="coupon-form-wrap">
						<form action="index.html">
							<p><input type="text" placeholder="Coupon"></p>
							<p><input type="submit" value="Apply"></p>
						</form>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
</div>
<!-- end cart -->


@endsection