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
    @error('luas')
        <script>
        swal({
            title: "Data harap diisi",
            
            icon: "warning",
            button: "Ok",
        });
        </script>
    @enderror
    @error('deskripsi')
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
    @error('variasi')
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
                                <h1 data-animation="fadeInUp" data-delay=".4s" >Pembayaran</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pembayaran</a></li> 
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

                        <h3>Pemesanan Design</h3>
                        
                        <form class="row contact_form" action="/postPesanan" method="POST">
                            @csrf
                            <div class="col-md-12 form-group">
                                
                            </div>
                            <div class="col-md-12 form-group">
                                <!-- <input type="text" class="@error('produk') is-invalid @enderror form-control"  name="produk" placeholder="Nama produk"/>            -->
                                <input type="text" class="@error('bank') is-invalid @enderror form-control"  name="bank" placeholder="Bank Tujuan" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" class="@error('namaRek') is-invalid @enderror form-control"  name="namaRek" placeholder="Nama rekening" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" class="@error('noRek') is-invalid @enderror form-control" name="noRek" placeholder="Nomer rekening" />
                            </div>
                            <!-- <div class="col-md-12 form-group">
                                <input type="text" class="@error('variasi') is-invalid @enderror form-control"  name="variasi" placeholder="variasi" value=""/>
                            </div>
                            <div class="col-md-12 form-group">
                                
                            </div> -->
                            <div class="login-footer">
                                <button type="submit" class="submit-btn3">Simpan</button>
                                <a href="/customer/pemesanan-design" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

    

@endsection