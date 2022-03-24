@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Obat /</span> Basic Tables</h4>

        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Tambah Obat</h5>
                </div>
                <div class="card-body">
                  <form action="/admin/obat" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="nama_obat">Nama Obat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Nama Obat" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
                      <div class="col-sm-10">
                        <select class="form-select" name="kategori">
                            <option value="1">One</option>
                          </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="harga" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="stok">Stok</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="stok" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="deaskripsi">Deskripsi</label>
                      <div class="col-sm-10">
                        <textarea
                          id="deaskripsi"
                          name="gambar"
                          class="form-control"
                          placeholder="Deskripsi"
                        ></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="gambar" name="gambar">
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
@endsection
