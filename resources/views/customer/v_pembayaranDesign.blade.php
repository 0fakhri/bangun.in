@extends('customer.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- popup  -->
@if(session('bayar'))
<script>
    swal({
        title: "Data berhasil disimpan",
        
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
                                <h1 data-animation="fadeInUp" data-delay=".4s" >Pembayaran Design</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/customer/pembayaran-design">Pembayaran Design</a></li> 
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
                        <h2>Pembayaran design</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xl-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #696969">
                        <!-- <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="Penerimaan-tab" data-toggle="tab" href="#Penerimaan" role="tab" aria-controls="Penerimaan" aria-selected="true">Pembayaran Design</a>
                        </li> -->
                        
                    </ul>					
                <!-- Tab panes -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane active" id="Penerimaan" role="tabpanel" aria-labelledby="Penerimaan-tab">
                    <br>
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="dark-bg">
                                <tr>
                                    <th>Nama CV </th>
                                    <th>Bank tujuan</th>
                                    <th>Nama rekening pengirim</th>
                                    <th>Nomer rekening pengirim</th>
                                    <th>Bukti pembayaran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    <th>Pembangunan</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                            @foreach($data as $li)                     
                                <tr>
                                    <td>{{$li->nama_cv}}</td>
                                    <td>{{$li->bank_tujuan}}</td>
                                    <td>{{$li->nama_rekening_pengirim}}</td>
                                    <td>{{$li->no_rek_pengirim}}</td>
                                    <td ><img src="{{url($li->bukti_pembayaran)}}" alt="" width="200px"></td>
                                    <td>
                                        @if($li->status_bayar == null)
                                            Sedang diproses
                                        @elseif($li->status_bayar == 'Ya')
                                            Disetujui
                                            
                                        @else
                                            Ditolak
                                        @endif
                                    </td>
                                    <td>
                                    @if($li->status_bayar == 'Ya' )
                                        <a href="/invoice/{{$li->id_pembayaran}}" target="_blank" style="color: black;"><i class="fas fa-print"></i>Cetak</a>
                                    @else
                                    
                                    @endif
                                    </td>
                                    @if($li->status_bayar == 'Ya' & $li->id_bangun == null)
                                    <td>
                                        <a href="/pembangunan/{{$li->id_pembayaran}}" class="btn">Lanjutkan Pembangunan</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        
                        </table>
                    </div>
                    
                </div> 
                
            </div>
        </div>
    </section>

    <!--? New Arrival End -->
    
</main>

    

@endsection