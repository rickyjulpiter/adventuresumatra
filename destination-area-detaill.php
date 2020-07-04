<?php include 'koneksi.php';

$namaWisata = $_GET['destination'];

?>
<?php
$queryTentang = mysqli_query($koneksi, "SELECT * FROM tentang WHERE id = 1") or die(mysqli_error());
$tentang = mysqli_fetch_assoc($queryTentang);
$whatsapp = $tentang['whatsapp'];
$namaTentang = $tentang['nama'];
$logoTentang = $tentang['logo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $namaTentang ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Adventure Sumatra">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/single_listing_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/single_listing_responsive.css">
</head>

<body>

	<?php
	$query_sql = "SELECT * FROM destinasi_area WHERE nama_area = '$namaWisata'";
	$queryDetailDestinasi = mysqli_query($koneksi, $query_sql) or die(mysqli_error());
	$data = mysqli_fetch_assoc($queryDetailDestinasi);
	$idDestinasi = $data['id_area'];
	$namaDestinasi = $data['nama_area'];
	$deskripsi_singkatDestinasi = $data['deskripsi_area_singkat'];
	$deskripsiDestinasi = $data['deskripsi_area'];
	$gambar = $data['gambar_area'];

	$query = "SELECT gambar FROM destinasi_area_gambar WHERE destinasi_area_id = '$idDestinasi'";
	$query_mysql = mysqli_query($koneksi, $query) or die(mysqli_error());
	$data = mysqli_fetch_assoc($query_mysql);
	$gambarBreadCumb = $data['gambar'];
	?>

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
								<div class="logo"><a href="index.php"><img src="<?php echo $logoTentang; ?>" alt="" style="max-width: 263px;"></a></div>
							</div>
							<div class="main_nav_container ml-auto">
								<ul class="main_nav_list" id="Mennu">
									<li class="main_nav_item"><a href="index.php">home</a></li>
									<li class="main_nav_item"><a href="about.php">about us</a></li>
									<li class="main_nav_item">
										<a href="destination-area-detaill?destination=Medan" style="font-size: 12px;">Destination <i class="fa fa-angle-down"></i></a>
										<ul>
											<?php
											$query_destinasii = mysqli_query($koneksi, "SELECT * FROM destinasi ORDER BY prioritas ASC") or die(mysqli_error());
											while ($data = mysqli_fetch_array($query_destinasii)) {
												$idDestinasii = $data['id'];
												$namaDestinasii = $data['nama'];
											?>
												<li>
													<a href="destination-detaill?destination=<?php echo $namaDestinasii; ?>"><?php echo $namaDestinasii; ?> <i class="arrow-indicator fa fa-angle-right"></i></a>
													<ul>
														<?php
														$query_area_destinasii = mysqli_query($koneksi, "SELECT * FROM destinasi_area WHERE destinasi_id = '$idDestinasii' ORDER BY prioritas ASC") or die(mysqli_error());
														while ($area = mysqli_fetch_array($query_area_destinasii)) {
															$namaDestinasiAreaa = $area['nama_area'];
														?>
															<li><a href="destination-area-detaill?destination=<?php echo $namaDestinasiAreaa; ?>"><?php echo $namaDestinasiAreaa; ?></a></li>
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
											$query_destinasii = mysqli_query($koneksi, "SELECT * FROM destinasi ORDER BY prioritas ASC LIMIT 6") or die(mysqli_error());
											while ($data = mysqli_fetch_array($query_destinasii)) {
												$idDestinasii = $data['id'];
												$namaDestinasii = $data['nama'];
											?>
												<li>
													<a href="tour-listt?name=<?= $namaDestinasii ?>"><?= $namaDestinasii ?></a>
												</li>
											<?php } ?>
										</ul>
									</li>
									<!--<li class="main_nav_item"><a href="blog.html">news</a></li> -->
									<li class="main_nav_item"><a href="contact.php">contact</a></li>
									<li class="main_nav_item"><a href="request.php">tailor-made tour</a></li>
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
					<li class="menu_item"><a href="index.html">home</a></li>
					<li class="menu_item"><a href="about.html">about us</a></li>
					<li class="menu_item"><a href="offers.html">offers</a></li>
					<li class="menu_item"><a href="blog.html">news</a></li>
					<li class="menu_item"><a href="contact.html">contact</a></li>
				</ul>
			</div>
		</div>

		<!-- Home -->

		<div class="home">
			<div class="home_background parallax-window" data-parallax="scroll" style="background-image:url(<?= $gambarBreadCumb ?>)"></div>
			<div class="home_content">
				<div class="home_title"><?php echo $namaDestinasi; ?></div>
			</div>
		</div>

		<!-- Offers -->

		<div class="listing">



			<!-- Single Listing -->

			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="single_listing">

							<!-- Hotel Info -->

							<div class="hotel_info">

								<!-- Title
							<div class="hotel_title_container d-flex flex-lg-row flex-column">
								<div class="hotel_title_content">
									<h1 class="hotel_title">Grand Hotel Eurostar</h1>
									<div class="rating_r rating_r_4 hotel_rating">
										<i></i>
										<i></i>
										<i></i>
										<i></i>
										<i></i>
									</div>
									<div class="hotel_location">345 677 Gran Via Street, no 34, Madrid, Spain</div>
								</div>
								<div class="hotel_title_button ml-lg-auto text-lg-right">
									<div class="button book_button trans_200"><a href="#">book<span></span><span></span><span></span></a></div>
									<div class="hotel_map_link_container">
										<div class="hotel_map_link">See Location on Map</div>
									</div>
								</div>
							</div>

							Listing Image -->

								<div class="hotel_image">
									<img src="<?= $gambarBreadCumb ?>" alt="">
									<!--<div class="hotel_review_container d-flex flex-column align-items-center justify-content-center">
									<div class="hotel_review">
										<div class="hotel_review_content">
											<div class="hotel_review_title">very good</div>
											<div class="hotel_review_subtitle">100 reviews</div>
										</div>
										<div class="hotel_review_rating text-center">8.1</div>
									</div>
								</div>-->
								</div>

								<!-- Hotel Gallery -->

								<div class="hotel_gallery">
									<div class="hotel_slider_container">
										<div class="owl-carousel owl-theme hotel_slider">

											<!-- Hotel Gallery Slider Item -->

											<!-- First Slide -->
											<?php
											$query_mysql = mysqli_query($koneksi, "SELECT dag.gambar FROM destinasi_area_gambar AS dag INNER JOIN destinasi_area AS da ON dag.destinasi_area_id = da.id_area WHERE da.nama_area = '$namaWisata' ") or die(mysqli_error());
											$num_rows = mysqli_num_rows($query_mysql);
											$counter = 0;
											while ($data = mysqli_fetch_array($query_mysql)) {
												$gambar = $data['gambar'];
											?>
												<!--
                                        <div class="item <?php if ($i == 0) echo "active" ?>">
                                            <!-- Slide Background 
                                            <img src="<?= $gambar ?>" alt="in_th_030_01" />
                                        </div> -->

												<div class="owl-item">
													<a class="colorbox cboxElement" href="<?= $gambar ?>">
														<img src="<?= $gambar ?>" alt="in_th_030_01">
													</a>
												</div>


												<!-- End of Slide -->
											<?php
											} ?>


											<!-- Hotel Gallery Slider Item 
										<div class="owl-item">
											<a class="colorbox cboxElement" href="images/listing_5.jpg">
												<img src="images/listing_thumb_5.jpg" alt="https://unsplash.com/@workweek">
											</a>
										</div>

										
										<div class="owl-item">
											<a class="colorbox cboxElement" href="images/listing_6.jpg">
												<img src="images/listing_thumb_6.jpg" alt="https://unsplash.com/@avidenov">
											</a>
										</div>

										
										<div class="owl-item">
											<a class="colorbox cboxElement" href="images/listing_7.jpg">
												<img src="images/listing_thumb_7.jpg" alt="https://unsplash.com/@pietruszka">
											</a>
										</div>

										
										<div class="owl-item">
											<a class="colorbox cboxElement" href="images/listing_8.jpg">
												<img src="images/listing_thumb_8.jpg" alt="https://unsplash.com/@rktkn">
											</a>
										</div>

										
										<div class="owl-item">
											<a class="colorbox cboxElement" href="images/listing_9.jpg">
												<img src="images/listing_thumb_9.jpg" alt="https://unsplash.com/@mindaugas">
											</a>
										</div>-->
										</div>

										<!-- Hotel Slider Nav - Prev -->
										<div class="hotel_slider_nav hotel_slider_prev">
											<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
												<defs>
													<linearGradient id='hotel_grad_prev'>
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

										<!-- Hotel Slider Nav - Next -->
										<div class="hotel_slider_nav hotel_slider_next">
											<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
												<defs>
													<linearGradient id='hotel_grad_next'>
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

									</div>
								</div>

								<br>
								<br>

								<!-- Tabs 2 -->

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
									</li>
									<!--<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reviews</a>
								</li>-->
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="hotel_info_text">
											<p><?php echo ($deskripsiDestinasi); ?></p>
										</div>
									</div>
									<!--
								<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<div class="reviews">
										<div class="reviews_title">reviews</div>
										<div class="reviews_container">
			
											<!-- Review 
											<div class="review">
												<div class="row">
													<div class="col-lg-1">
														<div class="review_image">
															<img src="images/review_1.jpg" alt="https://unsplash.com/@saaout">
														</div>
													</div>
													<div class="col-lg-11">
														<div class="review_content">
															<div class="review_title_container">
																<div class="review_title">"We loved the services"</div>
																<div class="review_rating">9.5</div>
															</div>
															<div class="review_text">
																<p>Tetur adipiscing elit. Nullam eu convallis tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vulputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer elementum orci eu vehicula pretium. Donec bibendum tristique condimentum.</p>
															</div>
															<div class="review_name">Christinne Smith</div>
															<div class="review_date">12 November 2017</div>
														</div>
													</div>
												</div>
											</div>
			
											<!-- Review 
											<div class="review">
												<div class="row">
													<div class="col-lg-1">
														<div class="review_image">
															<img src="images/review_2.jpg" alt="Image by Andrew Robles">
														</div>
													</div>
													<div class="col-lg-11">
														<div class="review_content">
															<div class="review_title_container">
																<div class="review_title">"Nice staff and great location"</div>
																<div class="review_rating">9.5</div>
															</div>
															<div class="review_text">
																<p>Tetur adipiscing elit. Nullam eu convallis tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vulputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer elementum orci eu vehicula pretium. Donec bibendum tristique condimentum.</p>
															</div>
															<div class="review_name">Christinne Smith</div>
															<div class="review_date">12 November 2017</div>
														</div>
													</div>
												</div>
											</div>
			
										</div>
									</div>
								</div> -->
									<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
										<div class="location_on_map">
											<div class="location_on_map_title">location on map</div>

											<!-- Google Map -->

											<div class="travelix_map">
												<div id="google_map" class="google_map">
													<div class="map_container" align="center">
														<iframe src="https://www.google.com/maps/embed?pb=!1m64!1m12!1m3!1d505205.5458021163!2d115.0101294760185!3d-8.409682413175135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m49!3e0!4m5!1s0x2dd2441650216933%3A0xdf71da6ddd7bcc1f!2sNgurah%20Rai%20International%20Airport%20(DPS)%2C%20Jalan%20Raya%20Gusti%20Ngurah%20Rai%2C%20Tuban%2C%20Badung%20Regency%2C%20Bali!3m2!1d-8.746717199999999!2d115.166787!4m5!1s0x2dd23d6a8d1ac1cd%3A0x89468df6e4c9d611!2sUbud%20Centre%2C%20Jalan%20Suweta%2C%20Ubud%2C%20Gianyar%2C%20Bali!3m2!1d-8.5064817!2d115.2624187!4m5!1s0x2dd1f45d6c8fe87d%3A0x448d1ad48814ee43!2sBatur%20Mountain%20View%2C%20South%20Batur%2C%20Bangli%20Regency%2C%20Bali!3m2!1d-8.2594514!2d115.3411172!4m5!1s0x2dd21e398e4623fd%3A0x3030bfbca7cbef0!2sBangli%2C%20Bali!3m2!1d-8.2975884!2d115.3548713!4m5!1s0x2dd2092cb3cd7f25%3A0x871e3813fed35ad5!2sCandidasa%20Beach%2C%20Bali!3m2!1d-8.5099736!2d115.5685065!4m5!1s0x2dd19b40a35dbf07%3A0x7500ee0f7e30527c!2sLovina%20Beach%2C%20Bali!3m2!1d-8.161140999999999!2d115.02435659999999!4m5!1s0x2dd186110077a85f%3A0x5030bfbca830680!2sMunduk%2C%20Buleleng%20Regency%2C%20Bali!3m2!1d-8.2666267!2d115.054678!4m5!1s0x2dd2471c804bfd05%3A0xdcc2b5ae63dc9082!2sSeminyak%20Beach%2C%20Bali!3m2!1d-8.691193!2d115.157141!5e0!3m2!1sen!2sid!4v1577716885569!5m2!1sen!2sid" width="900" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
										<div class="hotel_info_text">

											lorem ipsum

										</div>
									</div>
								</div>

								<!-- Hotel Info Text 

							<div class="hotel_info_text">
								<p>Enjoy a relax pace while discovering the essentials of Bali! During this trip you will visit the must see of Bali such as the UNESCO well-known Jatiluwih rice terraces, the magnificent sunrise from Mount Batur’s view, explore an unspoiled green village in the heart of the island. Keep in mind that if you have your own bucket list and that there is special places you wish to visit, our team can always adapt and customize your trip.</p>
							</div> 
						-	->

							<!-- Hotel Info Tags 

							<div class="hotel_info_tags">
								<ul class="hotel_icons_list">
									<li class="hotel_icons_item"><img src="images/post.png" alt=""></li>
									<li class="hotel_icons_item"><img src="images/compass.png" alt=""></li>
									<li class="hotel_icons_item"><img src="images/bicycle.png" alt=""></li>
									<li class="hotel_icons_item"><img src="images/sailboat.png" alt=""></li>
								</ul>
							</div> -->

							</div>



							<!-- Reviews -->


							<!-- Location on Map -->


						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->



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

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="styles/bootstrap4/bootstrap-tab.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="js/single_listing_custom.js"></script>

</body>

</html>