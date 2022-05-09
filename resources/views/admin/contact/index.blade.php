@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contact /</span> Basic Tables</h4>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Manajemen Contact</h5>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/product/create"><i class="bx bx-plus me-1"></i> Tambah
                            Contact</a>
                    </div>
                </div>
                {{-- <a href="" class="btn btn-primary">Tambah item</a> --}}
            </div>

            @if (session()->has('success'))
            <div class="alert alert-success mx-4" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-white text-center">#</th>
                            <th class="text-white text-center">Nama</th>
                            <th class="text-white text-center">Email</th>
                            <th class="text-white text-center">No HP</th>
                            {{-- <th class="text-white text-center">Judul</th> --}}
                            <th class="text-white text-center">Pesan</th>
                            <th class="text-white text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $contact -> name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            {{-- <td>{{ $contact->subject }}</td> --}}
                            <td>{{ $contact->message }}</td>
                            <td>
                                <a href="/admin/contact/{{ $contact -> id }}" class="btn btn-info"><i
                                        class='bx bx-show'></i></a>

                                <form action="/admin/contact/{{ $contact->id }}" method="POST" class="d-inline">
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
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection