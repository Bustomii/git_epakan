<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from odindesign-themes.com/emerald-dragon/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 18:24:00 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/vendor/simple-line-icons.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/vendor/tooltipster.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/vendor/owl.carousel.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/style.css') }} ">
	<!-- favicon -->
	<link rel="icon" href="favicon.ico">
	<title>ePakan | Pembayaran</title>
</head>
<body>

	<!-- HEADER -->
	<div class="header-wrap">
		<header>
			<!-- LOGO -->																											
			<a href="index-2.html">
				<figure class="logo">
					<img src="{{asset('images/Logo.png')}}" alt="logo">
				</figure>
			</a>
			<!-- /LOGO -->

			<!-- MOBILE MENU HANDLER -->
			<div class="mobile-menu-handler left primary">
				<img src="{{asset('images/pull-icon.png')}}" alt="pull-icon">
			</div>
			<!-- /MOBILE MENU HANDLER -->

			<!-- LOGO MOBILE -->
			<a href="index-2.html">
				<figure class="logo-mobile">
					<img src="{{asset('images/Logo.png')}}" alt="logo-mobile">
				</figure>
			</a>
			<!-- /LOGO MOBILE -->

			<!-- MOBILE ACCOUNT OPTIONS HANDLER -->
			<div class="mobile-account-options-handler right secondary">
				<span class="icon-user"></span>
			</div>
			<!-- /MOBILE ACCOUNT OPTIONS HANDLER -->

			<!-- USER BOARD -->
			@if(Auth::guard('pengguna')->check())
			    <div class="user-board">
				<!-- USER QUICKVIEW -->
				<div class="user-quickview">
					<!-- USER AVATAR -->
					<a href="http://marketplace.epakan.id/info-pribadi">
					<div class="outer-ring">
						<div class="inner-ring"></div>
                        <figure class="user-avatar medium">
    						<img src="{{asset('uploads/file/'. $pengguna->foto)}}" alt="profile-default-image">
            			</figure>
					</div>
					</a>
					<!-- /USER AVATAR -->

					<!-- USER INFORMATION -->
						<p class="user-name">{{Auth::guard('pengguna')->user()->nama}}</p>

				

					<!-- DROPDOWN -->
					<ul class="dropdown small hover-effect closed">
						<li class="dropdown-item">
							<a href="http://marketplace.epakan.id/info-pribadi">Akun Saya</a>
						</li>
						<li class="dropdown-item">
							<a href="{{route('logout')}}">Keluar</a>
						</li>
					</ul>
					<!-- /DROPDOWN -->
				</div>
				<!-- /USER QUICKVIEW -->

				<!-- ACCOUNT INFORMATION -->
				<div class="account-information">
					<a href="favourites.html">
						<div class="account-wishlist-quickview">

						</div>
					</a>
					<div class="account-cart-quickview">
						<span>

							<a href="{{route('lihat-keranjang')}}" class="icon-present">
							<!-- SVG ARROW -->

							</a>
							<!-- /SVG ARROW -->
						</span>

						<!-- PIN -->
						<span class="pin soft-edged secondary">7</span>
						<!-- /PIN -->

					</div>


				</div>
				<!-- /ACCOUNT INFORMATION -->

				<!-- ACCOUNT ACTIONS -->
				<div class="account-actions">

				</div>
				<!-- /ACCOUNT ACTIONS -->
			</div>
			@else
		    <div class="user-board">

                <div class="account-information" style= "margin-bottom:100p">

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampledaftar" >Daftar</button>

                </div>
                <div class="account-information" style= "margin-bottom:100p">

                    <button type="button" class="btn btn-warning" style="color:#ffffff" data-toggle="modal" data-target="#examplemasuk" >Masuk</button>

                </div>
								<form id="profile-info-form" action="{{route('register')}}" method="post">
													@csrf
                <div class="modal fade" id="exampledaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
												<figure class="logo">

													<img src="{{asset('images/Logo.png')}}" style="width:60%"/>
											     <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Daftar Akun</h5>
												</figure>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                              <!-- INPUT CONTAINER -->
                              <div class="input-container">
                                  <label for="nama" class="">Nama</label>
                                  <input type="text" id="about" name="nama" placeholder="Masukan Nama">
                              </div>
                              <div class="input-container">
                                  <label for="nama" class="">Alamat</label>
                                  <input type="text" id="about" name="nama" placeholder="Masukan Alamat">
                              </div>
															<div class="input-container">
                                  <label for="nama" class="">Daerah</label>
                                  <input type="text" id="about" name="nama" placeholder="Masukan Daerah">
																	<select name="daerah" class="form-control" id="exampleFormControlSelect1">
																			<option>Bandar Lampung</option>
																			<option>Metro</option>
																			<option>Lampung Barat</option>
																			<option>Lampung Selatan</option>
																			<option>Lampung Tengah</option>
																			<option>Lampung Timur</option>
																			<option>Lampung Utara</option>
																			<option>Mesuji</option>
																			<option>Pesawaran</option>
																			<option>Pringsewu</option>
																			<option>Tanggamus</option>
																			<option>Tulang Bawang</option>
																			<option>Tulang Bawang Barat</option>
																			<option>Way Kanan</option>
																			<option>Pesisir Barat</option>
																		</select>

                              </div>
                              <div class="input-container">
                                  <label for="email" class="">Email</label>
                                  <input type="email" id="email" name="email" placeholder="Masukan Email">
                              </div>
                              <!-- /INPUT CONTAINER -->

                              <!-- INPUT CONTAINER -->
                              <div class="input-container">
                                  <label for="about" class="">Nomor Telpon</label>
                                  <input type="text" id="about" name="no_telp" placeholder="Masukan Nomor Telpon">
                              </div>
															<div class="input-container">
                                  <label for="password" class="">Password</label>
                                  <input type="password" id="about" name="password" placeholder="Masukan Password">
                              </div>



                      </div>
                      <div class="modal-footer">

                        <button type="submit" class="btn btn-success" style="color:#ffffff">Daftar</button>

                      </div>
                    </div>
                  </div>
                </div>
								</form>

                <div class="modal fade" id="examplemasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
											<figure class="logo">

											<img src="{{asset('images/Logo.png')}}" style="width:60%"/>
											<h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Masuk Akun</h5>
										</figure>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
											<form id="profile-info-form" method="post" action="{{ route('login') }}">
											@csrf
                              <!-- INPUT CONTAINER -->

                              <div class="input-container">
                                  <label for="new_email" class="">Email</label>
                                  <input type="email" id="new_email" name="email" placeholder="Masukan Email">
                              </div>
                              <!-- /INPUT CONTAINER -->

                              <!-- INPUT CONTAINER -->
                              <div class="input-container">
                                  <label for="about" class="">Password</label>
                                  <input type="password" id="about" name="password" placeholder="Masukan Password">
                              </div>
                              <!-- /INPUT CONTAINER -->

                              <!-- INPUT CONTAINER -->

                              <!-- /INPUT CONTAINER -->


                      </div>
                      <div class="modal-footer">

                        <button type="submit" class="btn btn-success" style="color:#ffffff">Masuk</button>

                      </div>
											</form>
                    </div>
                  </div>
                </div>


				<div class="account-information">
					<a href="favourites.html">
						<div class="account-wishlist-quickview">

						</div>
					</a>
					<div class="account-cart-quickview">
						<span>
							<a href="{{Route('test12')}}" class="icon-present">
							<!-- SVG ARROW -->

							</a>
							<!-- /SVG ARROW -->
						</span>

						<!-- PIN -->
						<span class="pin soft-edged secondary">7</span>
						<!-- /PIN -->

					</div>


				</div>
				<!-- /ACCOUNT INFORMATION -->

				<!-- ACCOUNT ACTIONS -->
				<div class="account-actions">

				</div>
				<!-- /ACCOUNT ACTIONS -->
			</div>
			@endif
			<!-- /USER BOARD -->
		</header>
	</div>
	<!-- /HEADER -->

	<!-- SIDE MENU -->
	<div id="mobile-menu" class="side-menu left closed">
		<!-- SVG PLUS -->
		<svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
		<!-- /SVG PLUS -->

		<!-- SIDE MENU HEADER -->
		<div class="side-menu-header">
			<figure class="logo small">
				<img src="images/Logo.png" alt="logo">
			</figure>
		</div>
		<!-- /SIDE MENU HEADER -->

		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Main Links</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect interactive">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{Route('welcome')}}">Beranda</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{Route('test13')}}">Cara Membeli</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{ route('test','Pakan Sapi') }}">Produk</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->

			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->

			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->
	</div>
	<!-- /SIDE MENU -->

	<!-- SIDE MENU -->
	<div id="account-options-menu" class="side-menu right closed">
		<!-- SVG PLUS -->
		<svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
		<!-- /SVG PLUS -->

		<!-- SIDE MENU HEADER -->
		<div class="side-menu-header">
			<!-- USER QUICKVIEW -->
			<div class="user-quickview">
				<!-- USER AVATAR -->
				<a href="{{route('info')}}">
				<div class="outer-ring">
					<div class="inner-ring"></div>
                    <figure class="user-avatar medium">
    						<img src="{{asset('uploads/file/'. $pengguna->foto)}}" alt="profile-default-image">
            			</figure>
				</div>
				</a>
				<!-- /USER AVATAR -->

				<!-- USER INFORMATION -->
				<p class="user-name">{{Auth::guard('pengguna')->user()->nama}}</p>
				<p class="user-money"></p>
				<!-- /USER INFORMATION -->
			</div>
			<!-- /USER QUICKVIEW -->
		</div>
		<!-- /SIDE MENU HEADER -->

		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Akun Anda</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->

		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="author-profile.html">Akun Saya</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-purchases.html">Keluar</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->

			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->


	</div>
	<!-- /SIDE MENU -->

	<!-- MAIN MENU -->
	<div class="main-menu-wrap">
		<div class="menu-bar">
			<nav>
				<ul class="main-menu">
					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="{{Route('welcome')}}">Beranda</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="{{Route('test13')}}">Cara Membeli</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="{{ route('test','Pakan Sapi') }}">Produk</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->

					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->

					<!-- /MENU ITEM -->
				</ul>
			</nav>
			<form class="search-form" method="post" action="{{route('pencarianProduk')}}">
				@csrf
				<input type="hidden" name="kategori" value="Semua Kategori">
				<input type="text" class="rounded" name="nama" id="search_products" placeholder="Cari Produk...">
				<input type="image" src="{{ asset('images/search-icon.png') }} " alt="search-icon">
			</form>
		</div>
	</div>
	<!-- /MAIN MENU -->

	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
		<div class="section-headline">
			<h2>Pembayaran</h2>

		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->

			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class=>
			@if($id == null)
				@foreach($produk as $object)
				<form method="post" action="{{route('bayar',$object->produk->id)}}" enctype="multipart/form-data">
					@csrf
                <!-- CART -->
				<input type="hidden" value="{{$object->produk->id}}" name="id_object">
				@endforeach 
				@else
					<form method="post" action="{{route('bayar',$produk->id)}}" enctype="multipart/form-data">
						@csrf
									<!-- CART -->
					<input type="hidden" value="{{$produk->id}}" name="id_object">
			@endif
				<div class="cart" style="height:auto">

					<div class= p-3>
						    <div class="fas fa-map-marker-alt"> Alamat Pengiriman</div>
							<br/>
							<br/>
							<div class="form-group">
								<label for="exampleFormControlInput1">Nama</label>
								<input name="nama_" type="text" class="form-control" id="exampleFormControlInput1" value="{{Auth::guard('pengguna')->user()->nama}}">
							</div>

							<div class="form-group">
								<label for="exampleFormControlInput1">Nomor Telpon</label>
								<input name="no_tlpn" type="text" class="form-control" id="exampleFormControlInput1" value="{{Auth::guard('pengguna')->user()->no_telp}}">
							</div>

							<div class="form-group">
								<label for="exampleFormControlTextarea1">Masukan Alamat</label>
								<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
							</div>
