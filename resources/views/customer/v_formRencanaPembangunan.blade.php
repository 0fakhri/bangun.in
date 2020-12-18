@extends('customer.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- popup  -->
    @error('alamat')
        <script>
        swal({
            title: "Data harus diisi",
            
            icon: "warning",
            button: "Ok",
        });
        </script>
    @enderror
    @error('tanggal')
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
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Rencana Pembangunan</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Rencana Pembangunan</a></li> 
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
                        @foreach($data as $li)
                        @endforeach
                            @if($li->id_bangun == null)
                            <h3>Rencana Pembangunan</h3>
                            <form class="row contact_form" action="/postBangun" method="POST">
                                @csrf
                                <div class="col-md-12 form-group">
                                    <input type="hidden" name="idBayar" value="{{$li->id_pembayaran}}">
                                
                                </div>
                                <div class="col-md-12 form-group">
                                    <label >Tanggal Survey</label>
                                    <input class="@error('tanggal') is-invalid @enderror form-control" type="date" name="tanggal" >
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="@error('alamat') is-invalid @enderror form-control"  name="alamat" placeholder="Alamat COD"/>
                                </div>

                                <div class="login-footer">
                                    <button type="submit" class="submit-btn3">Simpan</button>
                                    <a href="/customer/pembayaran-design" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                            @elseif($li->id_bangun != null)
                                <h3>Ubah Rencana Pembangunan</h3>
                                    <form class="row contact_form" action="/ubahBangun" method="POST">
                                        @csrf
                                        <div class="col-md-12 form-group">
                                            <input type="hidden" name="id" value="{{$li->id_bangun}}">
                                        
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label >Tanggal Survey</label>
                                            <input class="@error('tanggal') is-invalid @enderror form-control" type="date" name="tanggal" >
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="@error('alamat') is-invalid @enderror form-control"  name="alamat" value="{{$li->alamat_cod}}"/>
                                        </div>

                                        <div class="login-footer">
                                            <button type="submit" class="submit-btn3">Simpan</button>
                                            <a href="/customer/rencana-pembangunan" class="btn btn-secondary">Batal</a>
                                        </div>
                                    </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Checkout Area -->
                         
</main>

    

@endsection