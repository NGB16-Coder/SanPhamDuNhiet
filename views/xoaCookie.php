<?php

if (isset($_COOKIE['email']) || isset($_COOKIE['password'])) {
    setcookie("email", $email, time() - (86400 * 7));
    setcookie("password", $password, time() - (86400 * 7));
    echo '<script language="javascript">alert("Xóa thành công"); window.location="?act=dang-nhap";</script>';
} else {
    echo '<script language="javascript">alert("Không có tài khoản nào được lưu!");window.location="?act=dang-nhap";</script>';
}
