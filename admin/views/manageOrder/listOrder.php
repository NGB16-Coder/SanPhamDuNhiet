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
                            href="<?= BASE_URL_ADMIN . '?act=listOrder' ?>">Quản Lí Đơn Hàng</a></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <a class="btn"
            href="<?= BASE_URL_ADMIN.'?act=editOrder'; ?>">
            <button class="btn btn-info">Tạo Đơn Hàng Mới</button>
          </a>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tai Khoan</th>
                    <th>Địa chỉ</th>
                    <th>Người Nhận </th>
                    <th>Số Điện Thoai</th>
                    <th>Ngày Đặt</th>
                    <th>Số Lượng</th>
                    <th>Tổng Tiền </th>
                    <th>Ngày Tạo </th>
                    <th>Ngày Update </th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($listOrder as $Order): ?>
                  <tr>
                    <td><?= $Order['order_id'] ?>
                    </td>
                    <td><?= $Order['tk_id'] ?>
                    </td>
                    <td><?= $Order['ten_nhan'] ?>
                    </td>
                    <td><?= $Order['dia_chi'] ?>
                    </td>
                    <td><?= $Order['sdt'] ?>
                    </td>
                    <td><?= $Order['ngay_dat'] ?>
                    </td>
                    
                    <td><?= $Order['tong_so_luong'] ?>
                    </td>
                    <td><?= $Order['tong_tien'] ?>
                    </td>
                    <td><?= $Order['an_hien'] ?>
                    </td>
                    <td><?= $Order['ngay_tao'] ?>
                    </td>
                    <td><?= $Order['ngay_update'] ?>
                    </td>
                    <td><button>Chi Tiet</button>
                    </td>
                    

                  </tr>
                  <?php endforeach ?>

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