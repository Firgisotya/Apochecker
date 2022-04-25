@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">News /</span> Basic Tables</h4>

        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tambah Obat</h5>
                    </div>
                    <div class="card-body">
                        <form action="/admin/news" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                                <div class="col-sm-10">
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control @error('photo') is-invalid
                                                        @enderror" type="file" id="photo" name="photo"
                                        onchange="previewImage()">
                                    @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="title">Judul Berita</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control  @error('title') is-invalid
                        @enderror" id="title" name="title" placeholder="Judul" />
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="date">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control  @error('date') is-invalid
                        @enderror" id="date" name="date" placeholder="Judul" />
                                    @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="deaskripsi">Content</label>
                                <div class="col-sm-10">
                                    <input type="hidden" id="content" name="content">
                                    <trix-editor input="content"></trix-editor>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
      const photo = document.querySelector('#photo');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(photo.files[0]);

      oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
      }
      }
      document.addEventListener('trix-file-accept', function(e){
          e.preventDefault();
      })
</script>
@endsection
