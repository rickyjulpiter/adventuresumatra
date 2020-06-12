<?php
include '../../koneksi.php';

session_start();
if($_SESSION['status']!="login"){
  header("location:../login");
}

if(!empty($_GET['idTourPackages'])){
    $idTourPackages = $_GET['idTourPackages'];
}
else{
    header("location:../tour-packages");   
}
$dataPaket = array();
$query_mysql = mysqli_query($koneksi,"SELECT destinasi_area_id FROM paket_wisata_detail WHERE paket_wisata_id = $idTourPackages")or die(mysqli_error());
    while($data = mysqli_fetch_array($query_mysql)){
        array_push($dataPaket, $data['destinasi_area_id']);
    }
?>

<style type="text/css">
    #image-preview{
    display:none;
    width : 293px;
    height : 195px;
    }
    .timeline{
      position: relative;
    }
    .timeline li {
      position: relative;
      margin-bottom: 30px;
      background: #fff;
      padding: 0px 15px 15px 110px;
      border: 1px solid #f1f1f1;
    }
    .flag-wrapper {
      margin-bottom: 10px;
      margin-top: 15px;
    }
    .flag{
      font-size: 18px;
      color: #333;
      font-weight: 600;
      transition : all ease-in-out 0.3s;
    }
    .day-wrapper {
      position: absolute;
      height: 100%;
      width: 60px;
      background: #f1f1f1;
      left: 0;
      z-index: 1;
      text-align: center;
      transition: all ease-in-out 0.3s;
      top: 0;
    }
    .timeline li:hover .day-wrapper{
      background: #e67e22;
    }
    .timeline li:hover .flag{
      color: #e67e22;
    }
    .day-wrapper span {
      color: #009436;
      font-weight: 600;
      font-size: 32px;
      line-height: 2;
      background: #fff;
      width: 100%;
      display: inline-block;
    }
    .desc p:last-child{
      margin-bottom: 0;
    }

    .description-content p:last-child{
      margin-bottom: 0;
    }
    .detail table{
      width: 100%;
      margin-top: 10px;
    }
    .detail table td{
      padding: 10px;
    }
    td.title{
      font-weight: 500;
    }
    .detail table tr{
      margin-bottom: 10px;
      border: 1px solid #f1f1f1;
    }
    .detail table tr:last-child{
      margin-bottom: 0;
    }
    .detail table td ul li{
      margin-bottom: 5px;
      width: 49%;
      display: inline-block;
    }
    .detail table td ul li:last-child{
      margin-bottom: 0;
    }
    .detail table td i{
      width: 20px;
      color: #009436;
    }
    .detail table tr:nth-child(even){
      background: #fbfbfb;
    }
    td.excludes ul li i{
      color: #e67e22; 
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
    	<?php //include 'adm_template/navbar.php'; ?>
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
                            <h1>Ubah Tour Packages</h1>
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
                                    $queryDetailAdmin = mysqli_query($koneksi,"SELECT * FROM paket_wisata WHERE id = $idTourPackages");
                                    $d = mysqli_fetch_assoc($queryDetailAdmin);
                                    $idDestinasi = $d['id'];
                                    $nama = $d['nama'];
                                    $deskripsi = $d['deskripsi'];
                                    $peta = $d['peta'];
                                    $timeline = $d['timeline'];
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input name="nama" type="text" data-filter='.*' class="form-control" id="exampleInputEmail1" value="<?= $nama; ?>">
                                            <input type="hidden" name="id" value="<?= $idTourPackages;?>">
                                        </div>
                                        <div class="form-group">
                                        	<label for="exampleInputPassword1">Deskripsi</label>
                                        	<!-- tools box -->
                                        	<div class="card-tools" style="margin-top: -22px;">
                                        		<button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        			<i class="fas fa-minus"></i>
					                             </button>
					                             <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
					                                 title="Remove">
					                                 <i class="fas fa-times"></i>
					                             </button>
					                        </div>
					                        <div class="pad">
					                         	<div class="">
					                         		<textarea name="deskripsi" class="textarea" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $deskripsi; ?>
					                                </textarea>
					                            </div>
					                        </div>
					                           <!-- /. tools -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Peta</label>
                                            <!-- tools box -->
                                            <div class="card-tools" style="margin-top: -22px;">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                 </button>
                                                 <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                     title="Remove">
                                                     <i class="fas fa-times"></i>
                                                 </button>
                                            </div>
                                            <div class="pad">
                                                <div class="">
                                                    <textarea name="peta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $peta; ?></textarea>
                                                </div>
                                            </div>
                                               <!-- /. tools -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Itinerary</label>
                                            <!-- tools box -->
                                            <div class="card-tools" style="margin-top: -22px;">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                 </button>
                                                 <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                     title="Remove">
                                                     <i class="fas fa-times"></i>
                                                 </button>
                                            </div>
                                            <div class="pad">
                                                <div class="">
                                                    <textarea name="timeline" class="textarea" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $timeline; ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                               <!-- /. tools -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Destinasi Area</label>
                                            <!-- tools box -->
                                            <div class="card-tools" style="margin-top: -22px;">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                 </button>
                                                 <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                     title="Remove">
                                                     <i class="fas fa-times"></i>
                                                 </button>
                                            </div>
                                            <div class="pad">
                                                <div class="">
                                                    <?php
                                                    $query_mysql = mysqli_query($koneksi,"SELECT DISTINCT(d.id),d.nama FROM destinasi AS d INNER JOIN destinasi_area AS da ON d.id = da.destinasi_id ")or die(mysqli_error());
                                                    while($data = mysqli_fetch_array($query_mysql)){
                                                        $id = $data['id'];
                                                        $nama = $data['nama'];
                                                    ?>
                                                    <h6><?= $nama ?></h2>
                                                        <?php
                                                        $query_mysql2 = mysqli_query($koneksi,"SELECT * FROM destinasi_area WHERE destinasi_id = $id")or die(mysqli_error());
                                                        while($data2 = mysqli_fetch_array($query_mysql2)){
                                                        ?>
                                                        <label><input type="checkbox" name="data_des[]" value="<?= $data2['id_area']?>" <?php echo (in_array($data2['id_area'], $dataPaket) ? 'checked' : ''); ?>> <?= $data2['nama_area'] ?></label>

                                                        <?php } ?>
                                                <?php } ?>
                                                </div>
                                            </div>
                                               <!-- /. tools -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Gambar</label>
                                            <!-- tools box -->
                                            <div class="card-tools" style="margin-top: -22px;">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                 </button>
                                                 <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                     title="Remove">
                                                     <i class="fas fa-times"></i>
                                                 </button>
                                            </div>
                                            <div class="pad">
                                                <div class="">
                                                    <?php
                                                    $query_mysql = mysqli_query($koneksi,"SELECT id,gambar FROM paket_wisata_gambar WHERE paket_wisata_id = '$idTourPackages' ")or die(mysqli_error());
                                                    while($data = mysqli_fetch_array($query_mysql)){
                                                        $gambar = $data['gambar'];
                                                        $idgambar = $data['id'];
                                                    ?>
                                                    <img src="../../<?= $gambar?>"><br>
                                                    <a href="hapus-gambar?idGambar=<?=$idgambar?>&idTour=<?= $idTourPackages?>" class="btn btn-danger">Hapus</a>
                                                    <label>Edit Gambar : <input type='file' name='gambar[]' accept='image/*'></label><br>
                                                    <input type='hidden' name='idgambar[]' value="<?= $idgambar?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                               <!-- /. tools -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tambah Gambar</label>
                                            <!-- tools box -->
                                            <div class="card-tools" style="margin-top: -22px;">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                 </button>
                                                 <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                     title="Remove">
                                                     <i class="fas fa-times"></i>
                                                 </button>
                                            </div>
                                            <div class="pad">
                                                <div class="">
                                                    <input type="text" id="jumlah" placeholder="Masukkan banyak gambar">
                                                    <button class="btn btn-primary" type="button" id="btn-proses">Proses</button>
                                                    <div class="input-file">
                                                    </div>
                                                </div>
                                            </div>
                                               <!-- /. tools -->
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block btn-info">Ubah Data Tour Packages</button>
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
        $(function () {
            // Summernote
            $('.textarea').summernote({
                toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
                ],
                fontSizes: ['10', '11', '12', '14','15','16','17','18', '24']
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
      </script>
      <script type="text/javascript">
          $('#btn-proses').on('click',function(){
            var jumlah = $('#jumlah').val();
            var save = "";
            for(var i=0; i<jumlah; i++){
                save = save + "<input type='file' name='tambahgambar[]' accept='image/*'><br>"
            }
            $('.input-file').html(save);
        });
      </script>
              <script type="text/javascript">
        // Apply filter to all inputs with data-filter:
var inputs = document.querySelectorAll('input[data-filter]');

for (var i = 0; i < inputs.length; i++) {
  var input = inputs[i];
  var state = {
    value: input.value,
    start: input.selectionStart,
    end: input.selectionEnd,
    pattern: RegExp('^' + input.dataset.filter + '$')
  };
  
  input.addEventListener('input', function(event) {
    if (state.pattern.test(input.value)) {
      state.value = input.value;
    } else {
      input.value = state.value;
      input.setSelectionRange(state.start, state.end);
    }
  });

  input.addEventListener('keydown', function(event) {
    state.start = input.selectionStart;
    state.end = input.selectionEnd;
  });
}</script>

</body>

</html>