<?php


class HomeController
{
    public $product;
    public $category;
    public $taikhoan;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->taikhoan = new taikhoan();
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
            $mat_khau = $_POST['mat_khau'];
            // var_dump($email);die;
            // Ghi nhớ tài khoản
            if (isset($_POST['rememberMe'])) {
                setcookie("email", $email, time() + 86400 * 7);
                setcookie("mat_khau", $mat_khau, time() + 86400 * 7);
            }

            // Kiểm tra thông tin đăng nhập
            $taikhoan = $this->taikhoan->checkLogin($email, $mat_khau);
            // var_dump($taikhoan);
            // die;
            if ($taikhoan === $email) { // đăng nhập thành công
                // Lưu thông tin vào session
                $_SESSION['taikhoan_admin'] = $taikhoan;
                // var_dump($_SESSION['taikhoan_admin']);die;
                header('location:'. BASE_URL_ADMIN);
                exit();
            } elseif ($taikhoan == 'Trang client') {
                $_SESSION['taikhoan'] = $email;
                header('location:'. BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['error'] = $taikhoan ?? '';

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

        $listtaikhoan = $this->taikhoan->getAlltaikhoan();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $mat_khau = $_POST['mat_khau'];
            $remat_khau = $_POST['remat_khau'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Vui lòng nhập tên đăng nhập!';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập Email!';
            }
            if (empty($sdt)) {
                $errors['sdt'] = 'Vui lòng nhập số điện thoại!';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Vui lòng nhập địa chỉ nơi trú!';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui lòng nhập mật khẩu!';
            }
            if (empty($remat_khau)) {
                $errors['remat_khau'] = 'Vui lòng nhập lại mật khẩu!';
            } elseif ($mat_khau !== $remat_khau) {
                $errors['checkmat_khau'] = 'Mật khẩu không giống nhau';
            }

            // lưu input vào session khi lỗi không cần nhập lại
            $_SESSION['ho_ten'] = $ho_ten;
            $_SESSION['email'] = $email;
            $_SESSION['sdt'] = $sdt;
            $_SESSION['dia_chi'] = $dia_chi;
            $_SESSION['mat_khau'] = $mat_khau;
            $_SESSION['remat_khau'] = $remat_khau;

            // Kiểm tra xem đã tồn tại email hoặc sdt chưa
            foreach ($listtaikhoan as $taikhoan) {
                $taikhoan['email'];
                $taikhoan['sdt'];
                if ($email === $taikhoan['email']) {
                    $errors['email'] = 'Email đã được đăng ký!';
                }
                if ($sdt === $taikhoan['sdt']) {
                    $errors['sdt'] = 'Số điện thoại đã được đăng ký';
                }
            }

            $_SESSION['error'] = $errors; // Lưu biến lỗi
            // Nếu không lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm

                $this->taikhoan->inserttaikhoan($ho_ten, $email, $sdt, $dia_chi, $mat_khau);
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
