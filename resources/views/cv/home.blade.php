@extends('cv.layout.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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

<main>
<div class="container" style="margin-top: 20px;">
      <div class="row">
      <!-- <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit.html" >Edit Profile</A>

        <A href="edit.html" >Logout</A>
       <br>
<p class=" text-info">May 05,2014,03:00 pm </p>
      </div> -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Profil CV</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                @foreach($data as $li)
                @endforeach

                <div class="col-md-3 col-lg-3 " align="center"> <img alt="Logo CV" src="@if($li->logo != null){{url($li->logo)}}@endif" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information" >
                    <tbody>
                      <tr>
                        <td>Nama CV Bagian Perencana:</td>
                        <td>{{$li->nama_cv}}</td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td>{{$li->email}}</td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>{{$li->alamat}}</td>
                      </tr>
                      <tr>
                        <td>No Telp</td>
                        <td>{{$li->noTelp}}</td>
                        <tr>
                          <td>License</td>
                          <td><img src="{{url($li->license)}}" alt="" width="300px"></td>
                        </tr>
                        <tr>
                          <td>Deskripsi</td>
                          <td>{{$li->deskripsi}}</td>
                        </tr>
                      </tr>
                      <tr>
                        <tr>
                          <td>Bank 1</td>
                          <td>{{$li->bank1}}</td>
                        </tr>
                        <tr>
                          <td>Nomor rekening 1</td>
                          <td>{{$li->norek1}}</td>
                        </tr>
                        <tr>
                          <td>Bank 2</td>
                          <td>{{$li->bank2}}</td>
                        </tr>
                        <tr>
                          <td>Nomor rekening 2</td>
                          <td>{{$li->norek2}}</td>
                        </tr>
                        <tr>
                          <td>Bank 3</td>
                          <td>{{$li->bank3}}</td>
                        </tr>
                        <tr>
                          <td>Nomor rekening 3</td>
                          <td>{{$li->norek3}}</td>
                        </tr>
                        <!-- <tr>
                          <td>Gender</td>
                          <td>Female</td>
                        </tr> -->
                      <!-- <tr>
                        <td>Home Address</td>
                        <td>Kathmandu,Nepal</td>
                      </tr> -->
                      <!-- <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com">info@support.com</a></td>
                      </tr> -->
                        <!-- <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                        </td> -->
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="/form-profil" class="btn btn-primary">Lengkapi biodata</a>
                  <!-- <a href="#" class="btn btn-primary">Team Sales Performance</a> -->
                </div>

              </div>
            </div>
                 <!-- <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div> -->
            
          </div>
        </div>
      </div>
    </div>
</main>

@endsection