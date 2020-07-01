<?php include 'koneksi.php';

$namaWisata = $_GET['destination'];

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">



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
    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center" style="padding-top: 50px; background: url('<?= $gambarBreadCumb ?>') no-repeat;background-size: cover;">
        <div class="container">
            <div class="breadcrumb-content">
                <h2><?php echo $namaDestinasi; ?></h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $namaDestinasi; ?></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- Detail -->
    <section class="item-content" style="background: url(3040791.jpg) no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-0">
                    <div class="item-wrapper">
                        <div class="cover-content">
                            <div class="author-detail">
                                <a href="#" class="tag tag-blue">#Destination #<?php echo $namaDestinasi; ?></a>
                            </div>
                            <h2><?php echo $deskripsi_singkatDestinasi; ?></h2>
                        </div>
                        <div class="cover-image">
                            <!-- Paradise Slider -->
                            <div id="in_th_030" class="carousel slide in_th_brdr_img_030 thumb_scroll_x swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="4000" data-duration="2000">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <!-- 1st Indicator -->
                                    <?php
                                    $i = 0;
                                    $query_mysql = mysqli_query($koneksi, "SELECT dag.gambar FROM destinasi_area_gambar AS dag INNER JOIN destinasi_area AS da ON dag.destinasi_area_id = da.id_area WHERE da.nama_area = '$namaWisata' ") or die(mysqli_error());
                                    while ($data = mysqli_fetch_array($query_mysql)) {
                                        $gambar = $data['gambar'];
                                    ?>
                                        <li data-target="#in_th_030" data-slide-to="<?= $i ?>" class="<?php if ($i == 1) echo 'active' ?>">
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
                                    $query_mysql = mysqli_query($koneksi, "SELECT dag.gambar FROM destinasi_area_gambar AS dag INNER JOIN destinasi_area AS da ON dag.destinasi_area_id = da.id_area WHERE da.nama_area = '$namaWisata' ") or die(mysqli_error());
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
                        <div class="item-detail">
                            <?php echo ($deskripsiDestinasi); ?>
                        </div>
                    </div>
                </div>
                <div id="sidebar-sticky" class="col-md-4">
                    <aside class="detail-sidebar sidebar-wrapper">
                        <div class="sidebar-item">
                            <div class="detail-title">
                                <h3><?php echo $namaDestinasi; ?> Packages</h3>
                            </div>
                            <div class="sidebar-content sidebar-slider">
                                <?php
                                $query_mysql = mysqli_query($koneksi, "SELECT * FROM (SELECT DISTINCT(A.id), A.nama AS nama, A.deskripsi AS deskripsi, B.gambar, E.nama AS destinasi FROM paket_wisata A, paket_wisata_gambar B, paket_wisata_detail C, destinasi_area D, destinasi E WHERE A.id = B.paket_wisata_id AND C.paket_wisata_id = A.id AND C.destinasi_area_id = D.id_area AND D.destinasi_id = E.id AND D.nama_area = '$namaDestinasi' ) AS tabel GROUP BY id") or die(mysqli_error());
                                while ($data = mysqli_fetch_array($query_mysql)) {
                                    //$id = $data['id'];
                                    $namaTour = $data['nama'];
                                    $deskripsiTour = $data['deskripsi'];
                                    $gambarTour = $data['gambar'];
                                ?>
                                    <div class="sidebar-package">
                                        <div class="sidebar-package-image">
                                            <img src="<?php echo $gambarTour; ?>" alt="Images" style="height:200px;background-size: cover;">
                                        </div>
                                        <div class="destination-content sidebar-package-content">
                                            <h4><a href="tour?tourID=<?php echo $data['id']; ?>"><?php echo $namaTour; ?></a></h4>
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