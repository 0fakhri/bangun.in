@extends('cv.layout.app')

@section('content')

<main class="login-bg">
        <!-- login Area Start -->
        <div class="login-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="login-form">
                            <!-- Login Heading -->
                            <div class="login-heading">
                                <span>Tambah produk</span>
                                <p></p>
                            </div>
                            @if(empty($produk))
                            <form method="POST" action="post" enctype="multipart/form-data">
                                @csrf
                            <!-- Single Input Fields -->
                                <div class="input-box">
                                    <div class="single-input-fields">
                                        <label>Nama Produk</label>
                                        <input name="nama" class="@error('email') is-invalid @enderror" type="text" >
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="single-input-fields">
                                        <label>Harga Produk</label>
                                    
                                        <input name="harga" class="@error('password') is-invalid @enderror" type="number" placeholder="">
                                    </div>
                                    <div class="single-input-fields">
                                            <label>Upload foto</label>
                                            <input type="file" name="img" placeholder="foto">
                                        </div>
                                </div>
                                <!-- form Footer -->
                                <div class="login-footer">
                                    <button type="submit" class="submit-btn3">Simpan</button>
                                </div>
                            </form>
                            @elseif(!empty($produk))
                            <form method="POST" action="../postEdit" enctype="multipart/form-data">
                                @csrf
                            <!-- Single Input Fields -->
                                <div class="input-box">
                                    <div class="single-input-fields">
                                        <label>Nama Produk</label>
                                        <input name="nama" class="@error('email') is-invalid @enderror" type="text" value=" {{ $produk->nama_produk }} ">
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="id" value=" {{ $produk->id }} ">
                                    <div class="single-input-fields">
                                        <label>Harga Produk</label>
                                    
                                        <input name="harga" class="@error('password') is-invalid @enderror" type="number" placeholder="" value="{{ $produk->harga }}">
                                    </div>
                                    <div class="single-input-fields">
                                            <label>Upload foto</label>
                                            <input type="file" name="img" placeholder="foto">
                                        </div>
                                </div>
                                <!-- form Footer -->
                                <div class="login-footer">
                                    <button type="submit" class="submit-btn3">Simpan</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection