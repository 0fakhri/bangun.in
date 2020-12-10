@extends('cv.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- popup  -->
@error('namaCv')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('logo')
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
    @error('deskripsi')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('nama')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('bank1')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('norek1')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('bank2')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('norek2')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('bank3')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
    @enderror
    @error('norek3')
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
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Profil</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Profil</a></li> 
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
                            <h3>Profil</h3>
                            <form class="row contact_form" action="/postProfil" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12 form-group">
                                    <input type="text" class="@error('namaCv') is-invalid @enderror form-control"  name="namacv" placeholder="Nama CV" value="{{$li->nama_cv}}"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label >Logo CV</label>
                                    <input type="file" class="@error('logo') is-invalid @enderror form-control"  name="img" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="email" class="@error('email') is-invalid @enderror form-control"  name="email" placeholder="Email" value="{{$li->email}}"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="@error('alamat') is-invalid @enderror form-control"  name="alamat" placeholder="Alamat" value="{{$li->alamat}}"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="number" class="@error('noTlp') is-invalid @enderror form-control"  name="notlp" placeholder="No Telp" value="{{$li->notlp}}"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>License</label>
                                    <img src="{{url($li->license)}}" alt="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="@error('deskripsi') is-invalid @enderror form-control"  name="deskripsi" placeholder="Deskripsi" value="{{$li->deskripsi}}"/>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_field">
                                        <select class="form-control" name="bank1" id="pilih" class="@error('bank1') is-invalid @enderror form-control">
                                            <option selected disabled>Bank 1</option>
                                            <option value="Bank Mandiri">Bank Mandiri</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BNI">BNI</option>
                                            <option value="BRI">BRI</option>
                                            <option value="CIMB Niaga">CIMB Niaga</option>
                                        </select>
                                    </div>
                                    <h1><span><p></p></span>
                                </div>
                                <!-- <div class="col-md-12 form-group">
                                    <input type="text" class="@error('bank1') is-invalid @enderror form-control"  name="bank1" placeholder="Bank 1" value="{{$li->bank1}}"/>
                                </div> -->
                                <div class="col-md-12 form-group">
                                    <input type="number" class="@error('norek1') is-invalid @enderror form-control"  name="norek1" placeholder="No Rekening 1" value="{{$li->norek1}}"/>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_field">
                                        <select class="form-control" name="bank2" id="pilih" class="@error('bank2') is-invalid @enderror form-control">
                                            <option selected disabled>Bank 2</option>
                                            <option value="Bank Mandiri">Bank Mandiri</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BNI">BNI</option>
                                            <option value="BRI">BRI</option>
                                            <option value="CIMB Niaga">CIMB Niaga</option>
                                        </select>
                                    </div>
                                    <h1><span><p></p></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="number" class="@error('norek2') is-invalid @enderror form-control"  name="norek2" placeholder="No Rekening 2" value="{{$li->norek2}}"/>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_field">
                                        <select class="form-control" name="bank3" id="pilih" class="@error('bank3') is-invalid @enderror form-control">
                                            <option selected disabled>Bank 3</option>
                                            <option value="Bank Mandiri">Bank Mandiri</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BNI">BNI</option>
                                            <option value="BRI">BRI</option>
                                            <option value="CIMB Niaga">CIMB Niaga</option>
                                        </select>
                                    </div>
                                    <h1><span><p></p></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="number" class="@error('norek3') is-invalid @enderror form-control"  name="norek3" placeholder="No Rekening 3" value="{{$li->norek3}}"/>
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