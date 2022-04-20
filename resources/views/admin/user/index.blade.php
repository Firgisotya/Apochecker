@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Basic Tables</h4>

    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="">Manajemen User</h5>
        <div class="dropdown">
          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/admin/user/create"><i class="bx bx-plus me-1"></i> Tambah User</a>
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
              <th>Nama User</th>
              <th>Username</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Level</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($users as $user)
            <tr>
              <td><img src="{{asset('storage/'.$user->image)}}" width="100px" height="100px"></td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->phone }}</td>
              <td>{{ $user->gender }}</td>
              <td>{{ $user->address }}</td>
              <td>{{ $user->level }}</td>
              <td>
                <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-warning"><i
                    class='bx bxs-pencil'></i></a>
                <form action="/admin/user/{{ $user->id }}" method="POST" class="d-inline">
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
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
