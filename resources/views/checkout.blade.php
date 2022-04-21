@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Check Out Product</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="checkout-accordion-wrap">
					<div class="accordion" id="accordionExample">
						<div class="card single-accordion">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse"
										data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Informasi Pembeli
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
								data-parent="#accordionExample">
								<div class="card-body">
									<div class="billing-address-form">
										<form>
											<div class="mb-3">
												<label for="exampleInputEmail1" class="form-label d-block "
													style="padding-left: 80px"><Strong>Foto</Strong></label>
												@if ($user -> image)
												<img src="{{ 'storage/'.$user -> image }}" alt="" height="200px"
													width="200px" class="rounded-circle">
												@else
												<img src="{{ asset('img/bahan/profile.png') }}" alt="" height="200px">
												@endif
											</div>
											<div class="mb-3">
												<label for="exampleInputEmail1"
													class="form-label"><strong>Nama</strong></label>
												<input type="text" class="form-control p-4" id="exampleInputEmail1"
													aria-describedby="emailHelp" value="{{ $user -> name }}">
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label"><strong>Nomor
														Telepon</strong></label>
												<input type="text" class="form-control p-4" id="exampleInputPassword1"
													value="{{ $user -> phone }}">
											</div>
											<div class="mb-3">
												<label for="exampleInputPassword1" class="form-label"><strong>Alamat
														Email</strong></label>
												<input type="text" class="form-control p-4" id="exampleInputPassword1"
													value="{{ $user -> email }}">
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="card single-accordion">
							<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
										data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Alamat Pengiriman
									</button>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
								data-parent="#accordionExample">
								<div class="card-body">
									<div class="shipping-address-form">
										@if ($user -> address)
										<p>{{ $user -> address }}</p>
										@else
										<p>Anda belum memasukkan alamat rumah anda!, <a href="/profile">Klik disini</a>
											untuk melengkapi data diri</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="card single-accordion">
							<div class="card-header" id="headingThree">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
										data-target="#collapseThree" aria-expanded="false"
										aria-controls="collapseThree">
										Card Details
									</button>
								</h5>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
								data-parent="#accordionExample">
								<div class="card-body">
									<div class="card-details">
										<div class="checkout-accordion-wrap">
											<div class="accordion" id="accordionExample">
												<div class="card single-accordion">
													<div class="card-header" id="satu">
														<h5 class="mb-0">
															<button class="btn btn-link" type="button"
																data-toggle="collapse" data-target="#satuu"
																aria-expanded="true" aria-controls="satuu">
																Billing Address
															</button>
														</h5>
													</div>

													<div id="satuu" class="collapse show" aria-labelledby="satu"
														data-parent="#accordionExample">
														<div class="card-body">

														</div>
													</div>
												</div>
												<div class="card single-accordion">
													<div class="card-header" id="dua">
														<h5 class="mb-0">
															<button class="btn btn-link collapsed" type="button"
																data-toggle="collapse" data-target="#duaa"
																aria-expanded="false" aria-controls="duaa">
																Shipping Address
															</button>
														</h5>
													</div>
													<div id="duaa" class="collapse" aria-labelledby="dua"
														data-parent="#accordionExample">
														<div class="card-body">
															<div class="shipping-address-form">
																<p>Your shipping address form is here.</p>
															</div>
														</div>
													</div>
												</div>
												<div class="card single-accordion">
													<div class="card-header" id="tiga">
														<h5 class="mb-0">
															<button class="btn btn-link collapsed" type="button"
																data-toggle="collapse" data-target="#tigaa"
																aria-expanded="false" aria-controls="tigaa">
																Card Details
															</button>
														</h5>
													</div>
													<div id="tigaa" class="collapse" aria-labelledby="tiga"
														data-parent="#accordionExample">
														<div class="card-body">
															<div class="card-details">
																<p>Your card details goes here.</p>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-4">
				<div class="order-details-wrap">
					<table class="order-details">
						@php
						$order = \App\Models\Order::where('user_id', auth()->user()->id)->where('status',
						0)->first();

						if (!empty($order)) {
						$orderDetails = \App\Models\OrderDetail::where('order_id', $order->id)->get();
						}
						@endphp

						<thead>
							<tr>
								{{-- <th>Your order Details</th>
								<th>Price</th> --}}
								<th><strong>Product</strong></th>
								<th><strong>Total</strong></th>
							</tr>
						</thead>
						<tbody class="order-details-body">
							{{-- <tr>
								<td><strong>Product</strong> </td>
								<td><strong>Total</strong> </td>
							</tr> --}}
							@if (!empty($order))
							@foreach ($orderDetails as $orders)
							<tr>
								<td>{{ $orders -> product -> name }}</td>
								<td>Rp. {{ number_format($orders -> price) }}</td>
							</tr>
							@endforeach
							@else
							<tr class="text-black text-center">
								<td colspan="7">
									<h3>Anda belum memesan product</h3>
								</td>
							</tr>

							@endif

						</tbody>
						<tbody class="checkout-details">
							{{-- <tr>
								<td>Subtotal</td>
								<td>$190</td>
							</tr>
							<tr>
								<td>Shipping</td>
								<td>$50</td>
							</tr> --}}
							@if (!empty($order))
							<tr style="border-top: 5px">
								<td><strong>Total</strong></td>
								<td><strong>Rp. {{ number_format($order -> total) }}</strong></td>
							</tr>
							@endif
						</tbody>
					</table>
					<a href="/validation" class="boxed-btn text-center" style="width: 270px">Place Order</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end check out section -->


@endsection