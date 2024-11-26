<?php

session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/ProductController.php';
require_once './controllers/CategoryController.php';

// Require toàn bộ file Models
require_once './models/Product.php';
require_once './models/Category.php';
require_once './models/Taikhoan.php';

// Route
$act = $_GET['act'] ?? 'trang-chu';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    'trang-chu' => (new HomeController())->trangchu(),
    'gioi-thieu' => (new HomeController())->gioiThieu(),
    'chitietsanpham' => (new ProductController())->chiTietProduct(),
    // 'san-pham-theo-danh-muc' => (new ProductController())->productCategory(),
    'dang-nhap' => (new HomeController())->formDangNhap(),
    'check-dang-nhap' => (new HomeController())->dangNhap(),
    'dang-ky' => (new HomeController())->formDangKy(),
    'check-dang-ky' => (new HomeController())->dangKy(),
    'dang-xuat' => (new HomeController())->logout(),
    'xoa-ghi-nho' => (new HomeController())->xoaCookie(),
    'list-san-pham' => (new ListSanPham())->listsanpham(),
};
