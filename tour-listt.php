<?php include 'koneksi.php';

function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
$namaList = $_GET['name'];
$query_mysql = mysqli_query($koneksi, "SELECT * FROM destinasi WHERE nama = '$namaList'") or die(mysqli_error());
$data = mysqli_fetch_assoc($query_mysql);
$idList = $data['id'];
// echo $idList;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Offers</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/offers_styles.css">
<link rel="stylesheet" type="text/css" href="styles/single_listing_styles.css">
<link rel="stylesheet" type="text/css" href="styles/offers_responsive.css">
</head>

<body>
	<!-- Breadcrumb -->
    <?php
    $query = "SELECT gambar FROM destinasi_gambar WHERE destinasi_id = '$idList'";
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

		<nav class="main_nav" style="background: rgba(110, 177, 12, 0.8);">
			<div class="container">
				<div class="row">
					<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="images/logo2.png" alt=""></a></div>
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
				<li class="menu_item"><a href="#">offers</a></li>
				<li class="menu_item"><a href="blog.html">news</a></li>
				<li class="menu_item"><a href="contact.html">contact</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= $gambarBreadCumb; ?>"></div> 
		<div class="home_content">
			<div class="home_title"><?php echo ($namaList); ?></div>
		</div>
	</div>

	<!-- Offers -->

	<div class="offers">

		<!-- Search -->


		<!-- Offers -->

		<div class="container">
			<div class="row">
				<div class="col-lg-1 temp_col"></div>
				<div class="col-lg-11">
					
				</div>

				<div class="col-lg-12">
					<!-- Offers Grid -->

					<div class="offers_grid">

						<!-- Offers Item -->
						<?php
                        $query_area_destinasi = mysqli_query($koneksi, "SELECT DISTINCT(pw.nama),pw.id,pw.deskripsi,pwg.gambar FROM paket_wisata_detail AS pwd
                                                            INNER JOIN paket_wisata as pw ON pwd.paket_wisata_id = pw.id 
                                                            INNER JOIN destinasi_area AS da ON pwd.destinasi_area_id = da.id_area 
                                                            INNER JOIN paket_wisata_gambar AS pwg ON pwg.paket_wisata_id = pw.id
                                                            WHERE da.destinasi_id = '$idList' GROUP BY pw.nama ORDER BY da.prioritas") or die(mysqli_error());
                        while ($area = mysqli_fetch_array($query_area_destinasi)) {
                            $namaPaket = $area['nama'];
                            $deskripsiPaket = $area['deskripsi'];
                            $gambarPaket = $area['gambar'];
                        ?>

						<div class="offers_item rating_4">
							<div class="row">
								<div class="col-lg-1 temp_col"></div>
								<div class="col-lg-3 col-1680-4">
									<div class="offers_image_container">
										<!-- Image by https://unsplash.com/@kensuarez -->
										<div class="offers_image_background" style="background-image:url(<?= $gambarPaket; ?>)"></div>
										<div class="offer_name"><a href="tourr?tourID=<?php echo $area['id']; ?>"><?php echo trim($namaPaket) ?></a></div>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="offers_content">
										<p class="offers_text"><?php echo limit_words(strip_tags(trim($deskripsiPaket)), 20) . "..."; ?></p>
										<div class="button book_button"><a href="tourr?tourID=<?php echo $area['id']; ?>">detail<span></span><span></span><span></span></a></div>
									</div>
								</div>
							</div>
						</div>  <?php } ?>

						<!-- Offers Item 

						<div class="offers_item rating_3">
							<div class="row">
								<div class="col-lg-1 temp_col"></div>
								<div class="col-lg-3 col-1680-4">
									<div class="offers_image_container">
										<!-- Image by https://unsplash.com/@thoughtcatalog 
										<div class="offers_image_background" style="background-image:url(images/offer_5.jpg)"></div>
										<div class="offer_name"><a href="single_listing.html">eurostar hotel</a></div>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="offers_content">
										<div class="offers_price">$50<span>per night</span></div>
										<div class="rating_r rating_r_3 offers_rating" data-rating="3">
											<i></i>
											<i></i>
											<i></i>
											<i></i>
											<i></i>
										</div>
										<p class="offers_text">Suspendisse potenti. In faucibus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Lorem ipsum dolor sit amet.</p>
										<div class="offers_icons">
											<ul class="offers_icons_list">
												<li class="offers_icons_item"><img src="images/post.png" alt=""></li>
												<li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
												<li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>
												<li class="offers_icons_item"><img src="images/sailboat.png" alt=""></li>
											</ul>
										</div>
										<div class="button book_button"><a href="#">book<span></span><span></span><span></span></a></div>
										<div class="offer_reviews">
											<div class="offer_reviews_content">
												<div class="offer_reviews_title">very good</div>
												<div class="offer_reviews_subtitle">100 reviews</div>
											</div>
											<div class="offer_reviews_rating text-center">8.1</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
x

					</div>
				</div>

			</div>
		</div>		
	</div>

	<!-- Footer -->


</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/offers_custom.js"></script>

</body>

</html>