@extends('customer.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    @error('email')
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
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Checkout</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">checkout</a></li> 
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
                            <h3>Billing Details</h3>
                            @foreach($data as $li)
                            <form class="row contact_form" action="/postPesanan" method="POST">
                                @csrf
                                <div class="col-md-12 form-group">
                                    <input type="hidden" name="idDetail" value="{{$li->id_desain}}">
                                    <input type="text" class="@error('nama') is-invalid @enderror form-control"  name="nama" placeholder="Nama Customer" value=""/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="@error('produk') is-invalid @enderror form-control"  name="produk" placeholder="Nama produk"/>           
                                    <!-- <input type="text" class="@error('produk') is-invalid @enderror form-control"  name="produk" placeholder="Nama produk : {{$li->nama_produk}}" value="{{$li->nama_produk}}" disabled/> -->
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="number" class="@error('harga') is-invalid @enderror form-control"  name="notlp" placeholder="No Tlp" value=""/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="email" class="@error('email') is-invalid @enderror form-control" name="email" placeholder="Email" value=""/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="@error('variasi') is-invalid @enderror form-control"  name="variasi" placeholder="Variasi Produk" value=""/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="number" class="@error('harga') is-invalid @enderror form-control"  name="harga" placeholder="Harga Produk" />
                                    <!-- <input type="number" class="@error('harga') is-invalid @enderror form-control"  name="harga" placeholder="Harga Produk : {{$li->harga}}" value="{{$li->harga}}" disabled/> -->
                                </div>
                                <div class="login-footer">
                                    <button type="submit" class="submit-btn3">Simpan</button>
                                    <a href="./" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                            @endforeach
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