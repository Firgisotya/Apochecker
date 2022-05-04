@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Histori Order /</span> Basic Tables</h4>

    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="">Histori Order</h5>
        {{-- <a href="" class="btn btn-primary">Tambah Obat</a> --}}
      </div>

      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th class="text-white">Nama User</th>
              <th class="text-white">Tanggal</th>
              <th class="text-white">Status</th>

              <th class="text-white">Total</th>
              <th class="text-white">Bukti</th>
              <th class="text-white">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($orders as $order)
            <tr>
              <td>{{ $order->user->name }}</td>
              <td>{{ $order->time }}</td>
              <td>@if ($order->status == 0)
                Belum Bayar
                @elseif ($order->status == 1)
                Sudah Bayar
                @endif
              </td>

              <td>Rp. {{ number_format($order->total) }}</td>
              <td></td>
              <td>
                <a href="/admin/histori_penjualan/{{ $order -> id }}" class="btn btn-info"><i
                    class='bx bx-show'></i></a>
                <form action="/admin/histori_penjualan/{{ $order->id }}" method="POST" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i
                      class='bx bxs-trash'></i></button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
        <div class="d-flex justify-content-lg-center">
          {{ $orders->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection