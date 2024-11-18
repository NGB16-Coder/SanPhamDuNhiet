<?php


class HomeController
{
    public $product;
    public $category;
    public $user;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->user = new User();
    }
    public function trangchu()
    {
        // $listProduct = $this->product->getAll();
        // $listCategory = $this->category->getAllCategory();
        // var_dump($listCategory);
        // die;
        require_once './trangchu.php';
    }
    public function gioiThieu()
    {
        // $listCategory = $this->category->getAllCategory();
        require_once './views/gioiThieu.php';
    }

    public function formDangNhap()
    {
        // $listCategory = $this->category->getAllCategory();
        require_once './views/formdangnhap.php';
        deleteSessionError();
    }

    public function dangNhap()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy email và pass gửi lên form
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($email);die;
            // Ghi nhớ tài khoản
            if (isset($_POST['rememberMe'])) {
                setcookie("email", $email, time() + 86400 * 7);
                setcookie("password", $password, time() + 86400 * 7);
            }

            // Kiểm tra thông tin đăng nhập
            $user = $this->user->checkLogin($email, $password);
            // var_dump($user);
            // die;
            if ($user === $email) { // đăng nhập thành công
                // Lưu thông tin vào session
                $_SESSION['user_admin'] = $user;
                // var_dump($_SESSION['user_admin']);die;
                header('location:'. BASE_URL_ADMIN);
                exit();
            } elseif ($user == 'Trang client') {
                $_SESSION['user'] = $email;
                header('location:'. BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['error'] = $user ?? '';

                $_SESSION['flash'] = true;
                header('location:'.BASE_URL . '?act=dang-nhap');
                exit();
                deleteSessionError();
            }
        }
    }

    public function formDangKy()
    {
        // $listCategory = $this->category->getAllCategory();
        require_once './views/formdangky.php';
        deleteSessionError();
    }

    public function dangKy()
    {

        $listUser = $this->user->getAllUser();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            $errors = [];
            if (empty($fullname)) {
                $errors['fullname'] = 'Vui lòng nhập tên đăng nhập!';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập Email!';
            }
            if (empty($phone_number)) {
                $errors['phone_number'] = 'Vui lòng nhập số điện thoại!';
            }
            if (empty($address)) {
                $errors['address'] = 'Vui lòng nhập địa chỉ nơi trú!';
            }
            if (empty($password)) {
                $errors['password'] = 'Vui lòng nhập mật khẩu!';
            }
            if (empty($repassword)) {
                $errors['repassword'] = 'Vui lòng nhập lại mật khẩu!';
            } elseif ($password !== $repassword) {
                $errors['checkpassword'] = 'Mật khẩu không giống nhau';
            }

            // lưu input vào session khi lỗi không cần nhập lại
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['phone_number'] = $phone_number;
            $_SESSION['address'] = $address;
            $_SESSION['password'] = $password;
            $_SESSION['repassword'] = $repassword;

            // Kiểm tra xem đã tồn tại email hoặc sdt chưa
            foreach ($listUser as $user) {
                $user['email'];
                $user['phone_number'];
                if ($email === $user['email']) {
                    $errors['email'] = 'Email đã được đăng ký!';
                }
                if ($phone_number === $user['phone_number']) {
                    $errors['phone_number'] = 'Số điện thoại đã được đăng ký';
                }
            }

            $_SESSION['error'] = $errors; // Lưu biến lỗi
            // Nếu không lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm

                $this->user->insertUser($fullname, $email, $phone_number, $address, $password);
                session_unset();
                session_destroy();
                echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="?act=dang-nhap";</script>';
                exit();

            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL . '?act=dang-ky');
                exit();


            }
        }
    }

    public function logout()
    {
        require_once './views/logout.php';
    }
    public function xoaCookie()
    {
        require_once './views/xoaCookie.php';
    }


}
