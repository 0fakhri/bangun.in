@extends('customer.layout.app')
@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- popup  -->
@if(session('bangun'))
<script>
    swal({
        title: "Data berhasil disimpan",
        
        icon: "success",
        button: "Ok",
    });
    </script>
@endif
@if(session('ubah'))
<script>
    swal({
        title: "Data berhasil disimpan",
        
        icon: "success",
        button: "Ok",
    });
    </script>
@endif
@if(session('hapus'))
<script>
    swal({
        title: "Rencana pembangunan berhasil dibatalkan",
        
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
                                <h1 data-animation="fadeInUp" data-delay=".4s" >Rencana Pembangunan</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/customer/rencana-pembangunan">Rencana Pembangunan</a></li> 
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
                        <h2>Rencana Pembangunan</h2>
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
                        <table class="table table-responsive table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="background-color: #ddd;">
                                <tr class="text-center">
                                @foreach($data as $li)
                                @endforeach
                                    <th>Tanggal survey </th>
                                    <th>Alamat cod</th>
                                    <th>Status</th>
                                    <th>Alasan penolakan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                            @foreach($data as $li)                     
                                <tr>
                                    <td>{{$li->tanggal_survey}}</td>
                                    <td>{{$li->alamat_cod}}</td>
                                    <td>
                                        @if($li->status_bangun == null)
                                            Sedang diproses
                                        @elseif($li->status_bangun == 'Diterima')
                                            Disetujui
                                        @else
                                            Ditolak
                                        @endif
                                    </td>
                                    <td>
                                        @if($li->alasan_tolak != null)
                                            {{$li->alasan_tolak}}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if($li->status_bangun == 'Ditolak')
                                            <a href="/pembangunan/{{$li->id_pembayaran}}" class="btn">Ubah</a>
                                        @endif
                                        @if($li->status_bangun == null)
                                        <a type="button" class="btn" data-toggle="modal" data-target="#batal{{$li->id_bangun}}">
                                            Batal
                                        </a>
                                        @else
                                        
                                        @endif
                                    </td>
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

<!-- Modal -->
@foreach($data as $li)
<div class="modal fade" id="batal{{$li->id_bangun}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin membatalkan rencana pembangunan?</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin membatalkan rencana pembangunan?
      </div>
      <div class="modal-footer">
        <form action="/batalBangun" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$li->id_bangun}}">
            <!-- <input type="hidden" name="pembatalan" value="ya" > -->
            <!-- <a href=""></a> -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn">Iya</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach


@endsection