<!-- //////////////////////////////////////////////////////////// -->
                            <!-- <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Kota Atau Kabupaten</label>
                                <select class="form-control" id="kab" name="kab">
							 	<option>Pilih Kota atau Kabupaten</option>
								@foreach($kabupaten as $nama)
								<option value="{{$nama->id_kabupaten}}"> {{$nama->nama}}</option>
								@endforeach
                                </select>
/////////////////////////////////////////////////////////////////
                            </div> -->
							<div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Kecamatan</label>
                                <select class="form-control" id="daerah" name="ongkir" onchange="hitungOngkir()">
							 		<option>Pilih Kecamatan</option>
									 @foreach($kecamatan as $kec)
									<option value="<?php if ($kec->okr!=NULL){echo $kec->okr;}else{ echo 0;}?>"> {{$kec->kec}}</option>
									@endforeach
                                </select>
                            </div>
					</div>
				</div>

				<br/>

				<div class="cart"  style="height:auto">
			
					<div class= "p-3">
						<div class="fab fa-buffer">  Daftar Pembelian</div><hr/>
					</div>

					<div class="cart-item" style="padding-top:0px">
						<!-- CART ITEM PRODUCT -->

                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                  <b>Foto Produk</b>
                                </div>
                                <div class="col-md-4">
	                               <b>Deskripsi</b>
                                </div>
                                <div class="col-md-4">
                                    <b>Jumlah</b>
                                </div>
                            </div><hr/>
                                <br/>					
								@if($id == null)		
								@foreach($produk as $object)
                            <div class="row">
                                <div class="col-md-4">
                                     <img class="img-fluid" src="{{ asset('uploads/file/'. $object->produk->foto) }}"  height="150" width="150">
                                </div>
                                <div class="col-md-4">
								<span>{{$object->produk->deskripsi}} <br><b>Rp. {{$object->produk->harga}} / {{$object->produk->satuan}}</b></span>
                                </div>
                                <div class="col-md-4">
								<div class="btn-group mr-2" role="group" aria-label="Second group" style="border: 1px #dddddd solid;border-radius: 0.5em;">
								<button onclick="fungsiKurang()" id="btnKurang" type="button" class="btn btn-success"><i class="fas fa-minus"></i></button>
									<input name="id_jumlah" id="jumlah" style="width:100%;max-width:60px" type="text" value="1" disabled="">
								<button onclick="fungsiTambah()" id="btnTambah" type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
									</div>
                                </div>
                            </div>
								@endforeach
									@else			
							<div class="row">
                                <div class="col-md-4">
                                     <img class="img-fluid" src="{{ asset('uploads/file/'. $produk->foto) }}"  height="150" width="150">
                                </div>
                                <div class="col-md-4">
								<span>{{$produk->deskripsi}} <br><b>Rp. {{$produk->harga}} / {{$produk->satuan}}</b></span>
                                </div>
                                <div class="col-md-4">
								<div class="btn-group mr-2" role="group" aria-label="Second group" style="border: 1px #dddddd solid;border-radius: 0.5em;">
								<button onclick="fungsiKurang()" id="btnKurang" type="button" class="btn btn-success"><i class="fas fa-minus"></i></button>
								<input name="id_jumlah" id="jumlah" style="width:100%;max-width:60px" type="text" value="1" readonly>
								<button onclick="fungsiTambah()" id="btnTambah" type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
								</div>
                                </div>
                            </div>		
							@endif						
                        </div>

					</div>
					@if($id == null)	
					@foreach($produk as $object)
					<div class="cart-total">
						<p name="x" class="price" id="harga">{{$object->produk->harga}} </p><p class="price"><span>Rp.</span></p>
						<input class="price" type="hidden" name="harga" id="harga" value='{{$produk->harga}}'>
						<p class="text-header subtotal">Harga</p>
					</div>
					<div class="cart-total">
						<p class="price" id="ongkir"></p><p class="price"><span>Rp.</span></p>
						<p class="text-header subtotal">Ongkos Kirim</p>
					</div>			
					<!-- <div class="cart-total">
					
						<p class="price" id="admin">{{$object->produk->harga/100}}</p><p class="price"><span>Rp.</span></p>
						<p class="text-header subtotal">Biaya Admin</p>
					</div> -->											
					@endforeach
					@else
						<div class="cart-total">
							<p name="x" class="price" id="harga">{{$produk->harga}}</p><p class="price"><span>Rp.</span></p>
							<input class="price" type="hidden" name="harga" id="harga" value='{{$produk->harga}}'>
							<p class="text-header subtotal">Harga</p>
						</div>
						<div class="cart-total">
							<p class="price" id="ongkir"></p><p class="price"><span>Rp.</span></p>
							<p class="text-header subtotal">Ongkos Kirim</p>
						</div>			
						<!-- <div class="cart-total">
							<p class="price" id="admin">{{$produk->harga/100}}</p><p class="price"><span>Rp.</span></p>
							<p class="text-header subtotal">Biaya Admin</p>
						</div> -->
					@endif

					<div class="cart-total">
						<p class="price" id="total"></p><p class="price"><span>Rp.</span></p>
						<p class="text-header total">Total Harga</p>
						
					</div>
					<!-- /CART TOTAL -->
					<br/>
					<div class="cart-actions">
						<button type="submit" class="button mid primary" onclick="return confirm('Apakah anda yakin untuk membuat pesanan')"> Lanjut Bayar</button>	
					</div>
					</div>
				</form>
				</div>



				<!-- /CART -->
				
			</div>
			<!-- CONTENT -->
			
		</div>
	</div>
	<!-- /SECTION -->

	<!-- FOOTER -->
    <footer>
        <!-- FOOTER TOP -->
        <div id="footer-top-wrap">
            <div id="footer-top">
                <!-- COMPANY INFO -->
                <div class="company-info">
                    <figure class="logo small">
                        <img src="{{ asset('images/Logo.png') }}" style="width:200%"/>

                    </figure>

                    <!-- SOCIAL LINKS -->

                    <!-- /SOCIAL LINKS -->
                </div>

                <div class="link-info">
                    <p class="footer-title"></p>

                </div>
                <!-- /LINK INFO -->

                <!-- LINK INFO -->
                <div class="link-info">
                    <p class="footer-title">Head Office</p>
                    <p>CV. SigerDev Lampung</p>
                    <p>Bandar Lampung</P>
                    <br/>
                    <p class="footer-title">Head Office</p>
                    <p> Hotline - 0857 8093 8970</p>
                    <p> Email - cs@epakan.id</p>
                </div>
                <!-- /LINK INFO -->

                <div class="link-info">
                    <p class="footer-title"></p>
                </div>

                <!-- TWITTER FEED -->
                <div class="twitter-feed">
                    <p class="footer-title">Download Aplikasi ePakan</p>
                    <p>App Store</P>
                    <p>Play Store</P>
                    <br/>
                    <p class="footer-title">Follow Us</p>
                    <p>Let us be social</p>
                    <ul class="social-links">
                        <li class="social-link fb">
                            <a href="#"></a>
                        </li>
                        <li class="social-link twt">
                            <a href="#"></a>
                        </li>
                        <li class="social-link db">
                            <a href="#"></a>
                        </li>
                        <li class="social-link rss">
                            <a href="#"></a>
                        </li>
                    </ul>

                </div>
                <!-- /TWITTER FEED -->
            </div>
        </div>
        <!-- /FOOTER TOP -->

        <!-- FOOTER BOTTOM -->
        <div id="footer-bottom-wrap">
            <div id="footer-bottom">
                <p><span>&copy;</span><a href="{{ route('welcome') }}">Copyright CV.</a> SigerDev Lampung 2019</p>
            </div>
        </div>
        <!-- /FOOTER BOTTOM -->
    </footer>
	<!-- /FOOTER -->

	<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">
	<symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
		<path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
	</symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG STAR -->
