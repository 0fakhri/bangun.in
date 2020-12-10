@extends('cv.layout.app')

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session('sukses'))
<script>
    swal({
        title: "Data berhasil diubah",
        
        icon: "success",
        button: "Ok",
    });
    </script>
@endif
@if(session('eror'))
<script>
    swal({
        title: "Data berhasil ditambah",
        
        icon: "success",
        button: "Ok",
    });
    </script>
@endif

<main>
    <!--? slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Data Produk</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/cv/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="/cv/data-produk">Data Produk</a></li> 
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

        
        <!--? Services Area End -->
    </main>

@endsection