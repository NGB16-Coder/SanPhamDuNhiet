<?php

class ProductController
{
    public $product;
    public $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function chiTietProduct()
    {

        // Lấy ra thông tin sản phẩm
        $id = $_GET['id'];
        $product = $this->product->getDetailProduct($id);
        $listCategory = $this->category->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        if ($product) {
            require_once "./views/detailProduct.php";
        } else {
            header('location: ' . BASE_URL.'?act=trang-chu');
        }
    }
    public function productCategory()
    {

        // Lấy ra thông tin sản phẩm
        $id = $_GET['id'];
        $productCategory = $this->product->getProductCategory($id);
        $listCategory = $this->category->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        if ($productCategory) {
            require_once "./views/productCategory.php";
        } else {
            header('location: ' . BASE_URL.'?act=trang-chu');
        }
    }
}
