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
	<title>ePakan | Keranjang</title>
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
							<a href="{{route('info')}}">Akun Saya</a>
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
					<figure class="user-avatar">
						<img src="images/avatars/avatar_22.jpg" alt="avatar">
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
				<a href="{{route('info')}}">Akun Saya</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{route('home')}}">Keluar</a>
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

	@if (session('message'))
    <div class="alert alert-success text-center">
      <font color="black" size="3px">{{session('message')}}</font>
    </div>
    @endif
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
		<div class="section-headline">
			<h2>Keranjang</h2>

		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->

			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="center">
				<!-- CART -->
				<div class="cart" style="height:auto">
					<!-- CART HEADER -->
					<div class="cart-header">
						<div class="cart-header-product" style="margin-right:40px">
							<p class="text-header small">Product Details</p>
						</div>
						<div class="cart-header-jumlah" style="margin-right:35px">
							<p class="text-header small">Jumlah</p>
						</div>
						<div class="cart-header-price" style="margin-right:3px">
							<p class="text-header small">Harga</p>
						</div>
						<div class="cart-header-actions" style="margin-right:3px">
							<p class="text-header small">Hapus</p>
						</div>
					</div>
					<!-- /CART HEADER -->

					<!-- CART ITEM -->

					<!-- /CART ITEM -->

					<!-- CART ITEM -->
					<form class="search-form" method="post" action="{{route('pencarianProduk')}}">
					<?php
					$jumlahharga=0;
					?>

					@foreach($keranjang as $ulang => $data)
						@if ($ulang === 0)
						@endif

					<?php
					$jumlahharga+=$data->produk->harga*$data->jumlah;

					?>
					
					<div class="cart-item" id="item{{$ulang+1}}">

						<!-- CART ITEM PRODUCT -->
						<div class="cart-item-product" style="width:380px">
							<!-- ITEM PREVIEW -->
							<div class="item-preview">

								<a href="">
									<figure class="product-preview-image small liquid">
										<img src="{{ asset('uploads/file/'.$data->produk->foto) }} " alt="product-image">
									</figure>
								</a>
								<a href="{{route('detail', $data->produk->id)}}"><p class="text-header small">{{$data->produk->nama}}</p></a>
								<p class="description">{{$data->produk->lokasi}}</p>
							</div>
							<!-- /ITEM PREVIEW -->
						</div>

						<!-- /CART ITEM PRODUCT -->

						<!-- CART ITEM CATEGORY -->
						<div class="cart-item-jumlah">

						<div class="input-group mb-1">
                            <div class="btn-group mr-2" role="group" aria-label="Second group" style="border: 1px #dddddd solid;border-radius: 0.5em;">
                                <button onclick="fungsiKurang{{$ulang+1}}()" id="btnKurang{{$ulang+1}}" type="button" class="btn btn-success"><i class="fas fa-minus"></i></button>
                                <input id="jumlah{{$ulang+1}}" style="width:100%;max-width:60px" type="number" value="{{$data->jumlah}}" disabled="">
                                <button onclick="fungsiTambah{{$ulang+1}}()" id="btnTambah{{$ulang+1}}" type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
                            </div>
	  					 </div>

						</div>
						<!-- /CART ITEM CATEGORY -->

						<!-- CART ITEM PRICE -->
						<div class="cart-item-price" style="padding-top:13px">
							<p class="price"><span>Rp</span>{{$data->produk->harga}}<span>/</span>{{$data->produk->satuan}}</p>
						</div>
						<!-- /CART ITEM PRICE -->

						<!-- CART ITEM ACTIONS -->
						<div class="cart-item-actions" style="padding-top:13px">
				<!--			<button onclick="hapus{{$ulang+1}}()" class="button dark-light rmv"> -->
				<!--<a href="{{route('hapusKeranjang', $data->id_keranjang)}}">hapus</a>
				<td><a href="{{route('hapusKeranjang', $data->id_keranjang)}}" onclick="return confirm('Are you sure?')" >Delete</a> </td>
				-->				
			<!--	<form method="post" action="{{route('hapusKeranjang', $data->id_produk)}}">
				@csrf
								<input type="hidden" name="delete" id="id_keranjang"  />
								<button class="btn btn-success btn-block" type="submit"><i > </i> hapus</button>
				</form> -->
				
				<td>
					<a href="{{route('hapusKeranjang', ['id_keranjang'=>$data->id_keranjang])}}" class="btn btn-danger btn-xs">hapus</a>
				</td> 
			</button>
			</div>
			</div>
			@endforeach
				

					<!-- CART TOTAL -->
					<div class="cart-total">
					<p class="price" id="harga">{{$jumlahharga}}</p><p class="price"><span>Rp.</span></p>
						<!--<p class="price"><span>Rp.</span><span id="harga"></span></p>-->
						<p class="text-header subtotal">Total Harga</p>
					</div>
					<!-- /CART TOTAL -->

					<!-- CART TOTAL -->
					<!-- <div class="cart-total">
						<p class="price"><span>Rp.</span>5.0000</p>
						<p class="text-header subtotal">Ongkos Kirim</p>
					</div> -->
					<!-- /CART TOTAL -->

					<!-- CART TOTAL -->
					<!-- <div class="cart-total">
						<p class="price medium"><span>Rp.</span>55.000</p>
						<p class="text-header total">Total Harga</p>
					</div> -->
					<!-- /CART TOTAL -->

					<!-- CART ACTIONS -->
					<div class="cart-actions">
						<a href="{{Route('pembayarann',['id_pengguna'=>$pengguna->id])}}" class="button mid primary">Selanjutnya</a>
					
					</div> 
					<!-- /CART ACTIONS -->
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


<script>
	@foreach($keranjang as $ulang => $data)
		function fungsiTambah{{$ulang+1}}() {
			var jumlah = parseInt(document.getElementById("jumlah{{$ulang+1}}").value);
			jumlah+=1;
			document.getElementById("jumlah{{$ulang+1}}").value = jumlah;
			var harga = {{$data->produk->harga}};
			var total = harga * jumlah;
			document.getElementById("harga").innerHTML = total;
		}

		function fungsiKurang{{$ulang+1}}() {
			var jumlah = parseInt(document.getElementById("jumlah{{$ulang+1}}").value);
			if(jumlah > 1){
				document.getElementById("jumlah{{$ulang+1}}").value = jumlah-=1;
				var harga = {{$data->produk->harga}};
				var total = harga * jumlah;
				document.getElementById("harga").innerHTML = total;
			}
		}

	//	function hapus{{$ulang+1}}() {
	//		 document.getElementById("item{{$ulang+1}}").style.display='none';
	//	}
	@endforeach
</script>

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
