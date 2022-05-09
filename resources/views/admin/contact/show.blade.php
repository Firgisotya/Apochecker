@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin/news">News</a> /hihi</h4>

        <div class="card p-3">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Detail News</h5>
            </div>
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Pengirim</th>
                                <th scope="row">:</th>
                                <td>{{ $contact -> name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email Pengirim</th>
                                <th scope="row">:</th>
                                <td>{{ $contact -> email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">No HP Pengirim</th>
                                <th scope="row">:</th>
                                <td>{{ $contact -> phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Judul Pesan</th>
                                <th scope="row">:</th>
                                <td>{{ $contact -> subject }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Isi Pesan</th>
                                <th scope="row">:</th>
                                <td>{{ $contact -> message }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection