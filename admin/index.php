<?php

session_start();

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
// checkLoginAdmin();
// Require toàn bộ file Controllers
require_once './controllers/AdminCategoryController.php';
require_once './controllers/AdminProductController.php';
require_once './controllers/HomeAdminController.php';
require_once './controllers/AdminUserController.php';
require_once './controllers/AdminEvaluationController.php';


// Require toàn bộ file Models
require_once './models/AdminCategory.php';
require_once './models/AdminProduct.php';
require_once './models/AdminUser.php';
require_once './models/AdminEvaluation.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // router danh mục
    '/' => (new HomeAdminController())->home(),
    'listCategory' => (new AdminCategoryController())->listCategory(),
    'formAddCategory' => (new AdminCategoryController())->formAddCategory(),
    'addCategory' => (new AdminCategoryController())->addCategory(),
    'formEditCategory' => (new AdminCategoryController())->formEditCategory(),
    'editCategory' => (new AdminCategoryController())->editCategory(),
    'xoaCategory' => (new AdminCategoryController())->xoaCategory(),

    // router sản phẩm
    'listProduct' => (new AdminProductController())->listProduct(),
    'formAddProduct' => (new AdminProductController())->formAddProduct(),
    'addProduct' => (new AdminProductController())->addProduct(),
    'formEditProduct' => (new AdminProductController())->formEditProduct(),
    'editProduct' => (new AdminProductController())->editProduct(),
    'xoaProduct' => (new AdminProductController())->xoaProduct(),
    'detailProduct' => (new AdminProductController())->detailProduct(),

    // router user
    'listUser' => (new AdminUserController())->listUser(),
    'deleteUser' => (new AdminUserController())->deleteUser(),

    // router Evaluation
    'listEvaluation' => (new AdminEvaluationController())->listEvaluation(),
    'deleteEvaluation' => (new AdminEvaluationController())->deleteEvaluation(),
};
