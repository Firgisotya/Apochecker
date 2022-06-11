@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Expired /</span> Basic Tables</h4>

    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Expired</h5>
          </div>
          <div class="card-body">
            <form action="/admin/product/expired/{{ $obat->id }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Expired">Nama Obat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('name') is-invalid
                          @enderror" id="name" name="name" placeholder="name" value="{{ $obat->name }}"  readonly/>
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Expired">Tanggal Kadaluarsa</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control @error('expired_date') is-invalid
                          @enderror" id="expired_date" name="expired_date" placeholder="expired_date" />
                  @error('expired_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
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
