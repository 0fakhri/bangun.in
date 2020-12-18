@extends('cv.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- popup  -->
@error('alasan')
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
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Penolakan</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/cv/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Penolakan</a></li> 
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
                            
                            @foreach($get as $li)
                            
                            
                            <h3>Alasan Penolakan</h3>
                            <form class="row contact_form" action="/postAlasan" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$li->id_bangun}}">
                                <input type="hidden" name="status" value="Ditolak">
                                <!-- <div class="col-md-12 form-group">
                                    <textarea class="@error('deskripsi') is-invalid @enderror form-control" name="deskripsi" id="message" rows="1" placeholder="Deskripsi">{{$li->deskripsi}}</textarea>
                                </div> -->
                                <div class="col-md-12 form-group">
                                    <input class="@error('alasan') is-invalid @enderror form-control" type="text" name="alasan" placeholder="Alasan Penolakan"></input>
                                </div>
                                <div class="login-footer">
                                    <button type="submit" class="submit-btn3">Simpan</button>
                                    <a href="/cv/rencana-pembangunan-masuk" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Checkout Area -->
                         
</main>

    

@endsection