<svg style="display: none;">
	<symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
		<polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751
	2.495,6.313 -0.002,3.878 3.45,3.376 "/>
	</symbol>
</svg>
<!-- /SVG STAR -->

<!-- SVG PLUS -->
<svg style="display: none;">
	<symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
		<rect x="5" width="3" height="13"/>
		<rect y="5" width="13" height="3"/>
	</symbol>
</svg>
<!-- /SVG PLUS -->
@if($id == null)	
@foreach ($produk as $object)
<script>

		function fungsiTambah() {
			var jumlah = parseInt(document.getElementById("jumlah").value);
			document.getElementById("jumlah").value = ++jumlah;
			var harga = {{$object->produk->harga}};
			var total = harga * jumlah;
			document.getElementById("harga").innerHTML = total;
			// document.getElementById("admin").innerHTML = total/100;
			var harga = parseInt(document.getElementById("harga").innerHTML);
		    var ongkir = parseInt(document.getElementById("ongkir").innerHTML);
		    // var admin = parseInt(document.getElementById("admin").innerHTML);
		    var total = harga + ongkir;
		    document.getElementById("total").innerHTML = total;
		}

		function fungsiKurang() {
			var jumlah = parseInt(document.getElementById("jumlah").value);
			if(jumlah > 1){
				document.getElementById("jumlah").value = --jumlah;
				var harga = {{$object->produk->harga}};
				var total = harga * jumlah;
				document.getElementById("harga").innerHTML = total;
				// document.getElementById("admin").innerHTML = total/100;
				var harga = parseInt(document.getElementById("harga").innerHTML);
			    var ongkir = parseInt(document.getElementById("ongkir").innerHTML);
			    // var admin = parseInt(document.getElementById("admin").innerHTML);
			    var total = harga + ongkir;
			    document.getElementById("total").innerHTML = total;
			}
		}

