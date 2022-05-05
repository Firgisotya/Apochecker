@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Histori Order /</span> Detail Order</h4>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Pesanan atas nama : {{ $order -> user -> name }}</h5>
                {{-- <a href="" class="btn btn-primary">Tambah Obat</a> --}}
            </div>
            <div class="row mb-4">
                <div class="col-md-6 ">
                    <div class="card-body">
                        <h5>Informasi Pesanan</h5>
                        <table class="table">

                            <tbody>
                                <tr>
                                    <th>Nama Pemesan</th>
                                    <td>{{ $order -> user -> name }}</td>

                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $order -> user -> address }}</td>
                                </tr>
                                <tr>
                                    <th>No. Telp</th>
                                    <td>{{ $order -> user -> phone }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pesanan</th>
                                    <td>{{ $order -> time }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pesanan</th>
                                    <td>@if ($order->status == 0)
                                        <span class=" badge rounded-pill bg-danger"><strong>Belum Bayar <i
                                                    class="fa-solid fa-circle-xmark"></i></strong></span>
                                        @elseif ($order->status == 1)
                                        <span class=" badge rounded-pill bg-warning text-dark"><strong>Belum Tervalidasi
                                                <i class="fa-solid fa-circle-exclamation"></i></span>
                                        @elseif ($order->status == 2)
                                        <span class=" badge rounded-pill bg-success text-dark"><strong>Sudah Tervalidasi
                                                <i class="fa-solid fa-circle-check"></i></strong></span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pembayaran</th>
                                    <td><img src="{{ asset('img/payments/'.$order -> payments.'.png') }}" alt=""
                                            width="100px"></td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pesanan</th>
                                    <td>{{ $orderDetails -> product -> name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="text-center">Bukti Pembayaran</h5>
                            <img src="{{ asset('storage/'.$order -> bukti_pembayaran) }}" alt="" height="300px"
                                class="">
                        </div>
                        <form action="/admin/order/{{ $order -> id }}" method="POST" class="d-inline">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-warning d-inline" onclick="return confirm('Verifikasi penjualan?')"
                                @if ($order ->status == 2
                                ) disabled

                                @endif><i class="fa-solid fa-circle-check"></i></button>
                        </form>
                        <form action="/admin/order/{{ $order->id }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i
                                    class='bx bxs-trash'></i></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection