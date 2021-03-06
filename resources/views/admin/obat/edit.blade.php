@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Obat /</span> Basic Tables</h4>

    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="" style="transform: translateY(-20px)">
          <a href="/admin/product" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Obat</h5>
          </div>
          <div class="card-body">
            <form action="/admin/product/{{ $obat->slug }}" method="POST" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Nama Obat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control  @error('name') is-invalid
                        @enderror" id="name" name="name" placeholder="Nama Obat"
                    value="{{ old('name', $obat->name) }}" />
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
                <div class="col-sm-10">
                  <select class="form-select" name="category_id">
                    @foreach ($categories as $category)

                    <option value="{{ $category->id }}" {{ $obat->category_id == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="price">Harga</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('price') is-invalid
                        @enderror" id="price" name="price" placeholder="price"
                    value="{{ old('price', $obat->price) }}" />
                  @error('price')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="expired_date">Kadaluarsa</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control @error('expired_date') is-invalid
                        @enderror" id="expired_date" name="expired_date" placeholder="expired_date"
                    value="{{ old('expired_date', $obat->expired_date) }}" />
                  @error('expired_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>



              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="deaskripsi">Deskripsi</label>
                <div class="col-sm-10">
                  <input id="deaskripsi" name="description"
                    class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi"
                    value="{{ old('description', $obat->description) }}" size="50">
                  @error('description')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="image">Gambar</label>
                <div class="col-sm-10">

                  <img src="@if ($obat -> image == null)
                {{ asset('img/products/'.$obat -> slug.'.jpg') }}
                @else
                {{asset('storage/'.$obat->image)}}
              @endif" class="img-preview mb-3 " alt="{{ $obat -> name }}" height="200px" width="200px">

                  <div class="pt-3">
                    <input class=" form-control @error('image') is-invalid @enderror" type="file" id="image"
                      name="image" onchange="previewImage()">
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
