<?php include 'koneksi.php';
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
    <?php $namaDestinasi = $_GET['name']; ?>
    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center" style="padding-top: 50px; background: url('<?= $gambarBreadCumb; ?>') no-repeat;background-size: cover;">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Destination on <?php echo $namaDestinasi; ?></h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Destinations</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- Destinations -->
    <section class="destinations" style="background: url(3040791.jpg) no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="destination-outer">
                        <?php
                        $query_mysql = mysqli_query($koneksi, "SELECT * FROM destinasi_area LIMIT 6") or die(mysqli_error());
                        while ($data = mysqli_fetch_array($query_mysql)) {
                            $idDestinasi = $data['id_area'];
                            $namaDestinasi = $data['nama_area'];
                            $deskripsiDestinasi = $data['deskripsi_area'];
                            $gambarDestinasi = $data['gambar_area'];
                            ?>
                            <div class="destination-fw-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="destination-fw-image">
                                            <img src="<?php echo $gambarDestinasi; ?>" alt="Image">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="destination-fw-desc fw-content">
                                            <h3><a href="destination-area-detail?destination=<?php echo $namaDestinasi; ?>"><?php echo $namaDestinasi; ?></a></h3>
                                            <p><?php echo $deskripsiDestinasi; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-content">
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> 
                </div>
            </div>
            -->
        </div>
    </section>
    <!-- Destination Ends -->

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