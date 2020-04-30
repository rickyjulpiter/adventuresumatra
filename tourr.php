<?php include 'koneksi.php';

// $namaTour = $_GET['tourName'];

if (isset($_GET['tourName'])) {
    $namaTour = $_GET['tourName'];
} else if (isset($_GET['tourID'])) {
    $idTour = $_GET['tourID'];
}
//echo($namaTour);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Listing</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/single_listing_styles.css">
<link rel="stylesheet" type="text/css" href="styles/single_listing_responsive.css">
</head>

<body>
<?php
    $queryTour = mysqli_query($koneksi, "SELECT * FROM paket_wisata WHERE id = '$idTour '") or die(mysqli_error());
    $detail = mysqli_fetch_assoc($queryTour);
    $idTourPackages = $detail['id'];
    $nama_tour = $detail['nama'];
    $deskripsi_tour = $detail['deskripsi'];
    $peta_tour = $detail['peta'];
    $timeline_tour = $detail['timeline'];

    $queryBreadCumb = mysqli_query($koneksi, "SELECT gambar FROM paket_wisata_gambar WHERE paket_wisata_id = '$idTour' LIMIT 1") or die(mysqli_error());
    $tampilGambar = mysqli_fetch_assoc($queryBreadCumb);
    $gambarBreadCumb = $tampilGambar['gambar'];
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

		<nav class="main_nav" style="background: rgba(38, 166, 91, 0.8);">
			<div class="container">
				<div class="row">
					<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="images/logo2.png" alt=""></a></div>
						</div>
						<div class="main_nav_container ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="index.php">home</a></li>
								<li class="main_nav_item"><a href="about.html">about us</a></li>
								<li class="main_nav_item"><a href="destination-area-detaill?destination=Medan">destination</a></li>
								<li class="main_nav_item"><a href="tourr?tourID=2">tour packages</a></li>
								<!--<li class="main_nav_item"><a href="blog.html">news</a></li>-->
								<li class="main_nav_item"><a href="contact.php">contact</a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>	
		</nav>

	</header>

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
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
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= $gambarBreadCumb; ?>"></div>
		<div class="home_content">
			<div class="home_title1"><?php echo ($nama_tour); ?></div>
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
								<img src="<?= $gambarBreadCumb; ?>" alt="">
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
										<?php
	                                    $i = 0;
	                                    $query_mysql = mysqli_query($koneksi, "SELECT gambar FROM paket_wisata_gambar WHERE paket_wisata_id = '$idTourPackages' ") or die(mysqli_error());
	                                    while ($data = mysqli_fetch_array($query_mysql)) {
	                                        $gambar = $data['gambar'];
	                                        ?>
	                                        <div class="owl-item">
												<a id="climg" class="colorbox cboxElement" href="<?= $gambar ?>"height="500px">
													<img src="<?= $gambar ?>" alt="in_th_030_01">
												</a>
											</div>
	                                        <!-- End of Slide -->
	                                    <?php $i++;
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
										<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='hotel_grad_prev'>
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
									
									<!-- Hotel Slider Nav - Next -->
									<div class="hotel_slider_nav hotel_slider_next">
										<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='hotel_grad_next'>
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
								<li class="nav-item">
								<a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Map</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Intienary</a>
								</li>
							</ul>
  
							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<div class="hotel_info_text">
									<p><?php echo $deskripsi_tour; ?></p>
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
													<?php echo $peta_tour ?>
												</div>
											</div>
										</div>
			
									</div>
								</div>
								<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
									<div class="hotel_info_text">
										
											<?php echo $timeline_tour; ?></div>
										
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
				<div class="col-lg-3 order-lg-1 order-2  ">
					<div class="copyright_content d-flex flex-row align-items-center">
						<div><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Tour travel by by <a href="https://sistempintar.com" target="_blank">Sistem Pintar</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
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