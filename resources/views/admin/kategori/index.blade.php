@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kategori /</span> Basic Tables</h4>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Manajemen Kategori</h5>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/admin/kategori/create"
                        ><i class="bx bx-plus me-1"></i> Tambah Kategori</a
                      >
                    </div>
                  </div>
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
                    <th>Nama Kategori</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/admin/kategori/{{ $category->slug }}/edit" class="btn btn-warning"><i class='bx bxs-pencil'></i></a>
                            <form action="/admin/kategori/{{ $category->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class='bx bxs-trash' ></i></button>
                            </form>
                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>

@endsection
