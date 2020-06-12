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
            <h1 class="m-0 text-dark">Daftar Admin</h1>
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
              <h3 class="card-title">Daftar Admin Saat Ini
                <span style="margin-left: 10px;"><a href="tambah" class="btn btn-info btn-xs">+ Tambah Admin</a></span>
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Aksi</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query_mysql = mysqli_query($koneksi,"SELECT * FROM admin")or die(mysqli_error());
                  $nomor = 1;
                  while($data = mysqli_fetch_array($query_mysql)){
                    $idUser = $data['id'];
                    $namaUser = $data['username'];
                  ?>
                  <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $namaUser; ?></td>
                    <td>
                      <a href='ubah?idUser=<?php echo $idUser; ?>' class="btn btn-info">Update</a>
                      <a href='hapus?idUser=<?php echo $idUser; ?>' class="btn btn-danger">Hapus</a>
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