</script>
@endforeach
	@else
	<script>

function fungsiTambah() {
	var jumlah = parseInt(document.getElementById("jumlah").value);
	document.getElementById("jumlah").value = ++jumlah;
	var harga = {{$produk->harga}};
	var total = harga * jumlah;
	document.getElementById("harga").innerHTML = total;
	// document.getElementById("admin").innerHTML = total/100;
	var harga = parseInt(document.getElementById("harga").innerHTML);
		var ongkir = parseInt(document.getElementById("ongkir").innerHTML);
		// var admin = parseInt(document.getElementById("admin").innerHTML);
		var total = harga + ongkir;
		document.getElementById("total").innerHTML = total;
}

function fungsiKurang() {
	var jumlah = parseInt(document.getElementById("jumlah").value);
	if(jumlah > 1){
		document.getElementById("jumlah").value = --jumlah;
		var harga = {{$produk->harga}};
		var total = harga * jumlah;
		document.getElementById("harga").innerHTML = total;
		// document.getElementById("admin").innerHTML = total/100;
		var harga = parseInt(document.getElementById("harga").innerHTML);
			var ongkir = parseInt(document.getElementById("ongkir").innerHTML);
			// var admin = parseInt(document.getElementById("admin").innerHTML);
			var total = harga + ongkir;
			document.getElementById("total").innerHTML = total;
	}
}

