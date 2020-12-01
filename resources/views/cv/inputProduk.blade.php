@extends('cv.layout.app')

@section('content')

@error('nama')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
@enderror
@error('harga')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
@enderror
@error('img')
    <script>
    swal({
        title: "Data harap diisi",
        
        icon: "warning",
        button: "Ok",
    });
    </script>
@enderror




<main class="login-bg">
    <!-- login Area Start -->
    <div class="login-form-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="login-form">
                        <!-- Login Heading -->

                    <div class="login-heading">
                            <span>Tambah produk baru</span>
                            <p></p>
                        </div>
                        <form method="POST" action="post" enctype="multipart/form-data">
                            @csrf
                        <!-- Single Input Fields -->
                            <div class="input-box">
                                <div class="single-input-fields">
                                    <label>Nama Produk</label>
                                    <input name="nama" class="@error('nama') is-invalid @enderror" type="text" >
                                </div>
                                <div class="single-input-fields">
                                    <label>Harga Produk</label>
                                    <input name="harga" class="@error('harga') is-invalid @enderror" type="number" placeholder="">
                                </div>
                                <div class="single-input-fields">
                                    <label>Foto produk</label>
                                    <input type="file" name="img" placeholder="foto" class="@error('img') is-invalid @enderror" >
                                </div>
                                
                            </div>
                            <!-- form Footer -->
                            <div class="login-footer">
                                <button type="submit" class="submit-btn3">Simpan</button>
                                <a href="./" class="btn btn-secondary">Batal</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    
@endsection