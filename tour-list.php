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
    // $queryTour = mysqli_query($koneksi, "SELECT * FROM paket_wisata WHERE nama = '$namaTour'") or die(mysqli_error());
    // $detail = mysqli_fetch_assoc($queryTour);
    // $idTourPackages = $detail['id'];
    // $nama_tour = $detail['nama'];
    // $deskripsi_tour = $detail['deskripsi'];
    // $peta_tour = $detail['peta'];
    // $timeline_tour = $detail['timeline'];
    ?>
    <!-- Breadcrumb -->
    <?php
    $query = "SELECT gambar FROM destinasi_gambar WHERE destinasi_id = '$idList'";
    $query_mysql = mysqli_query($koneksi, $query) or die(mysqli_error());
    $data = mysqli_fetch_assoc($query_mysql);
    $gambarBreadCumb = $data['gambar'];
    ?>
    <section class="breadcrumb-outer text-center" style="padding-top: 50px; background: url('<?= $gambarBreadCumb; ?>') no-repeat;background-size: cover;">
        <div class="container">
            <div class="breadcrumb-content">
                <h2><?php echo ($namaList); ?></h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tour List</li>
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
                <div class="col-md-8">
                    <div class="destination-outer">
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
                            <!-- <li><a href="tour?tourName=<?= $namaPaket; ?>"><?= $namaPaket ?></a></li> -->
                            <div class="destination-fw-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="destination-fw-image">
                                            <img src="<?= $gambarPaket; ?>" alt="Image">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="destination-fw-desc fw-content">
                                            <h3><a href="tour?tourID=<?php echo $area['id']; ?>"><?php echo trim($namaPaket) ?></a></h3>
                                            <p><?php echo limit_words(strip_tags(trim($deskripsiPaket)), 20) . "..."; ?></p>
                                            <!-- <div class="destination-fw-content">
                                            <p class="fw-info"><i class="fa fa-user-o" aria-hidden="true"></i> 23</p>
                                            <p class="fw-info"><i class="fa fa-clock-o" aria-hidden="true"></i> 18 May - 27 May</p>
                                            </div> -->
                                            <a href="tour?tourID=<?php echo $area['id']; ?>" class="btn-blue btn-red btn-xs pull-right">Tour Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
                                            <img src="<?php echo $gambarTour; ?>" alt="Images" height="200px" style=" object-fit: cover;">
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