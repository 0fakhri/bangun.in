@extends('layouts.app')

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('null'))
<script>
    swal({
        title: "Data harus diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
@endif
@if(session('salah'))
<script>
    swal({
        title: "Maaf data yang anda masukkan tidak valid. Harap periksa kembali",
    
        icon: "warning",
        button: "Ok",
    });
    </script>
@endif

@if(session('daftar'))
<script>
    swal({
        title: "Registrasi Berhasil",
        
        icon: "success",
        button: "Ok",
    });
    </script>
@endif

<main class="login-bg">
        <!-- login Area Start -->
        <div class="login-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="login-form">
                            <!-- Login Heading -->
                            <div class="login-heading">
                                <span>Login</span>
                                <!-- <p>Enter Login details to get access</p> -->
                            </div>
                            <form method="POST" action="postlogin">
                                @csrf
                            <!-- Single Input Fields -->
                                <div class="input-box">
                                    <div class="single-input-fields">
                                        <label>Email</label>
                                        <input name="email" class="@error('email') is-invalid @enderror" type="text" placeholder="Masukkan email">
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="single-input-fields">
                                        <label>Password</label>
                                        <input name="password" class="@error('password') is-invalid @enderror" type="password" placeholder="Masukkan password">
                                    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="single-input-fields login-check">
                                        <!-- <input type="checkbox" id="fruit1" name="keep-log" {{ old('remember') ? 'checked' : '' }}> -->
                                        <!-- <label for="fruit1">Keep me logged in</label> -->

                                        @if (Route::has('password.request'))
                                            <!-- <a href="{{ route('password.request') }}" class="f-right">Forgot Password?</a> -->
                                        @endif
                                    </div>
                                </div>
                                <!-- form Footer -->
                                <div class="login-footer">
                                    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a>  disini</p>
                                    <button type="submit" class="submit-btn3">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login Area End -->
    </main>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
