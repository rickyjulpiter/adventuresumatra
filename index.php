<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Adventure Sumatra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-1" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="index.php" class="text-black h2 mb-0"><img src="images/logo.png" alt="Image" class="img-fluid"></a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active">
                  <a href="index.php">Home</a>
                </li>

                <li class="has-children">
                  <a href="#">Destinations</a>
                  <ul class="dropdown">
                                        <?php
                                        $query_destinasi = mysqli_query($koneksi, "SELECT * FROM destinasi ORDER BY prioritas ASC") or die(mysqli_error());
                                        while ($data = mysqli_fetch_array($query_destinasi)) {
                                            $idDestinasi = $data['id'];
                                            $namaDestinasi = $data['nama'];
                                        ?>
                                            <li>
                                                <a href="destination-detail?destination=<?php echo $namaDestinasi; ?>"><?php echo $namaDestinasi; ?> <i class="arrow-indicator fa fa-angle-right"></i></a>
                                                <ul style="display: none;">
                                                    <?php
                                                    $query_area_destinasi = mysqli_query($koneksi, "SELECT * FROM destinasi_area WHERE destinasi_id = '$idDestinasi' ORDER BY prioritas ASC") or die(mysqli_error());
                                                    while ($area = mysqli_fetch_array($query_area_destinasi)) {
                                                        $namaDestinasiArea = $area['nama_area'];
                                                    ?>
                                                        <li><a href="destination-area-detail?destination=<?php echo $namaDestinasiArea; ?>"><?php echo $namaDestinasiArea; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                    </ul>
                </li>
                
                <li><a href="discount.html">Tour Packages</a></li>
                <li><a href="discount.html">Photo Gallery</a></li>
                <li><a href="about.html">About</a></li>
                <!--<li><a href="blog.html">Blog</a></li>-->
                
                <li><a href="contact.html">Contact</a></li>
                <!-- <li><a href="booking.html">Book Online</a></li> -->
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3 text-black"><span class="icon-tripadvisor"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-instagram"></span></a>
                </li>
                
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>


    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover overlay" style="background-image: url(images/tour43-0-Kecak-Uluwatu-Bali.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              

              <h1 class="text-white font-weight-light">12 Days The Essential of Bali</h1>
              <p class="mb-5">Enjoy a relax pace while discovering the essentials of Bali!.</p>
              <p><a href="#" class="btn btn-primary py-3 px-5 text-white">Book Now!</a></p>

            </div>
          </div>
        </div>
      </div>  

      
      <!--<div class="site-blocks-cover overlay" style="background-image: url(images/tour47-0-Toraja-House-Sulawesi.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">4 Days Explore Higlights of Toraja</h1>
              <p class="mb-5">Toraja is a life-changing experience waiting to be explored, split into two regions Tana Toraja and Toraja Utara-32 cultural villages stand in unison.</p>
              <p><a href="#" class="btn btn-primary py-3 px-5 text-white">Book Now!</a></p>
            </div>
          </div>
        </div>
      </div>-->  

    </div>
    

    <div class="site-section">
      
      <div class="container overlap-section">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a href="#" class="unit-1 text-center">
              <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Write Down Your Experience</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a href="#" class="unit-1 text-center">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Explore The Mountains</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a href="#" class="unit-1 text-center">
              <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Safe Trip With Various Flights</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    
    </div>

    <!--
    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-airplane"></span></div>
              <div>
                <h3>Air Ticketing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-ship"></span></div>
              <div>
                <h3>Cruises</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-route"></span></div>
              <div>
                <h3>Tour Packages</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    -->




    
    <div class="site-section block-13 bg-light">
  
    <!--
    <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <h2 class="font-weight-light text-black text-center">Testimonials</h2>
          </div>
        </div>

        <div class="nonloop-block-13 owl-carousel">

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="images/img_1.jpg" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>James Martin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="images/img_2.jpg" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>Clair Augustin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="images/img_4.jpg" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>James Martin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> -->



    <div class="site-section">
      
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Tour Destination</h2>
            <p class="color-black-opacity-5">Indonesia is a very unique destination located in South east region. The country is famous throughout the world for its islands and beautiful landscapes.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="#" class="unit-1 text-center">
              <img src="images/Northern Sumatra-add-0-Ravelino Travel.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <!--<strong class="text-primary mb-2 d-block">$590</strong>-->
                <h3 class="unit-1-heading">Northern Sumatra</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="#" class="unit-1 text-center">
              <img src="images/West Sumatra-add-0-Ravelino Travel-2.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">West Sumatra</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="#" class="unit-1 text-center">
              <img src="images/South Sumatra-add-0-Ravelino Travel.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">South Sumatra</h3>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="#" class="unit-1 text-center">
              <img src="images/Java Island-add-0-4.png" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Java Island</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="#" class="unit-1 text-center">
              <img src="images/Bali n Nusa Tenggara-add-0-BALI & NUSATENGGARA.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Bali - Nusa Tenggara</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="#" class="unit-1 text-center">
              <img src="images/East Indonesia-add-0-EAST INDONESIA.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">East Indonesia</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    
    </div>

    <!-- <div class="site-section bg-light">
      
    </div> -->


    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/hero_bg_2.jpg); background-attachment: fixed;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
            <a href="https://www.youtube.com/watch?v=f59dDEk57i0" class="play-single-big mb-4 d-inline-block popup-vimeo"><span class="icon-play"></span></a>
            <h2 class="text-white font-weight-light mb-5 h1">Enjoy The Video</h2>
            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Indonesia Holiday Packages</h2>
            <p class="color-black-opacity-5">Established Since 1998, our team creates awesome tours all over Indonesia. Alongside our local partners and clients, we imagine the best experiences to live in the largest archipelago on Earth.</p>
          </div>
        </div>
            <div class="row package-slider slider-button">
                    <div class="col-sm-4">
                        <div class="package-item">
                            <div class="package-image">
                                <img src="images/05-london.jpg" alt="Image" style="height: 300px;object-fit: cover;">
                                <div class="package-price">
                                    <p>Tour Name</p>
                                </div>
                            </div>
                            <div class="package-content" style="height:640px;">
                                <!--<h3><?php //echo $namaWisata; 
                                        ?></h3>-->
                                <p>Tour Description</p>
                                <div class="package-info">
                                    <a href="" class="btn-blue btn-red">Tour Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="package-item">
                            <div class="package-image">
                                <img src="images/06-australia.jpg" alt="Image" style="height: 300px;object-fit: cover;">
                                <div class="package-price">
                                    <p>Tour Name</p>
                                </div>
                            </div>
                            <div class="package-content" style="height:640px;">
                                <!--<h3><?php //echo $namaWisata; 
                                        ?></h3>-->
                                <p>Tour Description</p>
                                <div class="package-info">
                                    <a href="" class="btn-blue btn-red">Tour Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="package-item">
                            <div class="package-image">
                                <img src="images/04-dubai.jpg" alt="Image" style="height: 300px;object-fit: cover;">
                                <div class="package-price">
                                    <p>Tour Name</p>
                                </div>
                            </div>
                            <div class="package-content" style="height:640px;">
                                <!--<h3><?php //echo $namaWisata; 
                                        ?></h3>-->
                                <p>Tour Description</p>
                                <div class="package-info">
                                    <a href="" class="btn-blue btn-red">Tour Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
      <!--<div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Services</h2>
            <p class="color-black-opacity-5">We Offer The Following Services</p>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-airplane"></span></div>
              <div>
                <h3>Air Ticketing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-ship"></span></div>
              <div>
                <h3>Cruises</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-route"></span></div>
              <div>
                <h3>Tour Packages</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-hotel"></span></div>
              <div>
                <h3>Hotel Accomodations</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-sailboat"></span></div>
              <div>
                <h3>Sea Explorations</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-ski"></span></div>
              <div>
                <h3>Ski Experiences</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>-->
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">News & Events</h2>
            <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p>
          </div>
        </div>
        <div class="row mb-3 align-items-stretch">
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="images/hero_bg_1.jpg" alt="Image" class="img-fluid">
              <h2 class="font-size-regular"><a href="#">How to Plan Your Vacation</a></h2>
              <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> Jan 18, 2019 at 2:00 pm <span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
            </div> 
          </div>
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="images/hero_bg_2.jpg" alt="Image" class="img-fluid">
              <h2 class="font-size-regular"><a href="#">How to Plan Your Vacation</a></h2>
              <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> Jan 18, 2019 at 2:00 pm <span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <a href="#" class="btn btn-outline-primary border-2 py-3 px-5">View All Blog Posts</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section border-top">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="mb-5 text-black">Want To Travel With Us?</h2>
            <p class="mb-0"><a href="booking.html" class="btn btn-primary py-3 px-5 text-white">Book Now</a></p>
          </div>
        </div>
      </div>
    </div>
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About Adventure Sumatra</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>

            
            
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Destination</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">About</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Discounts</a></li>
                </ul>
              </div>
            </div>

            

          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
           

            <div class="mb-5">
              <h3 class="footer-heading mb-2">Subscribe Newsletter</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit minima minus odio.</p>

              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                  </div>
                </div>
              </form>

            </div>

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="mb-5">
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>

            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script src="js/main-1.js"></script>
  <script src="js/plugin.js"></script>
    
  </body>
</html> 