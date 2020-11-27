@extends('customer.layout.app')
@section('content')
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
                        <ul class="nav nav-tabs bg-dark" id="myTab" role="tablist">
						  <li class="nav-item" role="presentation">
						    <a class="nav-link active" id="Penerimaan-tab" data-toggle="tab" href="#Penerimaan" role="tab" aria-controls="Penerimaan" aria-selected="true">Pemesanan Design</a>
						  </li>
                            <li class="nav-item" role="presentation">
                                <a href="/customer/pemesanan-design/kustom-pesanan">Custom</a>
                            <!-- <a class="nav-link" id="custom-tab"  href="/" role="tab" aria-controls="custom" aria-selected="true">Custom</a> -->
                            </li>
						</ul>				
                    <!-- Tab panes -->
					<div class="tab-content">
					  <div class="tab-pane active" id="Penerimaan" role="tabpanel" aria-labelledby="Penerimaan-tab">
					    <br>
					      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
					          <thead class="dark-bg">
					          <tr>
					              <th>1</th>
					              <th>1</th>
					              <th>1</th>
					               <th>1</th>
					              <th>1</th>
					              <th>1</th>
					          </tr>
					        	</thead>
					              
					        	<tbody>
					          <tr>
					              <td>1</td>
					              <td>1</td>
					              <td>1</td>
					              <td>1</td>
					 
					              <td>1</td>
					              <td></td>
					          	</tr>
					          	</tbody>
					      	</table>
					  </div>
                      <!-- <div class="tab-pane active" id="custom" role="tabpanel" aria-labelledby="custom-tab">belum ada data</div> -->
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