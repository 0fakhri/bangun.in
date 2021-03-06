@extends('customer.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- popup  -->
@error('deskripsi')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
@enderror
    

<main>
    <!--? slider Area Start-->
    <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Kustom Desain</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Kustom Desain</a></li> 
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!--? Checkout Area Start-->
        <section class="checkout_area section-padding40">
            <div class="container">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Form Desain Kustom</h3>
                            
                            <form class="row contact_form" action="/postKustom" method="POST">
                                @csrf
                                <div class="col-md-12 form-group">
                                    
                                    <textarea class="@error('deskripsi') is-invalid @enderror form-control" name="deskripsi" id="message" rows="1" placeholder="Deskripsi"></textarea>
                                </div>
                                <div class="login-footer">
                                    <button type="submit" class="submit-btn3">Simpan</button>
                                    <a href="./" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Checkout Area -->


                        <!-- <form method="POST" action="/postPesanan" >
                            
                            
                            <div class="input-box">
                                <div class="single-input-fields">
                                    <label>Nama Customer</label>
                                    <input name="nama" class="@error('nama') is-invalid @enderror" type="text" >
                                </div>
                                <div class="single-input-fields">
                                    <label>Nama Produk Design</label>
                                    <input name="produk" class="@error('produk') is-invalid @enderror" type="text">
                                </div>
                                <div class="single-input-fields">
                                    <label>No Tlp</label>
                                    <input name="notlp" class="@error('harga') is-invalid @enderror" type="number">
                                </div>
                                <div class="single-input-fields">
                                    <label>Email</label>
                                    <input name="email" class="@error('email') is-invalid @enderror" type="text" >
                                </div>
                                <div class="single-input-fields">
                                    <label>Variasi Produk</label>
                                    <input name="variasi" class="@error('variasi') is-invalid @enderror" type="text" >
                                </div>
                                <div class="single-input-fields">
                                    <label>Harga Produk</label>
                                    <input name="harga" class="@error('harga') is-invalid @enderror" type="number">
                                </div>
                            </div>
                      
                            <div class="login-footer">
                                <button type="submit" class="submit-btn3">Simpan</button>
                                <a href="./" class="btn btn-secondary">Batal</a>
                            </div> -->
                         
</main>

    

@endsection