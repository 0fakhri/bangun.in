@extends('admin.layouts.master')
@section('content')
    <!-- <div class="col text-right"> -->
<div class="row">
</div>
<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
    <h6 class="m-0 font-weight-bold text-primary">Data produk</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead style="background-color: #ddd;">
          <tr class="text-center">
              
              
              <th>Nama Customer</th>
              <th>Bank Tujuan</th>
              <th>Nama produk</th>
              <th>Harga produk</th>
              <th>Nama rekening pengirim</th>
              <th>Status</th>
              <th>Bukti pembayaran</th>
              <!-- <th>E-mail</th>
              <th>No HP</th>
              <th>Kecamatan</th>
              <th>Alamat</th>
              <th>Kode Pos</th> -->
          </tr>
        </thead>
              @foreach($produk as $li)
        <tbody>
          <tr class="text-center">
              
              <td>{{$li->nama_customer}}</td>
              <td>{{$li->bank_tujuan}}</td>
              <td>{{$li->nama_produk_design}}</td>
              <td>Rp {{$li->harga_produk}}</td>
              <td>{{$li->nama_rekening_pengirim}}</td>
              <td>
                @if($li->status_bayar == 'Ya')
                    Disetujui
                @elseif($li->status_bayar == 'Tidak')
                    Ditolak
                @else
                    Belum diproses
                @endif
              </td>
              <td><img src="{{url($li->bukti_pembayaran)}}" style="width: 45%"></td>
          </tr>
          </tbody>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection