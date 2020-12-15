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
   
    @error('email')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('alamat')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('noTlp')
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
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Form Data Customer</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Form Data Customer</a></li> 
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
                            <!-- <h3>Profil</h3> -->
                            <form class="row contact_form" action="/postcustomer" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12 form-group">
                                    <input type="text" class="@error('nama') is-invalid @enderror form-control"  name="nama" placeholder="Nama " value="{{$li->nama}}"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="email" class="@error('email') is-invalid @enderror form-control"  name="email" placeholder="Email" value="{{$li->email}}"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="@error('alamat') is-invalid @enderror form-control"  name="alamat" placeholder="Alamat" value="{{$li->alamat}}"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="number" class="@error('noTlp') is-invalid @enderror form-control"  name="notlp" placeholder="No Telp" value="{{$li->noTelp}}"/>
                                </div>
                                <div class="login-footer">
                                    <button type="submit" class="submit-btn3">Simpan</button>
                                    <a href="/cv/home" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Checkout Area -->

</main>

    

@endsection