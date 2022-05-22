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
                                            width="150px"></td>
                                    </td>
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
                        <form action="/admin/order/{{ $order->id }}" method="POST" class="d-inline"
                            id="data-{{ $order -> id }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger border-0 delete" data-name={{ $order -> user -> name }}
                                data-slug={{ $order -> id }}><i class='bx bxs-trash'></i></button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Daftar pesanan : </th>
                                </tr>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Nama Product</th>
                                    <th class="text-center">Jumlah Pembelian</th>
                                    <th class="text-center">Harga</th>
                                </tr>
                                @foreach ($tes as $item)
                                <tr>
                                    <td class="text-center">{{ $loop -> iteration }}</td>
                                    <th class="text-center"><img src="@if ($item -> product -> image == null)
                                                    {{ asset('img/products/'.$item -> product -> slug.'.jpg') }}
                                                    @else
                                                    {{asset('storage/'.$item -> product -> image)}}
                                                  @endif" width="100px" height="100px"></th>
                                    <th class="text-center">{{ $item -> product -> name }}</th>
                                    <td class="text-center"> {{ $item -> quantity }}</td>
                                    <th class="text-center"> Rp. {{ number_format($item -> price) }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('sweetAlert')
<script>
    const deleteButton = document.querySelectorAll('.delete');
    deleteButton.forEach((dBtn) => {
        dBtn.addEventListener('click', function (event) {
            event.preventDefault();

            const postSlug = this.dataset.slug;
            const postTitle = this.dataset.name;
            Swal.fire({
                title: 'Are you sure to delete this data?',
                text: "You will delete data : " + postTitle,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const dataSlug = document.getElementById('data-' + postSlug);
                            dataSlug.submit();
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            )
                        }
            })
        })
    });
</script>
@endsection