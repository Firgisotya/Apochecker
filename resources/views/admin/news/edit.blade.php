@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">News /</span> Edit News</h4>

        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="" style="transform: translateY(-20px)">
                    <a href="/admin/news" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit News</h5>
                    </div>
                    <div class="card-body">
                        <form action="/admin/news/{{ $news -> slug }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="oldImage" value="{{ $news -> photo }}" id="">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="image">Gambar</label>
                                <div class="col-sm-10">

                                    <img src="{{ asset('storage/'.$news -> photo) }}"
                                        class="img-preview mb-3 rounded img-fluid" alt="" height="250px" width="400px"
                                        style="object-fit: cover">
                                    <div class="pt-3">
                                        <input class=" form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="photo" onchange="previewImage()" style="object-fit: cover">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control  @error('name') is-invalid
                        @enderror" id="name" name="title" placeholder="Nama Obat"
                                        value="{{ old('title', $news->title) }}" />
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="deaskripsi">Content</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="content" name="content" value="{{ $news -> content }}">
                                        <trix-editor input="content"></trix-editor>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    
    imgPreview.style.display = 'block';
    
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    
    oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
    }
    }


    
</script>
@endsection