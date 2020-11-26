@extends('customer.layout.app')
@section('content')

<main class="login-bg">
    <!--? slider Area Start-->
    <!-- <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="fadeInUp" data-delay=".4s" >Pemesanan</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pemesanan</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- slider Area End-->

    <!--? Checkout Area Start-->
    <div class="login-form-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="login-form">
                        <!-- Login Heading -->
                    @if(empty($produk))
                        <div class="login-heading">
                            <span>Tambah produk</span>
                            <p></p>
                        </div>
                        <form method="POST" action="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Single Input Fields -->
                            <div class="input-box">
                                <div class="single-input-fields">
                                    <label>Nama Produk</label>
                                    <input name="nama" class="@error('nama') is-invalid @enderror" type="text" >
                                </div>
                                <div class="single-input-fields">
                                    <label>Harga Produk</label>
                                
                                    <input name="harga" class="@error('harga') is-invalid @enderror" type="number" placeholder="">
                                </div>
                                <div class="single-input-fields">
                                    <label>Foto produk</label>
                                    <input type="file" name="img" placeholder="foto" class="@error('img') is-invalid @enderror" >
                                </div>
                                
                            </div>
                            <!-- form Footer -->
                            <div class="login-footer">
                                <button type="submit" class="submit-btn3">Simpan</button>
                                <a href="./" class="btn btn-secondary">Batal</a>
                            </div>
                            
                        </form>
                        
                    @elseif(!empty($produk))
                        <!-- Login Heading -->
                        <div class="login-heading">
                            <span>Update produk</span>
                            <p></p>
                        </div>
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
                                    <label> produk</label>
                                    <input type="file" name="img" placeholder="foto">
                                </div>
                            </div>
                            <!-- form Footer -->
                            <div class="login-footer">
                                <button type="submit" class="submit-btn3">Simpan</button>
                                <a href="./" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Checkout Area -->
</main>

    <!-- popup  -->
    @error('nama')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('harga')
        <script>
        swal({
            title: "Data harap diisi",
            
            icon: "warning",
            button: "Ok",
        });
        </script>
    @enderror
    @error('img')
        <script>
        swal({
            title: "Data harap diisi",
            
            icon: "warning",
            button: "Ok",
        });
        </script>
    @enderror

@endsection