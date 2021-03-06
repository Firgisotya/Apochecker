@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<form action="/pesanan" method="POST">
	@csrf
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

	{{-- Menampilkan pesan error --}}
	@if (session()->has('error'))
	<div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
		<strong>{{ session('error') }} <i class="fa-solid fa-trash-can"></i></strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
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
											<div class="row">
												<div class="col-lg-4 ">
													<div class="mb-3">
														<label for="exampleInputEmail1" class="form-label d-block "
															style="padding-left: 80px"><Strong>Foto</Strong></label>
														@if ($user -> image)
														<img src="{{ 'storage/'.$user -> image }}" alt="" height="200px"
															width="200px" class="rounded-circle">
														@else
														<img src="{{ asset('img/bahan/profile.png') }}" alt=""
															height="200px">
														@endif
													</div>
												</div>
												<div class="col-lg-8">
													<table class="table mt-4">
														<tbody>
															<tr>
																<th>Nama</th>
																<td>{{ $user -> name }}</td>
															</tr>
															<tr>
																<th>Nomor Handphone</th>
																<td>{{ $user -> phone }}</td>
															</tr>
															<tr>
																<th>Alamat Email</td>
																<td>{{ $user -> email }}</td>
															</tr>
															<tr>
																<th>Jenis Kelamin</td>
																<td>{{ $user -> gender }}</td>
															</tr>
															<tr>
																<th></th>
																<th></th>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<p><a href="/profile">*Anda ingin mengubah informasi?</a></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#qwe" aria-expanded="false" aria-controls="qwe">
											Alamat Pengiriman
										</button>
									</h5>
								</div>
								<div id="qwe" class="collapse" aria-labelledby="headingTwo"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="shipping-address-form">
											@if ($user -> address)
											<p>{{ $user -> address }}</p>
											@else
											<p>Anda belum memasukkan alamat rumah anda!, <a href="/profile">Klik
													disini</a>
												untuk melengkapi data diri</p>
											@endif
											<p class="mt-2"><a href="/profile">*Anda ingin mengubah informasi?</a></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="tesss">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseTwo" aria-expanded="false"
											aria-controls="collapseTwo">
											Pilih Metode Pembayaran
										</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="tesss"
									data-parent="#accordionExample">
									<div class="card-body">
										<table class="table">
											<tbody>
												<tr>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="payments"
																id="exampleRadios1" value="shopeepay">
															<label class="form-check-label" for="exampleRadios1">
																<img src="{{ asset('img/payments/shopeepay.png') }}"
																	alt="" height="100px" style="object-fit: fill">
															</label>
														</div>
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="payments"
																id="exampleRadios2" value="linkaja">
															<label class="form-check-label" for="exampleRadios2">
																<img src="{{ asset('img/payments/linkaja.png') }}"
																	alt="" height="100px">
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="payments"
																id="exampleRadios3" value="gopay">
															<label class="form-check-label" for="exampleRadios3">
																<img src="{{ asset('img/payments/gopay.png') }}" alt=""
																	height="100px">
															</label>
														</div>
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="payments"
																id="exampleRadios4" value="bca">
															<label class="form-check-label" for="exampleRadios4">
																<img src="{{ asset('img/payments/bca.png') }}" alt=""
																	height="100px">
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="payments"
																id="exampleRadios5" value="bri">
															<label class="form-check-label" for="exampleRadios5">
																<img src="{{ asset('img/payments/bri.png') }}" alt=""
																	height="100px">
															</label>
														</div>
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="payments"
																id="exampleRadios6" value="mandiri">
															<label class="form-check-label" for="exampleRadios6">
																<img src="{{ asset('img/payments/mandiri.png') }}"
																	alt="" height="100px">
															</label>
														</div>
													</td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseThree" aria-expanded="false"
											aria-controls="collapseThree">
											Intruksi Pembayaran
										</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="card-details">
											<div class="checkout-accordion-wrap">
												<div class="accordion" id="tes">
													<div class="card single-accordion">
														<div class="card-header" id="satu">
															<h5 class="mb-0">
																<button class="btn btn-link" type="button"
																	data-toggle="collapse" data-target="#satuu"
																	aria-expanded="true" aria-controls="satuu">
																	Shopeepay
																</button>
															</h5>
														</div>

														<div id="satuu" class="collapse" aria-labelledby="satu"
															data-parent="#tes">
															<div class="card-body">
																<h5>Tata cara pembayaran menggunakan shopeepay</h5>
																<ul>
																	<li>Buka akun shopee anda</li>
																	<li>Pilih menu transfer</li>
																	<li>Pilih kirim ke rekening bank</li>
																	<li>Untuk tujuan bank silahkan pilih bank
																		<strong>BCA</strong>
																	</li>
																	<li>Masukkan nomor rekening
																		<strong>9857614281</strong>
																		atas nama Apotek
																	</li>
																	<li>Kemudian masukkan jumlah tagihan untuk
																		menyelesaikan
																		pembayaran</li>
																</ul>
																<p><strong>*untuk transaksi transfer ke bank dari
																		shopeepay
																		mungkin saja
																		dikenai
																		biaya pajak</strong></p>
															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="dua">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button"
																	data-toggle="collapse" data-target="#duaa"
																	aria-expanded="false" aria-controls="duaa">
																	LinkAja
																</button>
															</h5>
														</div>
														<div id="duaa" class="collapse" aria-labelledby="dua"
															data-parent="#tes">
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
																	OVO
																</button>
															</h5>
														</div>
														<div id="tigaa" class="collapse" aria-labelledby="tiga"
															data-parent="#tes">
															<div class="card-body">
																<div class="card-details">
																	<p>Your card details goes here.</p>
																</div>
															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="empat">
															<h5 class="mb-0">
																<button class="btn btn-link" type="button"
																	data-toggle="collapse" data-target="#empatu"
																	aria-expanded="false" aria-controls="empatu">
																	BCA
																</button>
															</h5>
														</div>

														<div id="empatu" class="collapse " aria-labelledby="empat"
															data-parent="#tes">
															<div class="card-body">

															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="lima">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button"
																	data-toggle="collapse" data-target="#limaa"
																	aria-expanded="false" aria-controls="limaa">
																	BRI
																</button>
															</h5>
														</div>
														<div id="limaa" class="collapse" aria-labelledby="lima"
															data-parent="#tes">
															<div class="card-body">
																<div class="shipping-address-form">
																	<p>Your shipping address form is here.</p>
																</div>
															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="enam">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button"
																	data-toggle="collapse" data-target="#enama"
																	aria-expanded="false" aria-controls="enama">
																	Mandiri
																</button>
															</h5>
														</div>
														<div id="enama" class="collapse" aria-labelledby="enam"
															data-parent="#tes">
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
						<table class="order-details" style="width: 270px">
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
						<button type="submit" class="boxed-btn text-center border-0 mt-4"
							style="width: 270px">Selesaikan
							Pembayaran</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- end check out section -->


@endsection
