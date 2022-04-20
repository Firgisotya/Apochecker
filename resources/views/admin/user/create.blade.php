@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Basic Tables</h4>

        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Tambah User</h5>
                </div>
                <div class="card-body">
                  <form action="/admin/user" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="name">Nama User</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control  @error('name') is-invalid
                        @enderror" id="name" name="name" placeholder="Nama User" />
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="username">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control  @error('username') is-invalid
                          @enderror" id="username" name="username" placeholder="Username" />
                          @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="email">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('email') is-invalid
                        @enderror" id="email" name="email" placeholder="email" />
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="phone">Phone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('phone') is-invalid
                        @enderror" id="phone" name="phone" placeholder="phone" />
                        @error('phone')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="Gender">Gender</label>
                        <div class="col-sm-10">
                          <select class="form-select" name="gender">
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="address">Address</label>
                      <div class="col-sm-10">
                        <textarea
                          id="address"
                          name="address"
                          class="form-control @error('address') is-invalid
                          @enderror"
                          placeholder="Address"
                        ></textarea>
                        @error('address')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="Image">Image</label>
                        <div class="col-sm-10">
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('image') is-invalid
                            @enderror" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="password">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('password') is-invalid
                          @enderror" id="password" name="password" placeholder="password" />
                          @error('phone')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="Level">Level</label>
                        <div class="col-sm-10">
                          <select class="form-select" name="level">

                              <option value="admin">Admin</option>
                              <option value="pelanggan">Pelanggan</option>
                            </select>
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
