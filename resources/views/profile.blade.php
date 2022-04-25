@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<div class="bg" style="background-color: #f5f6fa">
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
    <div class="container mt-4">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <form method="POST" action="/profile/{{ $user -> id }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container" style="background-color: #f5f6fa">
            <div class="row gutters p-5">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile pt-4">
                                    <p><strong>Photo Profile</strong></p>
                                    <input type="hidden" name="oldImage" value="{{ $user -> image }}">
                                    @if ($user -> image)
                                    <img src="{{ asset('storage/'.$user -> image) }}"
                                        class="img-preview mb-3  m-auto rounded-circle" alt="" height="200px"
                                        width="200px">
                                    @else
                                    <img src="{{ asset('img/bahan/profile.png') }}"
                                        class="img-preview m-auto rounded-circle">
                                    @endif
                                    <div class="pt-3">
                                        <input class="mb-3 @error('image')is-invalid @enderror" type="file" id="image"
                                            name="image" onchange="previewImage()" height="200px" width="200px">
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
                                            placeholder="Masukkan Nama Lengkap" value="{{ $user -> name }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                            placeholder="Masukkan Username" value=" {{ $user -> username }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" name="email" class="form-control" id="eMail"
                                            placeholder="Masukkan Alamat Email" value="{{ $user -> email }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Jenis Kelamin</label>
                                        <select name="gender" class="form-control" id="website">
                                            <option value="Laki-laki" @if ( $user -> gender == 'Laki-laki' )
                                                selected
                                                @endif>Laki-laki</option>
                                            <option value="Perempuan" @if ( $user -> gender == 'Perempuan' )
                                                selected
                                                @endif>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters mb-5">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="street">Address</label>
                                        <input type="text" class="form-control" id="Street"
                                            placeholder="Masukkan alamat" name="address" value="{{ $user -> address }}"
                                            height="200px">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="hp">No Hp</label>
                                        <input type="text" class="form-control" id="hp" placeholder="Masukkan No Hp"
                                            name="phone" value="{{ $user -> phone }}" height="200px">
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button>
                                        <button type="submit" id="submit" name="submit"
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