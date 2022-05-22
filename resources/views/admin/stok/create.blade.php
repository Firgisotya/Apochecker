@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Stok /</span> Basic Tables</h4>

    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Stok</h5>
          </div>
          <div class="card-body">
            <form action="/admin/stok" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Product">Product</label>
                <div class="col-sm-10">
                  <select class="form-select" name="product_id">
                    @foreach ($products as $product)

                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Date">Date</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control @error('date') is-invalid
                        @enderror" id="date" name="date" placeholder="date" />
                  @error('date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Qty">Qty</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('qty') is-invalid
                          @enderror" id="qty" name="qty" placeholder="qty" />
                  @error('qty')
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