<style>
    a {
        text-decoration: none;
    }
</style>
<div>@extends('layouts.landingpage.main')

    @section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>It's all about me</p>
                        <h1>User Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <form action="" enctype="multipart/form-data">
        <div class="container-fluid" style="background-color: #f5f6fa">
            <div class="row gutters p-5">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile pt-4">
                                    <p><strong>Photo Profile</strong></p>
                                    @if ($user -> image)
                                    <img src="{{ asset('assets/products/'.$product -> gambar) }}"
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block rounded m-auto" alt=""
                                        height="200px">
                                    @else
                                    <img src="{{ asset('img/bahan/profile.png') }}" class="img-preview m-auto rounded"
                                        alt="" height="200px" width="200px">
                                    @endif
                                    <div class="pt-3">
                                        <input class=" @error('image')
                                                                        is-invalid
                                                                    @enderror" type="file" id="image" name="image"
                                            onchange="previewImage()">
                                    </div>
                                    <div class="pt-3">
                                        <h5 class="user-name">{{ $user -> name }}</h5>
                                        <h6 class="user-email">{{ $user -> email }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Name</label>
                                        <input type="text" class="form-control" id="fullName" name="name"
                                            placeholder="Enter full name" value="{{ $user -> name }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" name="email" class="form-control" id="eMail"
                                            placeholder="Enter email ID" value="{{ $user -> email }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            placeholder="Enter phone number" value=" {{ $user -> phone }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Jenis Kelamin</label>
                                        <select name="gender" class="form-control">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Street"
                                            placeholder="Masukkan alamat" name="address" value="{{ $user -> address }}"
                                            height="200px">
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button>
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
</div>