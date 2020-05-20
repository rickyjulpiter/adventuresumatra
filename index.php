<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Adventure Sumatra</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Adventure Sumatra">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="js/custom.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<?php
function limit_words($string, $word_limit)
{
	$words = explode(" ", $string);
	return implode(" ", array_splice($words, 0, $word_limit));
}
?>

<body>

	<?php
	$queryTentang = mysqli_query($koneksi, "SELECT * FROM tentang WHERE id = 1") or die(mysqli_error());
	$tentang = mysqli_fetch_assoc($queryTentang);
	$whatsapp = $tentang['whatsapp'];
	?>
	<a href="https://wa.me/<?= $whatsapp ?>" class="float" target="_blank">
		<i class="fa fa-whatsapp my-float"></i> Contact Us
	</a>
	<div class="super_container">

		<!-- Header -->

		<header class="header">

			<!-- Top Bar 

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="phone">+45 345 3324 56789</div>
						<div class="social">
							<ul class="social_list">
								<li class="social_list_item"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="user_box ml-auto">
							<div class="user_box_login user_box_link"><a href="#">login</a></div>
							<div class="user_box_register user_box_link"><a href="#">register</a></div>
						</div>
					</div>
				</div>
			</div>		
		</div> -->

			<!-- Main Navigation -->


			<nav class="main_nav" style="background: #b0c321;">
				<div class="container">
					<div class="row">
						<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<div class="logo"><a href="#"><img src="images/logo2.png" alt=""></a></div>
							</div>
							<div class="main_nav_container ml-auto">
								<ul class="main_nav_list" id="Mennu">
									<li class="main_nav_item"><a href="#">home</a></li>
									<li class="main_nav_item"><a href="about.php">about us</a></li>
									<li class="main_nav_item">
										<a href="destination-area-detaill?destination=Medan" style="font-size: 12px;">Destination <i class="fa fa-angle-down"></i></a>
										<ul>
											<?php
											$query_destinasi = mysqli_query($koneksi, "SELECT * FROM destinasi ORDER BY prioritas ASC") or die(mysqli_error());
											while ($data = mysqli_fetch_array($query_destinasi)) {
												$idDestinasi = $data['id'];
												$namaDestinasi = $data['nama'];
											?>
												<li>
													<a href="destination-detaill?destination=<?php echo $namaDestinasi; ?>"><?php echo $namaDestinasi; ?> <i class="arrow-indicator fa fa-angle-right"></i></a>
													<ul>
														<?php
														$query_area_destinasi = mysqli_query($koneksi, "SELECT * FROM destinasi_area WHERE destinasi_id = '$idDestinasi' ORDER BY prioritas ASC") or die(mysqli_error());
														while ($area = mysqli_fetch_array($query_area_destinasi)) {
															$namaDestinasiArea = $area['nama_area'];
														?>
															<li><a href="destination-area-detaill?destination=<?php echo $namaDestinasiArea; ?>"><?php echo $namaDestinasiArea; ?></a></li>
														<?php } ?>
													</ul>
												</li>
											<?php } ?>
										</ul>
									</li>
									<li class="main_nav_item"><a href="#">tour packages<i class="fa fa-angle-down"></i></a>
										<ul>
											<?php
											// $query_destinasi = mysqli_query($koneksi, "SELECT DISTINCT(d.id),d.nama FROM paket_wisata_detail AS pwd INNER JOIN destinasi_area AS da ON pwd.destinasi_area_id = da.id_area INNER JOIN destinasi AS d ON d.id = da.destinasi_id ORDER BY d.id ASC") or die(mysqli_error());
											$query_destinasi = mysqli_query($koneksi, "SELECT * FROM destinasi ORDER BY prioritas ASC LIMIT 6") or die(mysqli_error());
											while ($data = mysqli_fetch_array($query_destinasi)) {
												$idDestinasi = $data['id'];
												$namaDestinasi = $data['nama'];
											?>
												<li>
													<a href="tour-listt?name=<?= $namaDestinasi ?>"><?= $namaDestinasi ?></a>
												</li>
											<?php } ?>
										</ul>
									</li>
									<!--<li class="main_nav_item"><a href="blog.html">news</a></li> -->
									<li class="main_nav_item"><a href="contact.php">contact</a></li>
								</ul>
							</div>
							<!--
						<div class="content_search ml-lg-0 ml-auto">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="17px" height="17px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
								<g>
									<g>
										<g>
											<path class="mag_glass" fill="#FFFFFF" d="M78.438,216.78c0,57.906,22.55,112.343,63.493,153.287c40.945,40.944,95.383,63.494,153.287,63.494
											s112.344-22.55,153.287-63.494C489.451,329.123,512,274.686,512,216.78c0-57.904-22.549-112.342-63.494-153.286
											C407.563,22.549,353.124,0,295.219,0c-57.904,0-112.342,22.549-153.287,63.494C100.988,104.438,78.439,158.876,78.438,216.78z
											M119.804,216.78c0-96.725,78.69-175.416,175.415-175.416s175.418,78.691,175.418,175.416
											c0,96.725-78.691,175.416-175.416,175.416C198.495,392.195,119.804,313.505,119.804,216.78z"/>
										</g>
									</g>
									<g>
										<g>
											<path class="mag_glass" fill="#FFFFFF" d="M6.057,505.942c4.038,4.039,9.332,6.058,14.625,6.058s10.587-2.019,14.625-6.058L171.268,369.98
											c8.076-8.076,8.076-21.172,0-29.248c-8.076-8.078-21.172-8.078-29.249,0L6.057,476.693
											C-2.019,484.77-2.019,497.865,6.057,505.942z"/>
										</g>
									</g>
								</g>
							</svg>
						</div> 

						<form id="search_form" class="search_form bez_1">
							<input type="search" class="search_content_input bez_1">
						</form> -->

							<!--<div class="hamburger">
							<i class="fa fa-bars trans_200"></i>
						</div> -->
						</div>
					</div>
				</div>
			</nav>

		</header>

		<div class="menu trans_500">
			<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
				<div class="menu_close_container">
					<div class="menu_close"></div>
				</div>
				<div class="logo menu_logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
				<ul>
					<li class="menu_item"><a href="#">home</a></li>
					<li class="menu_item"><a href="about.html">about us</a></li>
					<li class="menu_item"><a href="offers.html">offers</a></li>
					<li class="menu_item"><a href="blog.html">news</a></li>
					<li class="menu_item"><a href="contact.html">contact</a></li>
				</ul>
			</div>
		</div>

		<!-- Home -->

		<div class="home">

			<!-- Home Slider -->

			<div class="home_slider_container">

				<div class="owl-carousel owl-theme home_slider">

					<!-- Slider Item -->
					<div class="owl-item home_slider_item">
						<!-- Image by https://unsplash.com/@anikindimitry -->
						<div class="home_slider_background" style="background-image:url(images/tour47-0-Toraja-House-Sulawesi.jpeg)"></div>

						<div class="home_slider_content text-center">
							<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
								<h1>the essential of</h1>
								<h1>bali</h1>
								<div class="button home_slider_button">
									<div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a>
								</div>
							</div>
						</div>
					</div>

					<!-- Slider Item -->
					<div class="owl-item home_slider_item">
						<div class="home_slider_background" style="background-image:url(images/tour47-0-Toraja-House-Sulawesi.jpeg)"></div>

						<div class="home_slider_content text-center">
							<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
								<h1>highlights of</h1>
								<h1>toraja</h1>
								<div class="button home_slider_button">
									<div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a>
								</div>
							</div>
						</div>
					</div>

					<!-- Slider Item -->
					<div class="owl-item home_slider_item">
						<div class="home_slider_background" style="background-image:url(images/tour46-0-Komodo.jpg)"></div>

						<div class="home_slider_content text-center">
							<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
								<h1>overland tour</h1>
								<h1>flores</h1>
								<div class="button home_slider_button">
									<div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- Home Slider Nav - Prev -->
				<div class="home_slider_nav home_slider_prev">
					<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
						<defs>
							<linearGradient id='home_grad_prev'>
								<stop offset='0%' stop-color='#fa9e1b' />
								<stop offset='100%' stop-color='#8d4fff' />
							</linearGradient>
						</defs>
						<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
					M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
					C22.545,2,26,5.541,26,9.909V23.091z" />
						<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
					11.042,18.219 " />
					</svg>
				</div>

				<!-- Home Slider Nav - Next -->
				<div class="home_slider_nav home_slider_next">
					<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
						<defs>
							<linearGradient id='home_grad_next'>
								<stop offset='0%' stop-color='#fa9e1b' />
								<stop offset='100%' stop-color='#8d4fff' />
							</linearGradient>
						</defs>
						<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
				M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
				C22.545,2,26,5.541,26,9.909V23.091z" />
						<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
				17.046,15.554 " />
					</svg>
				</div>

				<!-- Home Slider Dots -->

				<div class="home_slider_dots">
					<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
						<li class="home_slider_custom_dot active">
							<div></div>01.
						</li>
						<li class="home_slider_custom_dot">
							<div></div>02.
						</li>
						<li class="home_slider_custom_dot">
							<div></div>03.
						</li>
					</ul>
				</div>

			</div>

		</div>

		<!-- Search 

	<div class="search">
		

		
		
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="col fill_height">

					

					<div class="search_tabs_container">
						<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/suitcase.png" alt=""><span>hotels</span></div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/bus.png" alt="">car rentals</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/departure.png" alt="">flights</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/island.png" alt="">trips</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/cruise.png" alt="">cruises</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/diving.png" alt="">activities</div>
						</div>		
					</div>

					

					<div class="search_panel active">
						<form action="#" id="search_form_1" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_1" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_1" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					

					<div class="search_panel">
						<form action="#" id="search_form_2" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_2" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_2" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					

					<div class="search_panel">
						<form action="#" id="search_form_3" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_3" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_3" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					

					<div class="search_panel">
						<form action="#" id="search_form_4" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_4" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_4" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					

					<div class="search_panel">
						<form action="#" id="search_form_5" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_5" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_5" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					

					<div class="search_panel">
						<form action="#" id="search_form_6" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_6" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_6" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>		
	</div>
	-->
		<!-- Intro -->

		<div class="intro" style="background-image:url(images/leafbg2.png);background-repeat:no-repeat">
			<div class="container">
				<div class="row">
					<div class="col">
						<h2 class="intro_title text-center">Tour Destinations</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="intro_text text-center">
							<!-- <p>Indonesia is a very unique destination located in South east region. The country is famous throughout the world for its islands and beautiful landscapes. </p> -->
						</div>
					</div>
				</div>
				<br>
				<div class="l u-ml0">
					<div class="u-1/1 u-1/2-lap u-1/3-desk">
						<div class="category-card ">
							<div class="category-card__img">
								<div class="color-overlay color-overlay--rev color-overlay--brand color-overlay--parent">
									<img src="images/nstoba.jpg" title="Lake Toba" alt="Toba 1">
								</div>
							</div>
							<a href="#" class="plain">
							</a>
							<div class="category-card__body"><a href="#" class="plain">
									<div class="intro_center">
										<h1>North Sumatra</h1>
									</div>
								</a>
								<div class="category-card__extra"><a href="#" class="plain">
									</a>
								</div>
							</div>

						</div>
					</div>
					<div class="u-1/1 u-1/2-lap u-1/3-desk">
						<div class="category-card category-card--rev">
							<div class="category-card__img">
								<div class="color-overlay color-overlay--rev color-overlay--brand color-overlay--parent">
									<img src="images/wspiring.jpg" title="Kelok 9" alt="Kelok 9">
								</div>
							</div>
							<a href="#" class="plain">
							</a>
							<div class="category-card__body"><a href="#" class="plain">
									<div class="intro_center">
										<h1>West Sumatra</h1>
									</div>
								</a>
								<div class="category-card__extra"><a href="#" class="plain"></a>
								</div>
							</div>

						</div>
					</div>
					<div class="u-1/1 u-1/2-lap u-1/3-desk">
						<div class="category-card ">
							<div class="category-card__img">
								<div class="color-overlay color-overlay--rev color-overlay--brand color-overlay--parent">
									<img src="images/ssampera.jpg" title="Ampera" alt="Ampera 1">
								</div>
							</div>
							<a href="#" class="plain">
							</a>
							<div class="category-card__body"><a href="#" class="plain">
									<div class="intro_center">
										<h1>South Sumatra</h1>
									</div>
								</a>
								<div class="category-card__extra"><a href="#" class="plain"></a>
								</div>
							</div>

						</div>
					</div>
					<div class="u-1/1 u-1/2-lap u-1/3-desk">
						<div class="category-card category-card--rev">
							<div class="category-card__img">
								<div class="color-overlay color-overlay--rev color-overlay--brand color-overlay--parent">
									<img src="images/jiborobudur.jpg" title="Borobudur" alt="Borobudur">
								</div>
							</div>
							<a href="#" class="plain">
							</a>
							<div class="category-card__body"><a href="#" class="plain">
									<div class="intro_center">
										<h1>Java Island</h1>
									</div>
								</a>
								<div class="category-card__extra"><a href="#" class="plain"></a>
								</div>
							</div>

						</div>
					</div>
					<div class="u-1/1 u-1/2-lap u-1/3-desk">
						<div class="category-card ">
							<div class="category-card__img">
								<div class="color-overlay color-overlay--rev color-overlay--brand color-overlay--parent">
									<img src="images/bnlot.jpg" title="Tanah Lot" alt="Tanah Lot">
								</div>
							</div>
							<a href="#" class="plain">
							</a>
							<div class="category-card__body"><a href="#" class="plain">
									<div class="intro_center">
										<h1>Bali - Nusa Tenggara</h1>
									</div>
								</a>
								<div class="category-card__extra"><a href="#" class="plain"></a>
								</div>
							</div>

						</div>
					</div>
					<div class="u-1/1 u-1/2-lap u-1/3-desk">
						<div class="category-card category-card--rev">
							<div class="category-card__img">
								<div class="color-overlay color-overlay--rev color-overlay--brand color-overlay--parent">
									<img src="images/eiampat.jpg" title="Raja Ampat" alt="Ampat">
								</div>
							</div>
							<a href="#" class="plain">
							</a>
							<div class="category-card__body"><a href="#" class="plain">
									<div class="intro_center">
										<h1>East Indonesia</h1>
									</div>
								</a>
								<div class="category-card__extra"><a href="#" class="plain"></a>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!--
			<div class="row intro_items"">

				<!-- Intro Item 

				<div class="col-lg-4 intro_col"">
					<div class="intro_item"">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@dnevozhai 
						<div class="intro_item_background" style="background-image:url(images/nsgery2.jpg)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<!--<div class="intro_date">May 25th - June 01st</div>
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>Northern Sumatra</h1>
								<!--<div class="intro_price">From $1450</div>
								<!--<div class="rating rating_4">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item 

				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@hellolightbulb 
						<div class="intro_item_background" style="background-image:url(images/wsgery2.jpg)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>West Sumatra</h1>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item 

				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@willianjusten 
						<div class="intro_item_background" style="background-image:url(images/ssgery2.jpg)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>South Sumatra</h1>
							</div>
						</div>
					</div>
				</div>
				<div style="background-color: white;width: 1000px;height: 20px;"></div>
				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@dnevozhai 
						<div class="intro_item_background" style="background-image:url(images/jigery2.jpg)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<!--<div class="intro_date">May 25th - June 01st</div>
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>Java Island</h1>
								<!--<div class="intro_price">From $1450</div>
								<!--<div class="rating rating_4">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item 

				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@hellolightbulb 
						<div class="intro_item_background" style="background-image:url(images/bngery2.jpg)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>Bali - Nusa Tenggara</h1>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item 

				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@willianjusten 
						<div class="intro_item_background" style="background-image:url(images/eigery2.jpg)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>East Indonesia</h1>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			</div>
		</div>

		<!-- CTA 

	<div class="cta">
		
		<div class="cta_background" style="background-image:url(images/cta.jpg)"></div>
		
		<div class="container">
			<div class="row">
				<div class="col">

					

					<div class="cta_slider_container">
						<div class="owl-carousel owl-theme cta_slider">

							
							<div class="owl-item cta_item text-center">
								<div class="cta_title">maldives deluxe package</div>
								<div class="rating_r rating_r_4">
									<i></i>
									<i></i>
									<i></i>
									<i></i>
									<i></i>
								</div>
								<p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
								<div class="button cta_button"><div class="button_bcg"></div><a href="#">book now<span></span><span></span><span></span></a></div>
							</div>

							
							<div class="owl-item cta_item text-center">
								<div class="cta_title">maldives deluxe package</div>
								<div class="rating_r rating_r_4">
									<i></i>
									<i></i>
									<i></i>
									<i></i>
									<i></i>
								</div>
								<p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
								<div class="button cta_button"><div class="button_bcg"></div><a href="#">book now<span></span><span></span><span></span></a></div>
							</div>

							
							<div class="owl-item cta_item text-center">
								<div class="cta_title">maldives deluxe package</div>
								<div class="rating_r rating_r_4">
									<i></i>
									<i></i>
									<i></i>
									<i></i>
									<i></i>
								</div>
								<p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
								<div class="button cta_button"><div class="button_bcg"></div><a href="#">book now<span></span><span></span><span></span></a></div>
							</div>
							
						</div>

						
						<div class="cta_slider_nav cta_slider_prev">
							<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='cta_grad_prev'>
										<stop offset='0%' stop-color='#fa9e1b'/>
										<stop offset='100%' stop-color='#8d4fff'/>
									</linearGradient>
								</defs>
								<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
								M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
								C22.545,2,26,5.541,26,9.909V23.091z"/>
								<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
								11.042,18.219 "/>
							</svg>
						</div>
						
						
						<div class="cta_slider_nav cta_slider_next">
							<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='cta_grad_next'>
										<stop offset='0%' stop-color='#fa9e1b'/>
										<stop offset='100%' stop-color='#8d4fff'/>
									</linearGradient>
								</defs>
							<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
							M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
							C22.545,2,26,5.541,26,9.909V23.091z"/>
							<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
							17.046,15.554 "/>
							</svg>
						</div>

					</div>

				</div>
			</div>
		</div>
					
	</div>
	-->
		<!-- Offers -->

		<div class="offers" style="background-image:url(https://image.freepik.com/free-photo/close-up-beautiful-view-nature-green-leaves-blurred-greenery-tree-background_50039-489.jpg);background-image: linear-gradient(65deg, #d9ff75, white);background-repeat:no-repeat;background-size:cover;/* filter: contrast(0.5); */">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h2 class="section_title">our indonesia holiday packages</h2>
					</div>
				</div>
				<div class="row offers_items">

					<!-- Offers Item -->
					<div class="col-lg-6 offers_col">
						<div class="offers_item">
							<div class="row">
								<div class="col-lg-6">
									<div class="offers_image_container">
										<!-- Image by https://unsplash.com/@kensuarez -->
										<div class="offers_image_background" style="background-image:url(images/tour43-0-Kecak-Uluwatu-Bali.jpg)"></div>
										<!--<div class="offer_name"><a href="#"></a>grand castle</a></div>-->
									</div>
								</div>
								<div class="col-lg-6">
									<div class="offers_content">
										<div class="offers_price">12 Days The Essential of Bali</div>
										<!--<div class="rating_r rating_r_4 offers_rating">
										<i></i>
										<i></i>
										<i></i>
										<i></i>
										<i></i>
									</div>-->
										<p class="offers_text">Suspendisse potenti. In faucibus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor.</p>
										<!--<div class="offers_icons">
										<ul class="offers_icons_list">
											<li class="offers_icons_item"><img src="images/post.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/sailboat.png" alt=""></li>
										</ul>
									</div>-->
										<div class="offers_link"><a href="single_listing.html">read more</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Offers Item -->
					<div class="col-lg-6 offers_col">
						<div class="offers_item">
							<div class="row">
								<div class="col-lg-6">
									<div class="offers_image_container">
										<!-- Image by Egzon Bytyqi -->
										<div class="offers_image_background" style="background-image:url(images/tour47-0-Toraja-House-Sulawesi.jpeg)"></div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="offers_content">
										<div class="offers_price">04 Days Explore Highlighs of Toraja</div>
										<p class="offers_text">Suspendisse potenti. In faucibus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor.</p>
										<div class="offers_link"><a href="single_listing.html">read more</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Offers Item -->
					<div class="col-lg-6 offers_col">
						<div class="offers_item">
							<div class="row">
								<div class="col-lg-6">
									<div class="offers_image_container">
										<!-- Image by https://unsplash.com/@nevenkrcmarek -->
										<div class="offers_image_background" style="background-image:url(images/tour46-0-Komodo.jpg)"></div>

									</div>
								</div>
								<div class="col-lg-6">
									<div class="offers_content">
										<div class="offers_price">06 Days Flores Overland Tour</div>

										<p class="offers_text">Suspendisse potenti. In faucibus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor.</p>

										<div class="offers_link"><a href="single_listing.html">read more</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Offers Item -->
					<div class="col-lg-6 offers_col">
						<div class="offers_item">
							<div class="row">
								<div class="col-lg-6">
									<div class="offers_image_container">
										<!-- Image by https://unsplash.com/@mantashesthaven -->
										<div class="offers_image_background" style="background-image:url(images/kogery.jpeg)"></div>

									</div>
								</div>
								<div class="col-lg-6">
									<div class="offers_content">
										<div class="offers_price">03 Days Adventure Komodo Dragon</div>

										<p class="offers_text">Suspendisse potenti. In faucibus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor.</p>

										<div class="offers_link"><a href="single_listing.html">read more</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Testimonials -->


		<!--
	<div class="trending">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2 class="section_title">trending now</h2>
				</div>
			</div>
			<div class="row trending_container">

				
				<div class="col-lg-3 col-sm-6">
					<div class="trending_item clearfix">
						<div class="trending_image"><img src="images/trend_1.png" alt="https://unsplash.com/@fransaraco"></div>
						<div class="trending_content">
							<div class="trending_title"><a href="#">grand hotel</a></div>
							<div class="trending_price">From $182</div>
							<div class="trending_location">madrid, spain</div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-sm-6">
					<div class="trending_item clearfix">
						<div class="trending_image"><img src="images/trend_2.png" alt="https://unsplash.com/@grovemade"></div>
						<div class="trending_content">
							<div class="trending_title"><a href="#">mars hotel</a></div>
							<div class="trending_price">From $182</div>
							<div class="trending_location">madrid, spain</div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-sm-6">
					<div class="trending_item clearfix">
						<div class="trending_image"><img src="images/trend_3.png" alt="https://unsplash.com/@jbriscoe"></div>
						<div class="trending_content">
							<div class="trending_title"><a href="#">queen hotel</a></div>
							<div class="trending_price">From $182</div>
							<div class="trending_location">madrid, spain</div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-sm-6">
					<div class="trending_item clearfix">
						<div class="trending_image"><img src="images/trend_4.png" alt="https://unsplash.com/@oowgnuj"></div>
						<div class="trending_content">
							<div class="trending_title"><a href="#">mars hotel</a></div>
							<div class="trending_price">From $182</div>
							<div class="trending_location">madrid, spain</div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-sm-6">
					<div class="trending_item clearfix">
						<div class="trending_image"><img src="images/trend_5.png" alt="https://unsplash.com/@mindaugas"></div>
						<div class="trending_content">
							<div class="trending_title"><a href="#">grand hotel</a></div>
							<div class="trending_price">From $182</div>
							<div class="trending_location">madrid, spain</div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-sm-6">
					<div class="trending_item clearfix">
						<div class="trending_image"><img src="images/trend_6.png" alt="https://unsplash.com/@itsnwa"></div>
						<div class="trending_content">
							<div class="trending_title"><a href="#">mars hotel</a></div>
							<div class="trending_price">From $182</div>
							<div class="trending_location">madrid, spain</div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-sm-6">
					<div class="trending_item clearfix">
						<div class="trending_image"><img src="images/trend_7.png" alt="https://unsplash.com/@rktkn"></div>
						<div class="trending_content">
							<div class="trending_title"><a href="#">queen hotel</a></div>
							<div class="trending_price">From $182</div>
							<div class="trending_location">madrid, spain</div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-sm-6">
					<div class="trending_item clearfix">
						<div class="trending_image"><img src="images/trend_8.png" alt="https://unsplash.com/@thoughtcatalog"></div>
						<div class="trending_content">
							<div class="trending_title"><a href="#">mars hotel</a></div>
							<div class="trending_price">From $182</div>
							<div class="trending_location">madrid, spain</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	-->
		<!-- <div class="contact">
			<div class="contact_background" style="background-image:url(images/contact.png)"></div>

			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						<div class="contact_image">

						</div>
					</div>
					<div class="col-lg-7">
						<div class="contact_form_container">
							<div class="contact_title">contact us</div>
							<form action="#" id="contact_form" class="contact_form">
								<input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Name" required="required" data-error="Name is required.">
								<input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="E-mail" required="required" data-error="Email is required.">
								<input type="text" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Subject" required="required" data-error="Subject is required.">
								<textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
								<button type="submit" id="form_submit_button" class="form_submit_button button">send message<span></span><span></span><span></span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<!-- Footer -->

		<div class="container" style="margin-top: 100px;">
			<div class="col text-center">
				<h2 class="section_title">news & events</h2>
			</div>
			<div class="col-md-12 col-sm-12">
				<div class="blog-wrapper">
					<div class="row">
						<?php
						$query_mysql = mysqli_query($koneksi, "SELECT * FROM news ORDER BY id DESC LIMIT 4") or die(mysqli_error());
						while ($data = mysqli_fetch_array($query_mysql)) {
							$id = $data['id'];
							$nama = $data['nama'];
							$deskripsi = $data['deskripsi'];
							$gambar = $data['gambar'];
						?>
							<div class="col-sm-3 col-xs-12">
								<div class="blog-item">
									<div class="blog-image" style="background-color:white">
										<img src="<?= $gambar ?>" alt="Image" style="width:240px; height:120px;object-fit: contain;background-color:white">
									</div>
									<div class="blog-content" style="height:250px">
										<h5>
											<a href="news-detail?id=<?= $id ?>"><?php echo limit_words(strip_tags(trim($deskripsi)), 20) . "..."; ?></p>
												<div class="blog-date">
													<p>Click for Detail</p>
												</div>
										</h5>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>



		<div class="container" style="margin-top: -50px;">
			<div class="col text-center">
				<h2 class="section_title">our partners</h2>
			</div>
			<div class="row">
				<?php
				$query_mysql = mysqli_query($koneksi, "SELECT * FROM partner") or die(mysqli_error());
				while ($data = mysqli_fetch_array($query_mysql)) {
					$idPartner = $data['id'];
					$namaPartner = $data['nama'];
					$link = $data['link'];
					$gambarPartner = $data['gambar'];
				?>
					<!--<a href="<?= $link ?>">-->
					<a target="_blank" href="http://<?= $link ?>">
						<div class="col-md-3" style="margin-bottom:10px;">
							<img src="<?php echo $gambarPartner ?>" alt="Image" style="width:240px; height:120px;object-fit:contain;">
						</div>
					</a>
				<?php } ?>
			</div>
		</div>


		<!-- Copyright -->

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 order-lg-1 order-2  ">
						<div class="copyright_content d-flex flex-row align-items-center">
							<div style="color:white">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | Tour travel by by <a href="https://sistempintar.com" target="_blank" style="color:white;">Sistem Pintar</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
						</div>
					</div>
					<!--<div class="col-lg-9 order-lg-2 order-1">
					<div class="footer_nav_container d-flex flex-row align-items-center justify-content-lg-end">
						<div class="footer_nav">
							<ul class="footer_nav_list">
								<li class="footer_nav_item"><a href="index.html">home</a></li>
								<li class="footer_nav_item"><a href="#">about us</a></li>
								<li class="footer_nav_item"><a href="offers.html">offers</a></li>
								<li class="footer_nav_item"><a href="blog.html">news</a></li>
								<li class="footer_nav_item"><a href="contact.html">contact</a></li>
							</ul>
						</div>
					</div>
				</div>-->
				</div>
			</div>
		</div>

	</div>

</body>

</html>