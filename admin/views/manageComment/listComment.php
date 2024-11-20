<!-- Header-->
<?php include './views/layout/header.php' ?>
<!-- EndHeader-->

<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><a
              href="<?= BASE_URL_ADMIN . '?act=listComment' ?>">Quản Lý Bình Luận</a></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nội Dung</th>
                    <th>Ngày Bình Luận</th>
                    <th>Ngày update</th>
                    <th>Chức Năng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listComment as $Comment): ?>
                  <tr>
                    <td><?= $Comment['bl_id'] ?>
                    </td>
                    <td><?= $Comment['noi_dung'] ?>
                    <td><?= $Comment['ngay_tao'] ?>
                    </td>
                    <td><?= $Comment['ngay_update'] ?>
                    </td> 
                    <td>
                      <a href="<?= BASE_URL_ADMIN .'?act=deleteComment&id='.$Comment['bl_id'] ?>"
                        onclick="return confirm('Bạn có chắc chắn xóa hay không?')"><button
                          class="btn btn-danger">Xóa</button></a>
                    </td>

                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nội Dung</th>
                    <th>Ngày Bình Luận</th>
                    <th>Ngày update</th>
                    <th>Chức Năng</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->


          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php' ?>
<!-- EndFooter -->
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>