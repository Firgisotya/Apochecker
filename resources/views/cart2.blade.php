@php
// $order = \App\Models\Order::where('user_id', auth()->user()->id)->where('status',
// 1)->get();

// if ($order) {
// $orderDetails = \App\Models\OrderDetail::where('order_id', $order -> id)->get();
// }

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
                <a class="btn btn-outline-info {{ Request::is('cart')? 'active'  : ''}}" href="/cart"><strong>Belum
                        dibayar</strong> <i class="fa-solid fa-calendar-clock"></i></a>
                <a class="btn btn-outline-info {{ Request::is('cart2')? 'active'  : ''}}" href="/cart2"><strong>Dalam
                        proses</strong> </a>

            </div>
            <div class="col-lg-12 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head" height="58px">
                            <tr>
                                <th class="text-center">Product Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Payments</th>
                                <th class="text-center">Total</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($order))
                            @foreach ($orderDetails as $orderDetail)
                            <tr class="table-body-row">
                                <td class="product-image"><img src="@if ($orderDetail -> product -> image == null)
								{{ asset('img/products/'.$orderDetail -> product -> slug.'.jpg') }}
								@else
								{{ asset('storage/'.$orderDetail -> image) }}
								@endif" alt=""></td>
                                <td class="product-name">{{ $orderDetail -> product -> name }}</td>
                                <td class="product-price">Rp. {{ number_format($orderDetail -> product -> price) }}</td>
                                <td class="product-price">{{ $orderDetail -> quantity }}</td>
                                <td class="product-price">
                                    <img src="{{ asset('img/payments/'.$orderDetail -> order -> payments.'.png') }}"
                                        alt="" width="100px">
                                </td>
                                <td class="product-total">Rp. {{ number_format($orderDetail -> price) }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr class="text-black text-center">
                                <td colspan="7">
                                    {{-- <h3>Anda belum memesan product</h3> --}}
                                    <h5>Belum ada pesanan yang telah dicheckout, <a href="/cart">Selesaikan
                                            pembayaran!</a></h5>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart -->


@endsection