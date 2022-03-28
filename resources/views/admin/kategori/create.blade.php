@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kategori /</span> Basic Tables</h4>

        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Tambah Kategori</h5>
                </div>
                <div class="card-body">
                  <form action="/admin/kategori" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="name">Nama Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kategori" />
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="slug">Slug</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" disabled readonly/>
                        </div>
                      </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
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
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/admin/kategori/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection
