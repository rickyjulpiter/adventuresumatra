<?php
include '../../koneksi.php';

session_start();
if($_SESSION['status']!="login"){
  header("location:../login");
}

if(!empty($_GET['idDestinasi'])){
    $idDestinasi = $_GET['idDestinasi'];
}
else{
    header("location:../destination");   
}
?>
<style type="text/css">
    #image-preview{
    display:none;
    width : 293px;
    height : 195px;
}
.img-prev{
    display:none;
    width : 293px;
    height : 195px;
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
                            <h1>Ubah Destination</h1>
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
                                    $queryDetailAdmin = mysqli_query($koneksi,"SELECT * FROM destinasi WHERE id = $idDestinasi");
                                    $d = mysqli_fetch_assoc($queryDetailAdmin);
                                    $idDestinasi = $d['id'];
                                    $nama = $d['nama'];
                                    $deskripsi = $d['deskripsi'];
                                    $deskripsi_singkat = $d['deskripsi_singkat'];
                                    $prioritas = $d['prioritas'];
                                    // $gambar = $d['gambar'];
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input name="nama" type="text" data-filter='.*' class="form-control" id="exampleInputEmail1" value="<?= $nama; ?>">
                                            <input type="hidden" name="id" value="<?= $idDestinasi;?>">
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
                                            <label for="exampleInputPassword1">Deskripsi Singkat</label>
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
                                                    <textarea name="deskripsi_singkat" class="textarea" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $deskripsi_singkat; ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                               <!-- /. tools -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Prioritas</label>
                                            <input name="prioritas" type="number" class="form-control" id="prioritas" value='<?= $prioritas;?>'>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <?php
                                                    $query_mysql = mysqli_query($koneksi,"SELECT id,gambar FROM destinasi_gambar WHERE destinasi_id = '$idDestinasi' ")or die(mysqli_error());
                                                    $i=0;
                                                    while($data = mysqli_fetch_array($query_mysql)){
                                                        if($i==0){
                                                            echo "<label>Gambar Destinasi Saat Ini</label><br>";
                                                        }
                                                        $gambar = $data['gambar'];
                                                        $idgambar = $data['id'];
                                                        $i++;
                                                    ?>
                                                    <img src="../../<?= $gambar?>"><br>
                                                    <a href="hapus-gambar?idGambar=<?=$idgambar?>&idDestinasi=<?= $idDestinasi?>" class="btn btn-danger">Hapus</a>
                                                    <label>Edit Gambar : <input type='file' name='gambar[]' accept='image/*'></label><br>
                                                    <input type='hidden' name='idgambar[]' value="<?= $idgambar?>">
                                                    <?php } 
                                                ?>
                                            </div>
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
                                                <div class="form-group">
                                                    <input class="form-control" type="number" id="jumlah" placeholder="Masukkan banyak gambar" min="1" max="3">
                                                    <button type="button" id="btn-proses">Proses</button>
                                                    <div class="input-file">
                                                    </div>
                                                </div>
                                            </div>
                                               <!-- /. tools -->
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block btn-info">Ubah Data Destination</button>
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
                ]
            });
        })
      </script>
      <script type="text/javascript">
          $('#btn-proses').on('click',function(){
            var jumlah = $('#jumlah').val();
            var save = "";
            for(var i=0; i<jumlah; i++){
                save = save + "<img class='img-prev' id='image-preview-is"+(i+1)+"' alt='image preview'/><br/><input type='file' id='is"+(i+1)+"' name='tambahgambar[]' onchange='previewImage(this);' accept='image/*'><br>"
            }
            $('.input-file').html(save);
        });
      </script>
      <script type="text/javascript">
          function previewImage(save) {
            document.getElementById("image-preview-"+save.id).style.display = "block";
            var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById(save.id).files[0]);

            oFReader.onload = function(oFREvent) {
              document.getElementById("image-preview-"+save.id).src = oFREvent.target.result;
            };
          };
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