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
                            href="<?= BASE_URL_ADMIN . '?act=listProduct' ?>">Quản
                            Lý Sản Phẩm</a></h1>
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
            href="<?= BASE_URL_ADMIN.'?act=formAddProduct'; ?>">
            <button class="btn btn-info">Thêm sản phẩm mới</button>
          </a>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Thuộc</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Giá tiền</th>
                    <th>Giá khuyến mãi</th>
                    <th>Ảnh</th>
                    <th>Ngày nhập</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($listProduct as $product): ?>
                  <tr>
                    <td><?= $product["id"] ?>
                    </td>
                    <td><?= $product["name"] ?>
                    </td>
                    <td><?= $product["title"] ?>
                    </td>
                    <td>
                      <?= $product["description"] !== '' ? "Có mô tả, vào chi tiết để xem" : "Không có mô tả" ?>
                    </td>
                    <td>
                      <?= number_format($product["price"])  ?>
                    </td>
                    <td>
                      <?= number_format($product["discount"]) ?>
                    </td>
                    <td>
                      <!-- Hiển thị ảnh sản phẩm với kích thước 100px -->
                      <img
                        src="<?= BASE_URL . $product["thumbnail"] ?>"
                        width="100px" alt="Ảnh sản phẩm">

                    </td>
                    <td>
                      <?= $product["update_at"] ?>
                    </td>
                    <td>
                      <a
                        href="<?= BASE_URL_ADMIN.'?act=detailProduct&id='.$product['id']; ?>"><button
                          class="btn btn-info">Chi tiết</button></a>

                      <a
                        href="<?= BASE_URL_ADMIN.'?act=formEditProduct&id='.$product['id']; ?>"><button
                          class="btn btn-warning">Sửa</button></a>

                      <a href="<?= BASE_URL_ADMIN.'?act=xoaProduct&id='.$product['id']; ?>"
                        onclick="return confirm('Bạn có chắc chắn xóa hay không?')"><button
                          class="btn btn-danger">Xóa</button></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Thuộc</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Giá tiền</th>
                    <th>Giá khuyến mãi</th>
                    <th>Ảnh</th>
                    <th>Ngày nhập</th>
                    <th>Thao tác</th>
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