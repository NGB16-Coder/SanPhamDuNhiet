<?php

class AdminOrderController
{
    public $modelOrder;
   
    public function __construct()
    {
        $this->modelOrder = new AdminOrder();
        
    }
    public function listOrder()
    {
        $listOrder = $this->modelOrder->getAllOrder();
        require_once "./views/manageOrder/listOrder.php";
    }

    public function formAddOrder()
    {
        // dùng để hiển thị Form nhập

        $listOrder = $this->modelOrder->getAllOrder(); // lấy dữ liệu vào mục thuộc danh mục

        require_once "./views/manageOrder/addOrder.php";
        deleteSessionError(); // xóa session sau khi load trang
    }

    public function addOrder() // Dùng để thêm dữ liệu
    {

        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            // $Order_id = $_POST['Order_id'] ?? '';
            // $title = $_POST['title'] ?? '';
            // $description = $_POST['description'] ?? '';
            // $price = $_POST['price'] ?? '';
            // $discount = $_POST['discount'] ?? '';
            // $thumbnail = $_FILES['thumbnail'] ?? null;
            // $update_at = $_POST['update_at'] ?? '';
            $order_id = $_POST['order_id'] ?? '';
            $tk_id = $_POST['tk_id'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $ten_nhan = $_POST['ten_nhan'] ?? '';
            $sdt = $_POST['sdt'] ?? '';
            $ngay_dat = $_POST['ngay_dat'] ?? '';
            $tong_so_luong = $_POST['tong_so_luong'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $tong_tien = $_POST['tong_tien'] ?? '';
            $an_hien = $_POST['an_hien'] ?? '';
            $ngay_tao = $_POST['ngay_tao'] ?? '';
            $ngay_update = $_POST['ngay_update'] ?? '';



            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($Order_id)) {
                $errors['Order_id'] = 'Bắt buộc chọn sản phẩm thuộc danh mục!';
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
                $this->modelOrder->insertOrder($title, $price, $discount, $update_at, $Order_id, $file_thumb, $description);
                header('location:' . BASE_URL_ADMIN . '?act=listOrder');
                exit();
            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL_ADMIN . '?act=formAddOrder');
                exit();


            }
        }

    }

    public function formEditOrder()
    {
        /* dùng để hiển thị Form nhập */

        // Lấy ra thông tin sản phẩm cần sửa
        $listOrder = $this->modelOrder->getAllOrder(); // lấy dữ liệu vào mục thuộc danh mục
        $id = $_GET['id'];
        $Order = $this->modelOrder->getDetailOrder($id);
        if ($Order) {
            require_once "./views/manageOrder/editOrder.php";
            deleteSessionError();
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listOrder');
        }
    }

    public function editOrder()
    {
        // Dùng để thêm dữ liệu


        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu cũ của sản phẩm
            $order_id = $_POST['order_id'] ?? '';
            // truy vấn
            $OrderOld = $this->modelOrder->getDetailOrder($id);
            $old_file = $OrderOld['thumbnail']; // lấy ảnh cũ sửa ảnh


            // lấy ra dữ liệu
            $Order_id = $_POST['Order_id'] ?? '';
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
            if (empty($Order_id)) {
                $errors['Order_id'] = 'Bắt buộc chọn sản phẩm thuộc danh mục!';
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
                $this->modelOrder->updateOrder($title, $price, $discount, $update_at, $Order_id, $new_file, $description, $id);
                // var_dump($new_file);
                // die;
                header('location:' . BASE_URL_ADMIN . '?act=listOrder');
                exit();
            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL_ADMIN . '?act=formEditOrder&id='.$id);
                exit();


            }
        }
    }

    public function xoaOrder()
    {
        // Lấy ra thông tin sản phẩm cần xóa
        $id = $_GET['id'];
        $Order = $this->modelOrder->getDetailOrder($id);

        if ($Order) {
            deleteFile($Order['thumbnail']);
            $this->modelOrder->deleteOrder($id);
        }
        header('location: '.BASE_URL_ADMIN.'?act=listOrder');
        exit();

    }

    public function detailOrder()
    {

        // Lấy ra thông tin sản phẩm
        $id = $_GET['id'];
        $Order = $this->modelOrder->getDetailOrder($id);
        $listOrder = $this->modelOrder->getAllOrder(); // lấy dữ liệu vào mục thuộc danh mục
        if ($Order) {
            require_once "./views/manageOrder/detailOrder.php";
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listOrder');
        }
    }
}
