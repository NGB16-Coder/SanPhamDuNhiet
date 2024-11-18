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

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin của sản phẩm: &ensp;
                                <?= $product['title'] ?>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form
                            action="<?= BASE_URL_ADMIN.'?act=editProduct'; ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="text" name="id"
                                value="<?=$product['id']?>"
                                hidden>
                            <div class="card-body row">
                                <div class="form-group col-6">
                                    <label for="exampleInputProduct">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="title" id="exampleInputProduct"
                                        value="<?=$product['title']?>">
                                    <?php if (isset($_SESSION['error']['title'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['title'] ?>
                                    </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="category_id">Thuộc Danh Mục</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <?php foreach ($listCategory as $danhMuc): ?>
                                        <option <?= $danhMuc['id'] == $product['category_id'] ? 'selected' : '' ?>
                                            value="<?= $danhMuc['id'] ?>">
                                            <?= $danhMuc['name'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['category_id'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['category_id'] ?>
                                    </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label for="description">Mô tả sản phẩm</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        value="<?=$product['description']?>">
                                    <?php if (isset($_SESSION['error']['description'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['description'] ?>
                                    </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="price">Giá sản phẩm</label>
                                    <input type="text" class="form-control" name="price" id="price"
                                        value="<?=$product['price']?>">
                                    <?php if (isset($_SESSION['error']['price'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['price'] ?>
                                    </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="discount">Giá khuyến mãi</label>
                                    <input type="text" class="form-control" name="discount" id="discount"
                                        value="<?=$product['discount']?>">
                                    <?php if (isset($_SESSION['error']['discount'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['discount'] ?>
                                    </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="thumbnail" class="form-label">Ảnh sản phẩm</label>
                                    <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                                </div>
                                <div class="form-group col-6">
                                    <label for="update_at">Ngày nhập sản phẩm</label>
                                    <input type="date" class="form-control" name="update_at" id="update_at"
                                        value="<?=$product['update_at']?>">
                                    <?php if (isset($_SESSION['error']['update_at'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['update_at'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
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
    // const result = document.querySelector('#result');
    // const fileInput = document.querySelector('#input');

    //MIME типы изображений
    // const imgExt = ["image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/svg+xml", "image/tiff"]

    // fileInput.addEventListener('change', function() {

    //     for (let i = 0; i < this.files.length; i++) {
    //         let file = this.files[i];

    //         if (imgExt.find(f => {
    //                 return f == file.type
    //             })) {
    //             let fileReader = new FileReader();

    //             fileReader.addEventListener('load', e => {
    //                 let target = e.target || e.srcElement;
    //                 let text = `<img src="${target.result}" alt="" id="img">`;
    //                 result.innerHTML += text;
    //             })

    //             fileReader.readAsDataURL(file);
    //         }
    //     }

    // })
</script>

</body>

</html>