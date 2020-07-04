<?php include 'koneksi.php'; 
$queryTentang = mysqli_query($koneksi, "SELECT * FROM tentang WHERE id = 1") or die(mysqli_error());
$tentang = mysqli_fetch_assoc($queryTentang);
$namaTentang = $tentang['nama'];
$logo = $tentang['logo'];?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $namaTentang ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/single_listing_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>

<body>

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
							<div class="logo"><a href=""><img src="<?php echo $logo; ?>" alt="" style="max-width: 263px;"></a></div>
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
								<li class="main_nav_item"><a href="#">tailor-made tour</a></li>
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
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
			<ul>
				<li class="menu_item"><a href="index.html">home</a></li>
				<li class="menu_item"><a href="about.html">about us</a></li>
				<li class="menu_item"><a href="offers.html">offers</a></li>
				<li class="menu_item"><a href="blog.html">news</a></li>
				<li class="menu_item"><a href="#">contact</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/contact_background.jpg"></div>
		<div class="home_content">
			<div class="home_title">Tailor-Made Tour</div>
		</div>
	</div>

	<!-- Contact -->
	<br>
	 <section class="contact" style="background: url(3040791.jpg) no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="contact-form" class="contact-form">

                        <div id="contactform-error-msg"></div>

                        <form method="post" action="contact-aksi">
                            <div class="row">
                                <!--<div class="form-group col-md-12">
                                    <label>Company Name:</label>
                                    <input type="text" name="company_name" class="form-control" id="Name" placeholder="Enter company name">
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label>Full Name:</label>
                                    <input type="text" name="full_name" class="form-control" id="Name" placeholder="Enter full name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="abc@xyz.com" required>
                                </div>
                                <div class="form-group col-md-6 col-left-padding">
                                    <label>Phone Number:</label>
                                    <input type="text" name="telepon" class="form-control" id="phnumber" placeholder="XXXX-XXXXXX" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Address:</label>
                                    <input type="text" name="alamat" class="form-control" id="phnumber" placeholder="Your address" required>
                                </div>
                                <div class="form-group col-md-6 col-left-padding">
                                    <label>Whatsapp:</label>
                                    <input type="number" name="whatsapp" class="form-control" id="email" placeholder="XXXX-XXXXXX" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Subject:</label>
                                    <input type="text" name="subject" class="form-control" id="Name" placeholder="Enter subject" required>
                                </div>
                                <div class="textarea col-md-12">
                                    <label>Message:</label>
                                    <textarea name="pesan" placeholder="Enter message" required></textarea>
                                </div>
                                <?php
                                function generateRandomString($length = 10)
                                {
                                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $charactersLength = strlen($characters);
                                    $randomString = '';
                                    for ($i = 0; $i < $length; $i++) {
                                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                                    }
                                    return $randomString;
                                }
                                $captchaCode = generateRandomString(5);
                                ?>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <label style="color: white;background-color: grey;font-weight: 20px;margin-right: 20px; padding: 10px"><?php echo $captchaCode; ?></label>
                                    <input name="captcha" placeholder="Fill Captcha Here" required style="border:1px solid grey;"></input>
                                </div>
                                <div class="col-xs-12" style="margin-bottom: 40px;">
                                    <input type="hidden" name="verif" value="<?php echo ($captchaCode) ?>">
                                    <div class="comment-btn">
                                        <input type="submit" class="form_submit_button button" id="submit" value="Send Message">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<!-- About 
	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					
					<!-- About - Image 

					<div class="about_image">
						<img src="images/man.png" alt="">
					</div>

				</div>

				<div class="col-lg-4">
					
					<!-- About - Content 

					<div class="about_content">
						<div class="logo_container about_logo">
							<div class="logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
						</div>
						<p class="about_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer eleme ntum orci eu vehicula iaculis consequat nisl. Nunc et suscipit urna pretium.</p>
						<ul class="about_social_list">
							<li class="about_social_item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>

				</div>

				<div class="col-lg-3">
					
					<!-- About Info 

					<div class="about_info">
						<ul class="contact_info_list">
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="images/placeholder.svg" alt=""></div></div>
								<div class="contact_info_text">4127 Raoul Wallenber 45b-c Gibraltar</div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="images/phone-call.svg" alt=""></div></div>
								<div class="contact_info_text">2556-808-8613</div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="images/message.svg" alt=""></div></div>
								<div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">contactme@gmail.com</a></div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="images/planet-earth.svg" alt=""></div></div>
								<div class="contact_info_text"><a href="https://colorlib.com">www.colorlib.com</a></div>
							</li>
						</ul>
					</div>

				</div>

			</div>
		</div>
	</div> -->

	<!-- Google Map -->
		
	

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
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact_custom.js"></script>

</body>

</html>