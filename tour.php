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
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<?php include 'template/head.php' ?>

<body>

    <!-- Preloader -->
    <?php include 'template/preloader.php' ?>
    <!-- Preloader Ends -->

    <!-- Header -->
    <?php include 'template/header.php' ?>
    <!-- Header Ends -->

    <!-- Navigation Bar -->
    <?php include 'template/nav.php' ?>
    <!-- Navigation Bar Ends -->
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
    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center" style="padding-top: 50px; background: url('<?= $gambarBreadCumb; ?>') no-repeat;background-size: cover;">
        <div class="container">
            <div class="breadcrumb-content">
                <h2><?php echo ($nama_tour); ?></h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tour Packages</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->
    <section class="main-content-detail" style="background: url(3040791.jpg) no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div id="content" class="col-md-8">
                    <div class="detail-content content-wrapper">
                        <div class="gallery detail-box">
                            <!-- Paradise Slider -->
                            <div id="in_th_030" class="carousel slide in_th_brdr_img_030 thumb_scroll_x swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="4000" data-duration="2000">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <!-- 1st Indicator -->
                                    <?php
                                    $i = 0;
                                    $query_mysql = mysqli_query($koneksi, "SELECT gambar FROM paket_wisata_gambar WHERE paket_wisata_id = '$idTourPackages' ") or die(mysqli_error());
                                    while ($data = mysqli_fetch_array($query_mysql)) {
                                        $gambar = $data['gambar'];
                                        ?>
                                        <li data-target="#in_th_030" data-slide-to="<?= $i ?>" class="<?php if ($i == 0) echo 'active' ?>">
                                            <!-- 1st Indicator Image -->
                                            <img src="<?= $gambar ?>" alt="in_th_030_01_sm" />
                                        </li>
                                        <!-- 2nd Indicator -->
                                    <?php $i++;
                                    } ?>
                                </ol> <!-- /Indicators -->
                                <!-- Wrapper For Slides -->
                                <div class="carousel-inner" role="listbox">
                                    <!-- First Slide -->
                                    <?php
                                    $i = 0;
                                    $query_mysql = mysqli_query($koneksi, "SELECT gambar FROM paket_wisata_gambar WHERE paket_wisata_id = '$idTourPackages' ") or die(mysqli_error());
                                    while ($data = mysqli_fetch_array($query_mysql)) {
                                        $gambar = $data['gambar'];
                                        ?>
                                        <div class="item <?php if ($i == 0) echo "active" ?>">
                                            <!-- Slide Background -->
                                            <img src="<?= $gambar ?>" alt="in_th_030_01" />
                                        </div>

                                        <!-- End of Slide -->
                                    <?php $i++;
                                    } ?>
                                </div> <!-- End of Wrapper For Slides -->
                            </div> <!-- End Paradise Slider -->
                        </div>
                        <div class="description detail-box">
                            <div class="detail-title">
                                <h3>Description</h3>
                            </div>
                            <?php echo $deskripsi_tour; ?>

                        </div>
                        <div class="location-map detail-box">
                            <div class="detail-title">
                                <h3>Location Map</h3>
                            </div>
                            <div class="map-frame">
                                <?php echo $peta_tour ?>
                            </div>
                        </div>
                        <div class="detail-timeline detail-box">
                            <div class="detail-title">
                                <h3>Tour Itinerary</h3>
                            </div>
                            <div class="timeline-content">
                                <?php echo $timeline_tour; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sidebar-sticky" class="col-md-4">
                    <aside class="detail-sidebar sidebar-wrapper">
                        <div class="sidebar-item">
                            <div class="detail-title">
                                <h3>Popular Tour Packages</h3>
                            </div>
                            <div class="sidebar-content sidebar-slider">
                                <?php
                                $query_mysql = mysqli_query($koneksi, "SELECT * FROM (SELECT DISTINCT(pw.id),pw.nama AS nama,pw.deskripsi AS deskripsi,pwg.gambar FROM paket_wisata AS pw INNER JOIN paket_wisata_gambar AS pwg ON pw.id = pwg.paket_wisata_id) AS tabel GROUP BY id") or die(mysqli_error());
                                while ($data = mysqli_fetch_array($query_mysql)) {
                                    //$id = $data['id'];
                                    $namaTour = $data['nama'];
                                    $deskripsiTour = $data['deskripsi'];
                                    $gambarTour = $data['gambar'];
                                    ?>
                                    <div class="sidebar-package">
                                        <div class="sidebar-package-image">
                                            <img src="<?php echo $gambarTour; ?>" alt="Images" style="height:200px;">
                                        </div>
                                        <div class="destination-content sidebar-package-content">
                                            <h4><a href="tour?tourName=<?php echo $namaTour; ?>"><?php echo $namaTour; ?></a></h4>
                                            <a href="tour?tourID=<?php echo $data['id']; ?>" class="btn-blue btn-red">Tour Detail</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        $queryTentang = mysqli_query($koneksi, "SELECT * FROM tentang WHERE id = 1") or die(mysqli_error());
                        $tentang = mysqli_fetch_assoc($queryTentang);
                        // $namaTentang = $tentang['nama'];
                        // $deskripsiTentang = $tentang['deskripsi'];
                        $telepon = $tentang['telepon'];
                        $email = $tentang['email'];
                        $whatsapp = $tentang['whatsapp'];
                        ?>
                        <div class="sidebar-item sidebar-helpline">
                            <div class="sidebar-helpline-content">
                                <h3>Any Questions?</h3>
                                <p>If you require any further information, please call or write us to our below contact.</p>
                                <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $telepon; ?></p>
                                <p><a href="https://wa.me/<?= $whatsapp; ?>" style="color:white;"><i class="fa fa-whatsapp" aria-hidden="true"></i> <?php echo $whatsapp; ?></a></p>
                                <p><a href="mailto:<?= $email ?>" style="color:white;"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $email; ?></a></p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'template/footer.php' ?>
    <!-- Footer Ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- *Scripts* -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main-1.js"></script>
    <script src="js/preloader.js"></script>
</body>

</html>