<?php

class AdminProductController
{
    public $modelProduct;
    public $modelCategory;

    public function __construct()
    {
        $this->modelProduct = new AdminProduct();
        $this->modelCategory = new AdminCategory();
    }
    public function listProduct()
    {
        $listProduct = $this->modelProduct->getAllProduct();
        require_once "./views/manageProduct/listProduct.php";
    }

    public function formAddProduct()
    {
        // dùng để hiển thị Form nhập

        $listCategory = $this->modelCategory->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục

        require_once "./views/manageProduct/addProduct.php";
        deleteSessionError(); // xóa session sau khi load trang
    }

    public function addProduct() // Dùng để thêm dữ liệu
    {

        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $category_id = $_POST['category_id'] ?? '';
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $discount = $_POST['discount'] ?? '';
            $thumbnail = $_FILES['thumbnail'] ?? null;
            $update_at = $_POST['update_at'] ?? '';

            // Lưu hình ảnh vào
            $file_thumb = uploadFile($thumbnail, 'uploads/');


            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($category_id)) {
                $errors['category_id'] = 'Bắt buộc chọn sản phẩm thuộc danh mục!';
            }
            if (empty($title)) {
                $errors['title'] = 'Tên sản phẩm không được để trống!';
            }
            if (empty($price)) {
                $errors['price'] = 'Giá sản phẩm không được để trống!';
            }
            if (empty($discount)) {
                $errors['discount'] = 'Khuyến mãi sản phẩm không được để trống!';
            }
            if ($thumbnail['error'] !== 0) {
                $errors['thumbnail'] = 'Bắt buộc chọn ảnh sản phẩm!';
            }
            if (empty($update_at)) {
                $errors['update_at'] = 'Ngày nhập sản phẩm bắt buộc nhập!';
            }
            $_SESSION['error'] = $errors; // Lưu biến lỗi

            // Nếu không lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm
                $this->modelProduct->insertProduct($title, $price, $discount, $update_at, $category_id, $file_thumb, $description);
                header('location:' . BASE_URL_ADMIN . '?act=listProduct');
                exit();
            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL_ADMIN . '?act=formAddProduct');
                exit();


            }
        }

    }

    public function formEditProduct()
    {
        /* dùng để hiển thị Form nhập */

        // Lấy ra thông tin sản phẩm cần sửa
        $listCategory = $this->modelCategory->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        $id = $_GET['id'];
        $product = $this->modelProduct->getDetailProduct($id);
        if ($product) {
            require_once "./views/manageProduct/editProduct.php";
            deleteSessionError();
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listProduct');
        }
    }

    public function editProduct()
    {
        // Dùng để thêm dữ liệu


        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu cũ của sản phẩm
            $id = $_POST['id'] ?? '';
            // truy vấn
            $productOld = $this->modelProduct->getDetailProduct($id);
            $old_file = $productOld['thumbnail']; // lấy ảnh cũ sửa ảnh


            // lấy ra dữ liệu
            $category_id = $_POST['category_id'] ?? '';
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $discount = $_POST['discount'] ?? '';
            $thumbnail = $_FILES['thumbnail'] ?? null;
            $update_at = $_POST['update_at'] ?? '';
            // var_dump($thumbnail);
            // die;
            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($category_id)) {
                $errors['category_id'] = 'Bắt buộc chọn sản phẩm thuộc danh mục!';
            }
            if (empty($title)) {
                $errors['title'] = 'Tên sản phẩm không được để trống!';
            }
            if (empty($price)) {
                $errors['price'] = 'Giá sản phẩm không được để trống!';
            }
            if (empty($discount)) {
                $errors['discount'] = 'Khuyến mãi sản phẩm không được để trống!';
            }
            if (empty($update_at)) {
                $errors['update_at'] = 'Ngày nhập sản phẩm bắt buộc nhập!';
            }

            $_SESSION['error'] = $errors; // Lưu biến lỗi

            // logic sửa ảnh
            if (isset($thumbnail) && $thumbnail['error'] == UPLOAD_ERR_OK) {
                // upload ảnh mới lên
                $new_file = uploadFile($thumbnail, 'uploads/');

                // nếu có ảnh cũ thì xóa đi
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file; // nếu không có ảnh mới thì giữ nguyên ảnh cũ
            }

            // Nếu không lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm
                $this->modelProduct->updateProduct($title, $price, $discount, $update_at, $category_id, $new_file, $description, $id);
                // var_dump($new_file);
                // die;
                header('location:' . BASE_URL_ADMIN . '?act=listProduct');
                exit();
            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL_ADMIN . '?act=formEditProduct&id='.$id);
                exit();


            }
        }
    }

    public function xoaProduct()
    {
        // Lấy ra thông tin sản phẩm cần xóa
        $id = $_GET['id'];
        $product = $this->modelProduct->getDetailProduct($id);

        if ($product) {
            deleteFile($product['thumbnail']);
            $this->modelProduct->deleteProduct($id);
        }
        header('location: '.BASE_URL_ADMIN.'?act=listProduct');
        exit();

    }

    public function detailProduct()
    {

        // Lấy ra thông tin sản phẩm
        $id = $_GET['id'];
        $product = $this->modelProduct->getDetailProduct($id);
        $listCategory = $this->modelCategory->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        if ($product) {
            require_once "./views/manageProduct/detailProduct.php";
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listProduct');
        }
    }
}
