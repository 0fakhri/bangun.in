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
              
              <th>Logo</th>
              <th>Nama CV</th>
              <th>Alamat</th>
              <th>Status</th>
              <th>License</th>
              <th>Aksi</th>
              <!-- <th>E-mail</th>
              <th>No HP</th>
              <th>Kecamatan</th>
              <th>Alamat</th>
              <th>Kode Pos</th> -->
          </tr>
        </thead>
              @foreach($data as $li)
        <tbody>
          <tr class="text-center">
            @if($li->logo != null)
            <td><img src="{{url($li->logo)}}" style="width: 100px"></td>
            @elseif($li->logo == null)
            <td></td>
            @endif
            
            <td>{{$li->nama_cv}}</td>
            <td>{{$li->alamat}}</td>
            <td>{{$li->status_akun}}</td>
            <td><img src="{{url($li->license)}}" style="width: 200px"></td>
            <td>
              @if($li->status_akun == null)
                <form action="/verifAkun" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $li->id }}">
                    <input type="hidden" name="status" value="Disetujui">
                    <button type="submit" class="btn btn-primary">Iya</button>
                </form>
                <form action="/verifAkun" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $li->id }}">
                    <input type="hidden" name="status" value="Ditolak">
                    <button type="submit" class="btn btn-danger">Tidak</button>
                </form>
              @endif
            </td>
          </tr>
          </tbody>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection