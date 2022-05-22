@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin/news">News</a> /</span>
            {{ $news -> title }}</h4>

        <div class="card p-3">
            <div class="px-3">
                <a href="/admin/news" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Detail News</h5>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$news ->photo) }}" alt="" class="rounded " width="350px"
                        height="250px" style="object-fit: cover">
                    <p class="text-center pt-1">Penulis : {{ $news -> user -> name }}</p>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">{{ $news -> title }}</h3>
                        <p class="card-text">{!! $news -> content !!}</p>
                        <p class="card-text"><small class="text-muted">{{ $news -> created_at }}</small></p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection