@extends('customer.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- popup  -->
    @error('bank')
    <script>
    swal({
        title: "Data harus diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('namaRek')
        <script>
        swal({
            title: "Data harus diisi",
            
            icon: "warning",
            button: "Ok",
        });
        </script>
    @enderror
    @error('noRek')
        <script>
        swal({
            title: "Data harus diisi",
            
            icon: "warning",
            button: "Ok",
        });
        </script>
    @enderror
    @error('img')
        <script>
        swal({
            title: "Data harus diisi",
            
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

                        <h3>Pembayaran Design</h3>
                        
                        <form class="row contact_form" action="/postPembayaran" method="POST">
                            @csrf

                            <div class="col-md-12 form-group">
                                @foreach($get as $li)
                               <input type="hidden" name="id" value="{{$li->id}}">
                               <h4>{{$li->id}}</h4>
                               <h4>{{$li->nama_customer}}</h4>
                                @endforeach
                                <input type="text" class="@error('bank') is-invalid @enderror form-control"  name="bank" placeholder="Bank Pengirim" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="@error('namaRek') is-invalid @enderror form-control"  name="namaRek" placeholder="Nama rekening" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" class="@error('noRek') is-invalid @enderror form-control" name="noRek" placeholder="Nomer rekening" />
                            </div>
                            <div class="col-md-12 form-group">
                                    <label>Foto produk</label>
                                    <input type="file" name="img" placeholder="foto" class="@error('img') is-invalid @enderror" >
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