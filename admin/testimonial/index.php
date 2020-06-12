<?php
include '../../koneksi.php';

session_start();
if($_SESSION['status']!="login"){
  header("location:../login");
}
?>
<!DOCTYPE html>
<html>

<!-- HEAD -->
<?php include '../adm_template/head.php'; ?>
<!-- END HEAD -->

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php //include 'adm_template/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include '../adm_template/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Testimonial</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Testimonial Saat Ini
                <span style="margin-left: 10px;"><a href="tambah" class="btn btn-info btn-xs">+ Tambah Testimonial</a></span>
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Deskripsi</td>
                    <td>Aksi</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query_mysql = mysqli_query($koneksi,"SELECT * FROM testimonial")or die(mysqli_error());
                  $nomor = 1;
                  while($data = mysqli_fetch_array($query_mysql)){
                    $idTesti = $data['id_testi'];
                    $namaTesti = $data['nama_testi'];
                    $deskripsiTesti = $data['deskripsi_testi'];
                    $gambar = $data['gambar_testi'];
                    if ($gambar == '') {
                      $tampakGambar = 'display:none';
                      $gambar = '';
                    }
                    else {
                      $tampakGambar = '';
                    }
                    /*
                    if ($data['gambar_paket'] == '')
                    {
                      $gambar = '';
                      $tampakGambar = 'display:none;';
                    }
                    else {
                      $tampilGambar = "../".$gambar;
                    }
                    */
                  ?>
                  <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $namaTesti; ?></td>
                    <td><?php echo $deskripsiTesti; ?></td>
                    <td>
                      <a href='ubah?idTesti=<?php echo $idTesti; ?>' class="btn btn-info btn-block">Detail & Update</a>
                      <a href='hapus?idTesti=<?php echo $idTesti; ?>' class="btn btn-danger btn-block">Hapus</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include '../adm_template/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include '../adm_template/script.php'; ?>
</body>
<!-- DataTables -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</html>
