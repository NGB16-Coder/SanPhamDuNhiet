<!-- Header -->
<?php require './views/layout/header.php'; ?>
<!-- End Header -->

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- End Navbar -->

<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>
<!-- End Sidebar -->

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
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Sản Phẩm</h3>

                        </div>
                        <!-- form start -->
                        <form
                            action="<?= BASE_URL_ADMIN .'?act=addProduct' ?>"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body row">
                                <!-- Tên sản phẩm -->
                                <div class="form-group col-12">
                                    <label for="title">Tên Sản Phẩm</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Tên Sản Phẩm">
                                    <?php if (isset($_SESSION['error']['title'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['title'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                                <!-- Giá -->
                                <div class="form-group col-6">
                                    <label for="price">Giá Sản Phẩm</label>
                                    <input type="number" name="price" min="0" class="form-control" id="price"
                                        placeholder="Giá">
                                    <?php if (isset($_SESSION['error']['price'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['price'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                                <!-- Giá khuyến mãi -->
                                <div class="form-group col-6">
                                    <label for="discount">Giá Khuyến Mãi</label>
                                    <input type="number" name="discount" min="0" class="form-control" id="discount"
                                        placeholder="Giá Khuyến Mãi">
                                    <?php if (isset($_SESSION['error']['discount'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['discount'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                                <!-- Danh mục -->
                                <div class="form-group col-6">
                                    <label for="category_id">Thuộc Danh Mục</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php foreach ($listCategory as $danhMuc): ?>
                                        <option
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

                                <!-- Ảnh sản phẩm -->
                                <div class="mb-3 col-6">
                                    <label for="thumbnail" class="form-label">Ảnh sản phẩm</label>
                                    <input type="file" name="thumbnail" class="form-control" id="thumbnail"
                                        placeholder="Ảnh sản phẩm">
                                    <?php if (isset($_SESSION['error']['thumbnail'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['thumbnail'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                                <!-- Ngày nhập -->
                                <div class="form-group col-6">
                                    <label for="update_at">Ngày Nhập</label>
                                    <input type="date" name="update_at" class="form-control" id="update_at">
                                    <?php if (isset($_SESSION['error']['update_at'])): ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['update_at'] ?>
                                    </p>
                                    <?php endif; ?>
                                </div>

                                <!-- Mô tả -->
                                <div class="form-group col-6">
                                    <label for="description">Mô tả</label>
                                    <textarea name="description" id="description" class="form-control"
                                        placeholder="Mô tả"></textarea>
                                </div>
                            </div>

                            <!-- Nút submit -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

</body>

</html>