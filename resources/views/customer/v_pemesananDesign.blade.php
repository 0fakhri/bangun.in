@extends('customer.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session('sukses'))
<script>
    swal({
        title: "Pesanan berhasil dibuat",
        
        icon: "success",
        button: "Ok",
    });
    </script>
@endif
@if(session('batal'))
<script>
    swal({
        title: "Pesanan berhasil dibatalkan",
        
        icon: "success",
        button: "Ok",
    });
    </script>
@endif
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
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Pemesanan Design</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                            <li class="breadcrumb-item"><a href="/customer/pemesanan-design">Pemesanan Design</a></li> 
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
                            <h2>Design Rumah</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-xl-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #696969">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="Penerimaan-tab" data-toggle="tab" href="#Penerimaan" role="tab" aria-controls="Penerimaan" aria-selected="true">Pemesanan Design</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="custom-tab" data-toggle="tab" href="#custom" role="tab" aria-controls="custom" aria-selected="true">Custom</a>
                            </li>
						</ul>					
                    <!-- Tab panes -->
					<div class="tab-content" id="myTabContent">
                    
					  <div class="tab-pane active" id="Penerimaan" role="tabpanel" aria-labelledby="Penerimaan-tab">
					    <br>
                        <table class="table-responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #ddd;">
                                <tr class="text-center">
                                        <!-- <th>Nama</th> -->
                                        <th>Nama CV</th>
                                        <th>Nama produk design</th>
                                        <th>Nama customer</th>
                                        <th>Variasi produk</th>
                                        <th>Harga produk</th>
                                        <th>Email</th>
                                        <th>No telp</th>
                                        <th>Status</th>
                                        <th>Alasan Ditolak</th>
                                        <th>Design Visual 3D</th>
                                        <th>Aksi</th>
                                        <!-- <th>1</th> -->
                                    </tr>
					        	</thead>
					        
					        	<tbody>
                                @foreach($data as $li)
                                    @if($li->deskripsi == null & $li->batal == null)
                                    <tr>
                                        <td>{{$li->nama_cv}}</td>
                                        <td>{{$li->nama_produk_design}}</td>
                                        <td>{{$li->nama_customer}}</td>
                                        <td>{{$li->variasi}}</td>
                                        <td>Rp {{$li->harga_produk}}</td>
                                        <td>{{$li->email}}</td>
                                        <td>{{$li->no_tlp}}</td>
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
                                            {{$li->alasan_ditolak}}
                                        </td>
                                        @if($li->foto != null)
                                            <td><img src="{{url($li->foto)}}" alt="" width="200px"></td>
                                        @endif
                                        <td>
                                            @if($li->status == 'Ya' & $li->id_pembayaran == null)
                                                <a href="pemesanan-design/bayar/{{$li->id_pesan}}" class="btn">Bayar</a>
                                                <!-- <button type="submit" class="btn">Bayar</button> -->
                                            @elseif($li->status == 'Tidak')
                                    
                                            @else
                                            <form action="/batal" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$li->id_pesan}}">
                                                <input type="hidden" name="pembatalan" value="ya" >
                                                <button type="submit" class="btn">Batalkan pesanan</button>
                                            </form>
                                                
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            
					      	</table>
                      </div>
                      <!-- <div class="table-responsive tab-pane active" id="custom" role="tabpanel" aria-labelledby="custom-tab"> -->
                      <div class="table-responsive tab-pane active" id="custom" role="tabpanel" aria-labelledby="custom-tab">
                          <br>
                        <table class="table-responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #ddd;">
                            <tr class="text-center">
                                <!-- <th>Nama</th> -->
                                <th>Nama CV</th>
                                <th>Deskripsi produk</th>
                                <th>Nama produk design</th>
                                <th>Nama customer</th>
                                <th>Luas bangunan</th>
                                <th>Harga produk</th>
                                <th>Email</th>
                                <th>No telp</th>
                                <th>Hasil design custom</th>
                                <th>Status</th>
                                <th>Alasan Ditolak</th>
                                <th>Aksi</th>

                                <!-- <th>Tanggapi</th> -->
                                <!-- <th>1</th> -->
                            </tr>
                        </thead>
                        @foreach($data as $li)
                        @if($li->deskripsi != null & $li->batal == null) 
                        <tbody>
                            <tr>
                                <td>{{$li->nama_cv}}</td>
                                <td>{{$li->deskripsi}}</td>
                                <td>{{$li->nama_produk_design}}</td>
                                <td>{{$li->nama_customer}}</td>
                                <td>{{$li->luas}} m</td>
                                <td>Rp {{$li->harga_produk}}</td>
                                <td>{{$li->email}}</td>
                                <td>{{$li->no_tlp}}</td>
                                <td >
                                    @if($li->id_pembayaran != null & $li->desain != null)
                                    <img src="{{url($li->desain)}}" alt="" width="200px">
                                    @endif
                                </td>
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
                                    {{$li->alasan_ditolak}}
                                </td>
                                <td>
                                    @if($li->id_pembayaran == null)
                                        @if($li->status == 'Ya')
                                            <a href="pemesanan-design/bayar/{{$li->id_pesan}}" class="btn">Bayar</a>
                                            <!-- <button type="submit" class="btn">Bayar</button> -->
                                        @elseif($li->status == 'Tidak')
                                        
                                        @else
                                        <form action="/batal" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$li->id_pesan}}">
                                            <input type="hidden" name="pembatalan" value="ya" >
                                            <button type="submit" class="btn">Batalkan pesanan</button>
                                        </form>
                                        @endif
                                        
                                    
                                    @endif
                                </td>
                            </tr> 
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                    </div>
                      
					</div> 
                    
					</div>
					</div>
					</section>

        <!--? New Arrival End -->
        <!-- Popular Locations End -->
</main>
     

@endsection