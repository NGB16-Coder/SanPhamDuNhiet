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

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin chi tiết của sản phẩm: &ensp;
                            <?= $product['title'] ?>
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img class="product-image"
                                src="<?= BASE_URL . $product["thumbnail"] ?>"
                                width="100px" alt="Ảnh sản phẩm">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"> Tên sản phẩm: &ensp;
                            <span><?= $product['title'] ?></span>
                        </h3>
                        <p style="color: grey; font-size:18px; text-decoration: line-through;">Giá sản phẩm:
                            &ensp;<span><?= number_format($product['price']) ?>
                                ₫</span>
                        </p>
                        <p style="color: red; font-size:24px; font-weight:bold">Giá khuyến mãi sản phẩm:
                            &ensp;<span><?= number_format($product['discount']) ?>
                                ₫</span>
                        </p>
                        <p> <span style="font-weight: 550;">Danh mục sản phẩm: &ensp;</span>
                            <span><?= $product['name'] ?></span>
                        </p>
                        <p> <span style="font-weight: 550;">Mô tả sản phẩm: &ensp;</span>
                            <span><?= $product['description'] !== '' ? $product['description'] : 'Không có mô tả' ?></span>
                        </p>

                    </div>
                </div>
                <div class="row mt-4">
                </div>
                <nav>
                    <div class="nav nav-tabs row mt-4" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Bình luận</button>
                        <!-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button> -->
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Nội dung</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nguyễn Văn A</td>
                                    <td>nguyenvana123@gmail.com</td>
                                    <td>0123456789</td>
                                    <td>Quá đẹp blalalalalalalalalallalalalalal</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                            <a href="#"><button class="btn btn-danger">Xóa</button></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nguyễn Văn B</td>
                                    <td>nguyenvanb123@gmail.com</td>
                                    <td>0987654321</td>
                                    <td>Quá đẹp blalalalalalalalalallalalalalal</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                            <a href="#"><button class="btn btn-danger">Xóa</button></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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