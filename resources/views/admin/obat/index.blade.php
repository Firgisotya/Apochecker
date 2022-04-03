@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Obat /</span> Basic Tables</h4>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Manajemen Obat</h5>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/admin/obat/create"
                        ><i class="bx bx-plus me-1"></i> Tambah Obat</a
                      >
                    </div>
                  </div>
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
                    <th>Gambar</th>
                    <th>Nama Obat</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($obats as $obat)
                    <tr>
                        <td><img src="{{ asset($obat->image) }}" width="100px" height="100px"></td>
                        <td>{{ $obat->name }}</td>
                        <td>{{ $obat->category->name }}</td>
                        <td>{{ $obat->price }}</td>
                        <td>{{ $obat->stock }}</td>
                        <td>
                            <a href="/admin/obat/{{ $obat->slug }}/edit" class="btn btn-warning"><i class='bx bxs-pencil'></i></a>
                            <form action="/admin/obat/{{ $obat->slug }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class='bx bxs-trash' ></i></button>
                            </form>
                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
              <div class="d-flex justify-content-lg-center">
                {{ $obats->links() }}
                </div>
            </div>
          </div>
    </div>
</div>

@endsection
