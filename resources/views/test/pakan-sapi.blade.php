<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from odindesign-themes.com/emerald-dragon/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 18:24:08 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/vendor/simple-line-icons.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/vendor/tooltipster.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/vendor/owl.carousel.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/style.css') }} ">
	<!-- favicon -->
	<link rel="icon" href="favicon.ico">
	<title>ePakan | Produk</title>
</head>
<body>

	<!-- HEADER -->
	<div class="header-wrap">
		<header>
			<!-- LOGO -->
			<a href="{{ route('welcome') }}">
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
			<a href="{{ route('welcome') }}">
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

						<!-- PIN -->
						<span class="pin soft-edged secondary"></span>
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
					<a href="{{ route('daftarakun') }}" class="btn btn-success btn-lg active" style="color:#ffffff" role="button" aria-pressed="true">Daftar</a>
                </div>

                <div class="account-information" style= "margin-bottom:100p"> 
					<a href="{{ route('loginOTP') }}" class="btn btn-warning btn-lg active" style="color:#ffffff" role="button" aria-pressed="true">Masuk</a>
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
										<label for="nama" class="">Nama Lengkap</label>
										<input type="text" id="about" name="nama" placeholder="Masukan Nama">
									</div>

									<div class="input-container">
										<label for="about" class="">Nomor Telpon</label>
										<input type="number" id="about" name="no_telp" placeholder="Masukan Nomor Telpon">
									</div>

									<div class="input-container">
										<label for="alamat" class="">Alamat</label>
										<input type="text" id="about" name="alamat" placeholder="Masukan Alamat">
									</div>
							
									<div class="input-container">
                            	      	<label for="nama" class="">Daerah</label>
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
                     			</div>

                      			<div class="modal-footer">
	                        		<button type="submit" class="btn btn-success" style="color:#ffffff">Daftar</button>
		                    	</div>
                   			</div>
                  		</div>
               		</div>
				</form>

                

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
                <a href="{{ route('welcome') }}">Beranda</a>

			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{Route('test13')}}">Cara Membeli</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="#">Produk</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->

			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->

			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->

					<!-- /INNER DROPDOWN ITEM -->
				</ul>
				<!-- /INNER DROPDOWN -->
			</li>
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
				<p class="user-name">Raman Fram</p>
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
						<a href="{{ route('welcome') }}">Beranda</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="{{Route('test13')}}">Cara Membeli</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="#">Produk</a>
					</li>

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
	<div class="section-headline-wrap v2">
		<div class="section-headline">
			<h2>Produk</h2>

		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- CONTENT -->
			<div class="content">
				<!-- HEADLINE -->
				<div class="headline tertiary">
					<h4>{{$kategori}}</h4>
					<!-- VIEW SELECTORS -->
					<!-- <div class="view-selectors">

						<a href="products-listview.html" class="view-selector list"></a>
					</div> -->
					<!-- /VIEW SELECTORS -->
					
					<div class="clearfix"></div>
				</div>
				<!-- /HEADLINE -->

				<!-- PRODUCT SHOWCASE -->
				<div class="product-showcase">
					<!-- PRODUCT LIST -->
					<div class="product-list grid column3-4-wrap">
						<!-- PRODUCT ITEM -->
						@foreach($produk as $data)
						<div class="product-item column">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<a href="{{route('detail', $data->id)}}">
									<figure class="product-preview-image">
										<img src="{{ asset('uploads/file/'.$data->foto) }}" style="height:110%" alt="product-image">
									</figure>
								</a>
							</div>
							<div class="product-info">
								<a href="{{route('detail', $data->id)}}">
									<p class="text-header">{{$data->nama}}</p>
								</a>
								<p class="product-description">{{$data->lokasi}}</p>

									<p class="category tertiary">{{$data->kategori}}</p>

								<p class="price"><span>Rp</span>{{$data->harga}}<span>/<span>{{$data->satuan}}</p>
								
							</div>
							<!-- /PRODUCT INFO -->
							<hr class="line-separator">

							<!-- USER RATING -->
							<div class="user-rating">
								<a href="{{ route('profil-produk',['id'=>$data->pengguna->id, 'kategori'=>'Semua Kategori']) }}">
									<figure class="user-avatar small">
										<img src="{{ asset('uploads/file/'.$data->pengguna->foto) }}" alt="user-avatar">
									</figure>
								</a>
									<br><br>
									<a href="{{ route('profil-produk',['id'=>$data->pengguna->id, 'kategori'=>'Semua Kategori']) }}">
										<p class="text-header tiny">{{$data->pengguna->nama}}</p>
									</a>
							</div>
							<!-- /USER RATING -->
						</div>
						@endforeach
					</div>
					<!-- /PRODUCT LIST -->
				</div>
				<!-- /PRODUCT SHOWCASE -->
				<div class="clearfix"></div>

				<!-- PAGER -->
				<!-- <div class="pager tertiary">
					<div class="pager-item"><p>1</p></div>
					<div class="pager-item active"><p>2</p></div>
					<div class="pager-item"><p>3</p></div>
					<div class="pager-item"><p>...</p></div>
					<div class="pager-item"><p>17</p></div>
				</div> -->
				<!-- /PAGER -->
			</div>
			<!-- CONTENT -->

			<!-- SIDEBAR -->
			<div class="sidebar">
				<!-- DROPDOWN -->
				<ul class="dropdown hover-effect tertiary">
                    <br/>
                    <h4>Daftar Produk</h4>
                    <br/>
                    	<hr class="line-separator">
					<li class="dropdown-item">
						<a href="{{ route('test','Pakan Sapi') }}">Pakan Sapi</a>
					</li>
					<li class="dropdown-item">
						<a href="{{ route('test','Pakan Kuda') }}">Pakan Kuda</a>
					</li>
					<li class="dropdown-item">
						<a href="{{ route('test','Pakan Domba & Kambing') }}">Pakan Domba & Kambing</a>
					</li>
					<li class="dropdown-item">
						<a href="{{ route('test','Pakan Ayam') }}">Pakan Ayam</a>
					</li>
					<li class="dropdown-item">
						<a href="{{ route('test','Pakan Kerbau') }}">Pakan Kerbau</a>
					</li>
                    <li class="dropdown-item">
						<a href="{{ route('test','Supplement') }}">Supplement</a>
					</li>
                    <li class="dropdown-item">
						<a href="{{ route('test','Hijauan') }}">Hijauan</a>
					</li>
                    <li class="dropdown-item">
						<a href="{{ route('test','Bahan Mentah Pakan') }}">Bahan Mentah Pakan</a>
					</li>
                    <li class="dropdown-item">
						<a href="{{ route('test','Produk Peternak Binaan') }}">Produk Peternak Binaan</a>
					</li>
				</ul>
				<!-- /DROPDOWN -->

				<!-- SIDEBAR ITEM -->

				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->

				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->

				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->
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
<!-- jQuery -->
<script src="{{ asset('js/vendor/jquery-3.1.0.min.js') }}"></script>
<!-- Tooltipster -->
<script src="{{ asset('js/vendor/jquery.tooltipster.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('js/vendor/owl.carousel.min.js') }}"></script>
<!-- Tweet -->
<script src="{{ asset('js/vendor/twitter/jquery.tweet.min.js') }}"></script>
<!-- xmAlerts -->
<!-- Side Menu -->
<script src="{{ asset('js/side-menu.js') }}"></script>
<!-- Home -->
<script src="{{ asset('js/home.js') }}"></script>
<!-- Tooltip -->
<script src="{{ asset('js/tooltip.js') }}"></script>
<!-- User Quickview Dropdown -->
<script src="{{ asset('js/user-board.js') }}"></script>
<!-- Home Alerts -->
<script src="{{ asset('js/home-alerts.js') }}"></script>
<!-- Footer -->
<script src="{{ asset('js/footer.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- Mirrored from odindesign-themes.com/emerald-dragon/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 18:24:11 GMT -->
</html>
