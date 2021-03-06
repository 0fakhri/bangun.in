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
        <!--? Properties Start -->
        <section class="properties new-arrival fix">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <h2>Data Produk</h2>
                            <!-- <P>Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla.</P> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="properties__button text-center">
                            <!--Nav Button  -->
                            <nav>                         
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <!-- <a class="nav-item nav-link active" id="nav-Sofa-tab" data-toggle="tab" href="#nav-Sofa" role="tab" aria-controls="nav-Sofa" aria-selected="true">Sofa</a> -->
                                    <a class="nav-item nav-link" href="/cv/data-produk/create" role="tab" aria-controls="nav-Bed" aria-selected="false">Tambah Produk Baru</a>
                                    <!-- <a class="nav-item nav-link" id="nav-Table-tab" data-toggle="tab" href="#nav-Table" role="tab" aria-controls="nav-Table" aria-selected="false">Table</a>
                                    <a class="nav-item nav-link" id="nav-Chair-tab" data-toggle="tab" href="#nav-Chair" role="tab" aria-controls="nav-Chair" aria-selected="false">Chair</a>

                                    <a class="nav-item nav-link" id="nav-Bed-tab" data-toggle="tab" href="#nav-Bed" role="tab" aria-controls="nav-Bed" aria-selected="false">Bed</a>
                                    <a class="nav-item nav-link" id="nav-Lightning-tab" data-toggle="tab" href="#nav-Lightning" role="tab" aria-controls="nav-Lightning" aria-selected="false">Lightning</a>
                                    <a class="nav-item nav-link" id="nav-Decore-tab" data-toggle="tab" href="#nav-Decore" role="tab" aria-controls="nav-Decore" aria-selected="false">Decore</a> -->
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Nav Card -->
                    <div class="tab-content" id="nav-tabContent">
                        <!-- card one -->
                        <div class="tab-pane fade show active" id="nav-Sofa" role="tabpanel" aria-labelledby="nav-Sofa-tab">
                            <div class="row">
                                @foreach($produk as $li)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src=" {{url($li->foto)}} " alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3>{{ $li->nama_produk }}</h3>
                                            <span>Rp {{ $li->harga }}</span>
                                            <br>
                                            <h4><a href="/cv/data-produk/edit/{{ $li->id_desain }}">Edit produk</a></h4>
                                        </div>
                                        
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- End Nav Card -->
                </div>
                <!-- Button -->
               
            </div>
        </section>
        <!-- Properties End -->

        <!--? New Arrival End -->
        <!-- Popular Locations End -->
        <!--? Services Area Start -->
        
        <!--? Services Area End -->
    </main>

@endsection