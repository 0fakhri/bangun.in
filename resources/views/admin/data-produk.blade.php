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
              <th>Foto</th>
              <th>Nama produk</th>
              <th>Nama CV</th>
              <th>Harga produk</th>
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
              <td><img src="{{url($li->foto)}}" style="width: 50px"></td>
              <td>{{$li->nama_produk}}</td>
              <td>{{$li->nama_cv}}</td>
              <td>{{$li->harga}}</td>
          </tr>
          </tbody>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection