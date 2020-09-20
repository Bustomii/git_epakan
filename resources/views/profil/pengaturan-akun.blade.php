<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from odindesign-themes.com/emerald-dragon/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 18:24:00 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- favicon -->
	<link rel="icon" href="favicon.ico">
	<title>ePakan | Profil</title>
</head>
<body>

	<!-- HEADER -->
	<div class="header-wrap">
		<header>
			<!-- LOGO -->
			<a href="index-2.html">
				<figure class="logo">
					<img src="images/Logo.png" alt="logo">
				</figure>
			</a>
			<!-- /LOGO -->

			<!-- MOBILE MENU HANDLER -->
			<div class="mobile-menu-handler left primary">
				<img src="images/pull-icon.png" alt="pull-icon">
			</div>
			<!-- /MOBILE MENU HANDLER -->

			<!-- LOGO MOBILE -->
			<a href="index-2.html">
				<figure class="logo-mobile">
					<img src="images/Logo.png" alt="logo-mobile">
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

					

					<!-- DROPDOWN -->
					<ul class="dropdown small hover-effect closed">
						<li class="dropdown-item"> 
							<a href="{{ route('info') }}">Akun Saya</a>
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

													<img src="images/Logo.png" style="width:60%"/>
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

											<img src="images/Logo.png" style="width:60%"/>
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
		<p class="side-menu-title">Menu</p>
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
				<a href="{{route('info')}}s">
				<div class="outer-ring">
					<div class="inner-ring"></div>
                    <figure class="user-avatar medium">
                    							<img src="{{asset('uploads/file/'. $pengguna->foto)}}" alt="profile-default-image">
                    						</figure>
				</div>
				</a>
				<!-- /USER AVATAR -->

				<!-- USER INFORMATION -->
				<p class="user-name">Raman Farm</p>
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
				<a href="{{route('info')}}">Akun Saya</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
			<a href="{{route('logout')}}">Keluar</a>
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
			<h2>Profil</h2>
            <a href="{{route('belumbayar')}}">
			<p>JUAL<span class="separator"></span><span class="current-section"></span></p>
			</a>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar left">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item">
                    <div class="">

                    <figure class="user-avatar medium">
                    							<img src="{{asset('uploads/file/'. $pengguna->foto)}}" alt="profile-default-image">
                    						</figure>
                    </div>

					<h4>{{$pengguna->nama}}</h4>


                    <hr class="line-separator">
						<a href="{{ route('info') }}">Info Pribadi</a>
                    <br/>
                    <br/>
				        <a href="{{ route('pesanan') }}">Pesanan Saya</a>
						<br/>
                    	<br/>
						<a href="{{ route('pengaturan') }}">Pengaturan Akun</a>
						<br/>
                    	<br/>
						<a href="{{ route('bantuan') }}">Pusat Bantuan</a>

						<br/>
                    	<br/>
						<a href="{{route('logout')}}">Keluar</a>
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->

				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content right">
				<!-- CART -->
				<div class="cart" style="height:auto">
					<div class= p-3>
						 <h4> Profil</h4><hr/>
              <form method="post" action="{{route('simpan-profil')}}" enctype="multipart/form-data">
              @csrf

            <input type="hidden" name="id" value="{{Auth::guard('pengguna')->user()->id}}">
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-md-3">
										<figure class="user-avatar medium">
                							<img src="{{asset('uploads/file/'. $pengguna->foto)}}" alt="profile-default-image">
                   						</figure>
									</div>
									<div class="col-md-4">
										<p class="text-header">Foto Profil</p>
                    					<p class="upload-details">Ukuran gambar: maks. 1 MB </p>
                              <p class="upload-details">Format gambar: .JPEG, .PNG</p>
									</div>
									<div class="col-md-3">
                    	<input name="foto" type="file" accept="image/*"/>
									</div>
									
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Nama</label>
							<input type="name" class="form-control" name="nama" id="exampleFormControlInput1" value="{{$pengguna->nama}}">
						</div>

                        <div class="form-group">
							<label for="exampleFormControlInput1">Email</label>
							<input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{{$pengguna->email}}">
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Nomor Telpon</label>
							<input type="name" class="form-control" name="no_telp" id="exampleFormControlInput1" value="{{$pengguna->no_telp}}">
						</div>

						<div class="form-group">
							<label for="exampleFormControlTextarea1">Masukan Alamat</label>
							<textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{$pengguna->alamat}}</textarea>
						</div>

                       <div class="form-group">
                           <label for="exampleFormControlSelect1">Pilih Kota Atau Kabupaten</label>
                            <select name="daerah" class="form-control" id="exampleFormControlSelect1">
                            	<option  value="{{$pengguna->daerah}}">{{$pengguna->daerah}}</option>
                                @if($pengguna->daerah=="Bandar Lampung")
															<option>Metro</option>
                                <option value="Lampung Barat">Lampung Barat</option>
                                <option value="Lampung Selatan">Lampung Selatan</option>
                                <option value="Lampung Tengah">Lampung Tengah</option>
                                <option value="Lampung Timur">Lampung Timur</option>
                                <option value="Lampung Utara">Lampung Utara</option>
                                <option value="Mesuji">Mesuji</option>
                                <option velue="Pesawaran">Pesawaran</option>
                                <option value="Pringsewu">Pringsewu</option>
                                <option value="Tanggamus">Tanggamus</option>
                                <option value="Tulang Bawang">Tulang Bawang</option>
                                <option value="Tulang Bawang Barat">Tulang Bawang Barat</option>
                                <option value="Way Kanan">Way Kanan</option>
                                <option value="Pesisir Barat">Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Metro")
								<option>Bandar Lampung</option>
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
								@endif

								@if($pengguna->daerah=="Lampung Barat")
								<option>Metro</option>
                                <option>Bandar Lampung</option>
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
								@endif

								@if($pengguna->daerah=="Lampung Selatan")
								<option>Metro</option>
                                <option>Lampung Barat</option>
                                <option>Bandar Lampung</option>
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
								@endif

								@if($pengguna->daerah=="Lampung Tengah")
								<option>Metro</option>
                                <option>Lampung Barat</option>
                                <option>Lampung Selatan</option>
                                <option>Bandar Lampung</option>
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
								@endif

								@if($pengguna->daerah=="Lampung Timur")
								<option>Metro</option>
                                <option>Lampung Barat</option>
                                <option>Lampung Selatan</option>
                                <option>Lampung Tengah</option>
                                <option>Bandar Lampung</option>
                                <option>Lampung Utara</option>
                                <option>Mesuji</option>
                                <option>Pesawaran</option>
                                <option>Pringsewu</option>
                                <option>Tanggamus</option>
                                <option>Tulang Bawang</option>
                                <option>Tulang Bawang Barat</option>
                                <option>Way Kanan</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Lampung Utara")
								<option>Metro</option>
                                <option>Lampung Barat</option>
                                <option>Lampung Selatan</option>
                                <option>Lampung Tengah</option>
                                <option>Lampung Timur</option>
                                <option>Bandar Lampung</option>
                                <option>Mesuji</option>
                                <option>Pesawaran</option>
                                <option>Pringsewu</option>
                                <option>Tanggamus</option>
                                <option>Tulang Bawang</option>
                                <option>Tulang Bawang Barat</option>
                                <option>Way Kanan</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Mesuji")
								<option>Metro</option>
                                <option>Lampung Barat</option>
                                <option>Lampung Selatan</option>
                                <option>Lampung Tengah</option>
                                <option>Lampung Timur</option>
                                <option>Lampung Utara</option>
                                <option>Bandar Lampung</option>
                                <option>Pesawaran</option>
                                <option>Pringsewu</option>
                                <option>Tanggamus</option>
                                <option>Tulang Bawang</option>
                                <option>Tulang Bawang Barat</option>
                                <option>Way Kanan</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Pesawaran")
								<option>Metro</option>
                                <option>Lampung Barat</option>
                                <option>Lampung Selatan</option>
                                <option>Lampung Tengah</option>
                                <option>Lampung Timur</option>
                                <option>Lampung Utara</option>
                                <option>Mesuji</option>
                                <option>Bandar Lampung</option>
                                <option>Pringsewu</option>
                                <option>Tanggamus</option>
                                <option>Tulang Bawang</option>
                                <option>Tulang Bawang Barat</option>
                                <option>Way Kanan</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Pringsewu")
								<option>Metro</option>
                                <option>Lampung Barat</option>
                                <option>Lampung Selatan</option>
                                <option>Lampung Tengah</option>
                                <option>Lampung Timur</option>
                                <option>Lampung Utara</option>
                                <option>Mesuji</option>
                                <option>Pesawaran</option>
                                <option>Bandar Lampung</option>
                                <option>Tanggamus</option>
                                <option>Tulang Bawang</option>
                                <option>Tulang Bawang Barat</option>
                                <option>Way Kanan</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Tanggamus")
								<option>Metro</option>
                                <option>Lampung Barat</option>
                                <option>Lampung Selatan</option>
                                <option>Lampung Tengah</option>
                                <option>Lampung Timur</option>
                                <option>Lampung Utara</option>
                                <option>Mesuji</option>
                                <option>Pesawaran</option>
                                <option>Pringsewu</option>
                                <option>Bandar Lampung</option>
                                <option>Tulang Bawang</option>
                                <option>Tulang Bawang Barat</option>
                                <option>Way Kanan</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Tulang Bawang")
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
                                <option>Bandar Lampung</option>
                                <option>Tulang Bawang Barat</option>
                                <option>Way Kanan</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="TulangBawang Barat")
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
                                <option>Bandar Lampung</option>
                                <option>Way Kanan</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Way Kanan")
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
                                <option>Bandar Lampung</option>
                                <option>Pesisir Barat</option>
								@endif

								@if($pengguna->daerah=="Pesisir Barat")
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
                                <option>Bandar Lampung</option>
								@endif

                            </select>
                    	</div>
						<center>
						<button type="submit" class="btn btn-success">Simpan</button></center>
          </form>
					</div>

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
