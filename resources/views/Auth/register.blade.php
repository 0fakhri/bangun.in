@extends('layouts.app')

@section('content')
@if(session('error'))
<!-- Modal -->
    <div class="alert alert-danger" role="alert">
      {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
    <main class="login-bg">
        <!-- Register Area Start -->
        <div class="register-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="register-form text-center">
                            <!-- Login Heading -->
                            <div class="register-heading">
                                <span>Sign Up</span>
                                <p>Create your account to get full access</p>
                            </div>
                            <div class="container row justify-content-center">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#Customer" role="tab" aria-controls="home"
                                      aria-selected="true" style="color: rgb(92, 92, 92);">Customer</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="CV-tab" data-toggle="tab" href="#CV" role="tab" aria-controls="profile"
                                      aria-selected="false" style="color: rgb(92, 92, 92);">CV Perencana</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Single Input Fields -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form class="input-box" method="POST" action="/regCu">
                                        @csrf
                                        <!-- <div class="input-box"> -->
                                        <div class="single-input-fields">
                                            <label>Full name</label>
                                            <input name="nama" type="text" placeholder="Masukkan full name" class="@error('name') is-invalid @enderror">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="single-input-fields">
                                            <label>Email Address</label>
                                            <input name="email" type="email" placeholder="Masukkan email address" class="@error('name') is-invalid @enderror">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{session('error')}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="role" value="customer">
                                        <div class="single-input-fields">
                                            <label>Password</label>
                                            <input name="password" type="password" placeholder="Masukkan Password" class="@error('name') is-invalid @enderror">
                                        </div>
                                        @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <div class="single-input-fields">
                                            <label>Confirm Password</label>
                                            <input name="password_confirmation" type="password" placeholder="Confirm Password" >
                                        </div>
                                        <!-- form Footer -->
                                        <div class="register-footer">
                                            <p> Already have an account? <a href="{{ route('login') }}"> Login</a> here</p>
                                            <button type="submit" class="submit-btn3">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="CV" role="tabpanel" aria-labelledby="CV-tab">
                                    <form class="input-box" method="POST" action="/regCu" enctype="multipart/form-data">
                                        @csrf
                                    <!-- <div class="input-box"> -->
                                        <div class="single-input-fields">
                                            <label>Nama CV</label>
                                            <input name="nama_cv" type="text" placeholder="Masukkan nama CV">
                                        </div>
                                        <div class="single-input-fields">
                                            <label>Email Address</label>
                                            <input name="email" type="email" placeholder="Masukkan email address">
                                        </div>
                                        <div class="single-input-fields">
                                            <label>Password</label>
                                            <input name="password" type="password" placeholder="Masukkan Password">
                                        </div>
                                        <input type="hidden" name="role" value="cv">
                                        <div class="single-input-fields">
                                            <label>Confirm Password</label>
                                            <input type="password" placeholder="Confirm Password">
                                        </div>
                                        <div class="single-input-fields">
                                            <label>Alamat</label>
                                            <input name="alamat" type="text" placeholder="Alamat">
                                        </div>
                                        
                                        <div class="single-input-fields">
                                            <label>Upload Bukti</label>
                                            <input type="file" name="img" placeholder="Bukti">
                                        </div>
                                        <!-- form Footer -->
                                        <div class="register-footer">
                                            <p> Already have an account? <a href="{{ route('login') }}"> Login</a> here</p>
                                            <button type="submit" class="submit-btn3">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register Area End -->
    </main>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
