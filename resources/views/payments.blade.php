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
<form action="/buktiPembayaran" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Validation Payments</h1>
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
                                            Metode Pembayaran
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="tesss"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <img src="{{ asset('img/payments/'.$order -> payments.'.png') }}"
                                                                alt="{{ $order -> payments }}" height="100px"
                                                                style="object-fit: fill">
                                                        </label>
                                                    </div>
                                                    <q>Upload bukti pembayaran sesuai dengan jumlah tagihan pembelian
                                                        anda sebesar
                                                        Rp.<strong>
                                                            @if (!empty($order))
                                                            {{ number_format($order -> total) }}
                                                            @endif
                                                        </strong>
                                                        melalui
                                                        <strong>{{ $order -> payments }}</strong>.</q>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details" style="width: 270px">
                            <thead>
                                <tr>
                                    <th><strong>Product</strong></th>
                                    <th><strong>Total</strong></th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body" @if (!empty($order)) @foreach ($orderDetails as $orders)
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
                                @if (!empty($order))
                                <tr style="border-top: 5px">
                                    <td><strong>Total</strong></td>
                                    <td><strong>Rp. {{ number_format($order -> total) }}</strong></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="form-group my-4" style="widows: 270px">
                            <label for="exampleInputEmail1">Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" class="form-control" id="exampleInputEmail1"
                                style="width: 270px" required>
                            <small id="emailHelp" class="form-text text-muted">Upload bukti pembayaran anda
                                disini!</small>
                        </div>
                        <button type="submit" class="boxed-btn text-center border-0 mt-4"
                            style="width: 270px">Selesai!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end check out section -->


@endsection