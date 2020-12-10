@extends('cv.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session('sukses'))
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
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Pesanan Masuk</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/cv/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="/cv/pemesanan-masuk">Pesanan Masuk</a></li> 
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
                            <h2>Pemesanan design</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-xl-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #696969">
						  <!-- <li class="nav-item" role="presentation">
						    <a class="nav-link active" id="Penerimaan-tab" data-toggle="tab" href="#Penerimaan" role="tab" aria-controls="Penerimaan" aria-selected="true">Pemesanan Design</a>
						  </li> -->
                            <!-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="custom-tab" data-toggle="tab" href="#custom" role="tab" aria-controls="custom" aria-selected="true"> Design Custom</a>
                            </li> -->
						</ul>				
                    <!-- Tab panes -->
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane active" id="Penerimaan" role="tabpanel" aria-labelledby="Penerimaan-tab">
					    <br>
					      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            Pesanan masuk    
                          <thead class="dark-bg">
                                    <tr>
                                        <!-- <th>Nama</th> -->
                                        <th>Nama produk design</th>
                                        <th>Nama customer</th>
                                        <th>Variasi produk</th>
                                        <th>Harga produk</th>
                                        <th>Email</th>
                                        <th>No telp</th>
                                        <th>Status</th>
                                        <th>Design rumah</th>
                                        <th>Aksi</th>
                                        
                                        <!-- <th>1</th> -->
                                    </tr>
					        	</thead>
					        
					        	<tbody>
                                @foreach($data as $li)
                                    @if($li->batal == null & $li->deskripsi == null )
                                    <tr>
                                        <td>{{$li->nama_produk_design}}</td>
                                        <td>{{$li->nama_customer}}</td>
                                        <td>{{$li->variasi}}</td>
                                        <td>Rp {{$li->harga_produk}}</td>
                                        <td>{{$li->email}}</td>
                                        <td>{{$li->no_tlp}}</td>
                                        <td>
                                            @if($li->status == null)
                                                Belum diproses
                                            @elseif($li->status == 'Ya')
                                                Disetujui
                                            @else
                                                Ditolak
                                            @endif
                                        </td>
                                        <td><img src="{{url($li->foto)}}" alt="" width="200px"></td>
                                        <td>
                                            @if($li->status == null)
                                            <form action="/verifikasi" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $li->id }}">
                                                <input type="hidden" name="status" value="Ya">
                                                <button type="submit" class="btn">Iya</button>
                                            </form>
                                            <form action="/verifikasi" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $li->id }}">
                                                <input type="hidden" name="status" value="Tidak">
                                                <button type="submit" class="btn">Tidak</button>
                                            </form>
                                            
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            
					      	</table>
					  </div>
                      
					      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            Custom  
                          <thead class="dark-bg">
                                    <tr>
                                    
                                        <th>Deskripsi produk</th>
                                        <th>Nama produk design</th>
                                        
                                        <th>Nama customer</th>
                                        <th>Luas bangunan</th>
                                        <th>Harga produk</th>
                                        <th>Email</th>
                                        <th>No telp</th>
                                        <th>Hasil design custom</th>
                                        <th>Status</th>
                                        <!-- <th>Hasil design</th> -->
                                        <th>Aksi</th>

                                    </tr>
					        	</thead>
					        
					        	<tbody>
                                @foreach($data as $li)
                                    @if($li->batal == null & $li->deskripsi != null )
                                    <tr>
                                        
                                        <td>{{$li->deskripsi}}</td>
                                        <td>{{$li->nama_produk_design}}</td>
                                        <td>{{$li->nama_customer}}</td>
                                        <td>{{$li->luas}} m</td>
                                        <td>Rp {{$li->harga_produk}}</td>
                                        <td>{{$li->email}}</td>
                                        <td>{{$li->no_tlp}}</td>
                                        <td>
                                        @if($li->status == 'Ya' & $li->harga_produk != 0 & $li->desain == null)
                                                <a class="btn btn-primary" href="/cv/pesanan-masuk/pesanan/{{$li->id}}">Design Visual 3D</a>
                                        @endif
                                        </td>
                                        @if($li->desain != null)
                                        <td><img src="{{url($li->desain)}}" alt="" width="200px"></td>
                                        @endif
                                        <td>
                                            @if($li->status == null)
                                                Sedang diproses
                                            @elseif($li->status == 'Ya')
                                                Disetujui
                                            @else
                                                Ditolak
                                            @endif
                                        </td>
                                        <td>
                                            @if($li->status == null)
                                            <form action="/verifikasi" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $li->id }}">
                                                <input type="hidden" name="status" value="Ya">
                                                <button type="submit" class="btn">Iya</button>
                                            </form>
                                            <form action="/verifikasi" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $li->id }}">
                                                <input type="hidden" name="status" value="Tidak">
                                                <button type="submit" class="btn">Tidak</button>
                                            </form>
                                            @elseif($li->status == 'Ya' & $li->harga_produk == 0)
                                                <a class="btn btn-primary" href="/cv/pesanan-masuk/pesanan/{{$li->id}}">Custom</a>
                                            
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            
					      	</table>
                      </div>
					</div> 
                    
					</div>
					</div>
					</section>

        <!--? New Arrival End -->
        <!-- Popular Locations End -->
        <!--? Services Area Start -->
        <div class="categories-area section-padding40 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services1.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Fast & Free Delivery</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services2.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Secure Payment</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services3.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Money Back Guarantee</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services4.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Online Support</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     

@endsection