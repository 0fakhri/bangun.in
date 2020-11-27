@extends('customer.layout.app')
@section('content')

@if(session('sukses'))
<script>
  swal({
      title: "Pesanan berhasil dibuat",
      
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
                                @foreach($data as $li)
                                <h1 data-animation="fadeInUp" data-delay=".4s">Detail Produk</h1>
                                @endforeach
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/customer/home">Home</a></li>
                                        <!-- <li class="breadcrumb-item"><a href="/">Provil CV</a></li>  -->
                                        <li class="breadcrumb-item"><a href="#">Detail Produk</a></li> 
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
    <!--? Single Product Area Start-->
    <div class="product_image_area section-padding40">
      <div class="container">
        @foreach($data as $li)
        <div class="row s_product_inner">
          <div class="col-lg-5">
            <div class="product_slider_img">
              <div id="vertical">
                <div data-thumb="assets/img/gallery/product-details1.png">
                  <img src="{{url($li->foto)}}" / class="w-100">
                </div>
                <!-- <div data-thumb="assets/img/gallery/product-details2.png">
                  <img src="assets/img/gallery/product-details2.png"/ class="w-100">
                </div>
                <div data-thumb="assets/img/gallery/product-details3.png">
                  <img src="assets/img/gallery/product-details3.png" / class="w-100">
                </div>
                <div data-thumb="assets/img/gallery/product-details4.png">
                  <img src="assets/img/gallery/product-details4.png" / class="w-100">
                </div> -->
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3>{{$li->nama_produk}}</h3>
              <h2>Rp {{$li->harga}}</h2>
              <ul class="list">
                <!-- <li>
                  <a class="active" href="#">
                    <span>Category</span> : Household</a>
                  </li>
                  <li>
                    <a href="#"> <span>Availibility</span> : In Stock</a>
                  </li>
                </ul> -->
                <!-- <p>
                  Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time.
                </p> -->
                <div class="card_area">
                  <!-- <div class="product_count d-inline-block">
                    <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                    <input class="input-number" type="text" value="1" min="0" max="10">
                    <span class="number-increment"> <i class="ti-plus"></i></span>
                  </div> -->
                  <div class="add_to_cart">
                    <a href="/detail/{{$li->id_desain}}/beli" class="btn">BELI DESIGN</a>
                    <!-- <a href="#" class="like_us"> <i class="ti-heart"></i> </a> -->
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
      <!-- Single Product Area End-->

</main>

@endsection