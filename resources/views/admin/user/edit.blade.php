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
                  <h5 class="mb-0">Edit User</h5>
                </div>
                <div class="card-body">
                  <form action="/admin/user" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="name">Nama User</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control  @error('name') is-invalid
                        @enderror" id="name" name="name" placeholder="Nama User" value="{{ old('name', $user->name) }}" />
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
                          @enderror" id="username" name="username" placeholder="Username" value="{{ old('username', $user->username) }}"/>
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
                        @enderror" id="email" name="email" placeholder="email" value="{{ old('email', $user->email) }}"/>
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
                        @enderror" id="phone" name="phone" placeholder="phone" value="{{ old('phone', $user->phone) }}"/>
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
                              <option value="Laki-Laki" {{  $user->id ? 'selected' : '' }}>Laki-Laki</option>
                              <option value="Perempuan" {{  $user->id ? 'selected' : '' }}>Perempuan</option>
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
                          placeholder="Address" value="{{ old('address', $user->address) }}"
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
                            @if ($user -> image)
                            <img src="{{ asset($user -> image) }}" class="img-preview mb-3 " alt="" height="200px" width="200px">
                            @else
                            <img src="{{ asset('img/bahan/profile.png') }}" class="img-preview ">
                            @endif
                            <div class="pt-3">
                                <input class=" form-control @error('image') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                            </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="password">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('password') is-invalid
                          @enderror" id="password" name="password" placeholder="password"/>
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

                              <option value="admin" {{  $user->id ? 'selected' : '' }}>Admin</option>
                              <option value="user" {{  $user->id ? 'selected' : '' }}>Pelanggan</option>
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