</script>
@endif

<script>
function hitungOngkir() {
  var x = document.getElementById("daerah").value;
  document.getElementById("ongkir").innerHTML = x;
  var harga = parseInt(document.getElementById("harga").innerHTML);
  var ongkir = parseInt(document.getElementById("ongkir").innerHTML);
  // var admin = parseInt(document.getElementById("admin").innerHTML);
  var total = harga + ongkir;
  document.getElementById("total").innerHTML = total;
}
</script>

@push('scripts')
<script>
$(function () {
    $('#kab').on('change', function () {
        axios.post('{{ route('pembayaran.store') }}', {id_kabupaten: $(this).val()})
            .then(function (response) {
                $('#daerah').empty();

                $.each(response.data, function (kec, okr) {
                    $('#daerah').append(new Option(kec, okr))
                })
            });
    });
});
</script>
@endpush

<script src="{{ asset('js/app.js') }}" defer></script>
@stack('scripts')
<!-- jQuery -->
<script src="js/vendor/jquery-3.1.0.min.js"></script>
<!-- Tweet -->
<script src="js/vendor/twitter/jquery.tweet.min.js"></script>
<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>
<!-- Footer -->
<script src="js/footer.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- Mirrored from odindesign-themes.com/emerald-dragon/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 18:24:00 GMT -->
</html>
