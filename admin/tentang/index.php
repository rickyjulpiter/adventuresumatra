<?php
include '../../koneksi.php';

session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login");
}

?>
<style type="text/css">
    #image-preview {
        display: none;
        width: 293px;
        height: 195px;
    }

    #image-preview1 {
        display: none;
        width: 293px;
        height: 195px;
    }
</style>

<!DOCTYPE html>
<html>

<!-- HEAD -->
<?php include '../adm_template/head.php'; ?>
<!-- END HEAD -->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php //include 'adm_template/navbar.php'; 
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include '../adm_template/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tentang Travel</h1>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="POST" action="ubah-aksi" enctype="multipart/form-data">
                                    <?php
                                    $data = mysqli_query($koneksi, "SELECT * FROM tentang WHERE id = 1");
                                    while ($d = mysqli_fetch_array($data)) {
                                        //echo $d['nama_wisata'];
                                        //echo $d['deskripsi_wisata'];
                                    ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input name="nama" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['nama']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Slogan</label>
                                                <input name="slogan" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['slogan']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat</label>
                                                <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['alamat']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $d['email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telepon</label>
                                                <input name="telepon" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['telepon']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Whatsapp</label>
                                                <input name="whatsapp" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['whatsapp']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Facebook</label>
                                                <input name="facebook" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['facebook']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Twitter</label>
                                                <input name="twitter" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['twitter']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Instagram</label>
                                                <input name="instagram" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['instagram']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Youtube</label>
                                                <input name="youtube" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $d['youtube']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Deskripsi</label>
                                                <!-- tools box -->
                                                <div class="card-tools" style="margin-top: -22px;">
                                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="pad">
                                                    <div class="">
                                                        <textarea name="deskripsi" class="textarea" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $d['deskripsi']; ?>
					                                </textarea>
                                                    </div>
                                                </div>
                                                <!-- /. tools -->
                                            </div>
                                            <div class="form-group">
                                                <label for="customFile">Preview Logo</label>
                                                <img id="image-preview" alt="image preview" /><br />
                                                <div class="custom-file">
                                                    <input type="file" class="" name="logo" id="image-source" onchange="previewImage();">
                                                </div>
                                                <div>
                                                    <?php
                                                    if ($d['logo'] == '') {
                                                        $tampakGambar = 'display:none;';
                                                    } else {
                                                        echo "<label>Logo Perusahaan Saat Ini</label><br>";
                                                        //$tampakGambar = '';
                                                    }
                                                    ?>
                                                    <img src="<?php echo "../../" . $d['logo']; ?>" width="30%" style="<?php echo ($tampakGambar); ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="customFile">Preview Static Image</label>
                                                <img id="image-preview1" alt="image preview1" /><br />
                                                <div class="custom-file">
                                                    <input type="file" class="" name="static_image" id="image-source1" onchange="previewImage1();">
                                                </div>
                                                <div>
                                                    <?php
                                                    if ($d['static_image'] == '') {
                                                        $tampakGambar = 'display:none;';
                                                    } else {
                                                        echo "<label>Static image saat ini</label><br>";
                                                        //$tampakGambar = '';
                                                    }
                                                    ?>
                                                    <img src="<?php echo "../../" . $d['static_image']; ?>" width="30%" style="<?php echo ($tampakGambar); ?>">
                                                </div>
                                            </div>

                                        </div>
                                    <?php } ?>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block btn-info">Perbaharui Tentang</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include '../adm_template/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
    <?php include '../adm_template/script.php'; ?>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('.textarea').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        })
    </script>
    <script type="text/javascript">
        function previewImage() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };

        function previewImage1() {
            document.getElementById("image-preview1").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source1").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview1").src = oFREvent.target.result;
            };
        };
    </script>
    <script type="text/javascript">

    </script>

</body>

</html>