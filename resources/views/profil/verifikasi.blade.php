<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from odindesign-themes.com/emerald-dragon/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 18:20:13 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/vendor/simple-line-icons.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/vendor/tooltipster.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/vendor/owl.carousel.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/style.css') }} ">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- favicon -->
	<title>ePakan | Beranda</title>
</head>
<body>

<div class="header-wrap">
		<header>
			<!-- LOGO -->
			<a href="#">
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
			
			<!-- /USER BOARD -->
		</header>
	</div><br><br>

    <form action="{{ route('verifikasiOTP') }}" method="post">
    @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputPassword1">verifikasi</label>
                <input type="number" id="about" name="kode_verifikasi" placeholder="Masukan Nomor verifikasi">
                <input type="hidden" name="no_telp" value="{{$telp}}">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
            </div>
        </div>

        <div class="modal-footer">
        <button type="submit" class="btn btn-success" style="color:#ffffff">Masuk</button>
        </div>
</form>



<br>
<br><br><br><br><br><br><br>
<!-- /SVG PLUS -->

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

<!-- Mirrored from odindesign-themes.com/emerald-dragon/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 18:22:16 GMT -->
</html>
