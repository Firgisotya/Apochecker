@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Stok /</span> Basic Tables</h4>

    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="">Manajemen Stok</h5>
        <div class="dropdown">
          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/admin/stok/create"><i class="bx bx-plus me-1"></i> Tambah Stok</a>
          </div>
        </div>
        {{-- <a href="" class="btn btn-primary">Tambah Obat</a> --}}
      </div>



      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th>Nama User</th>
              <th>Nama Product</th>
              <th>Tanggal</th>
              <th>Qty</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($stoks as $stok)
            <tr>
              <td>{{ $stok->user->name }}</td>
              <td>{{ $stok->product->name }}</td>
              <td>{{ $stok->date }}</td>
              <td>{{ $stok->qty }}</td>
              <td>
                <form action="/admin/stok/{{ $stok->id }}" method="POST" class="d-inline">
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
          {{ $stoks->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection