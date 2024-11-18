<?php

if (isset($_SESSION['user']) || isset($_SESSION['user_admin'])) {
    session_unset();
    session_destroy();
    header('location:'.BASE_URL.'?act=dang-nhap');
} else {
    header('location:'.BASE_URL);
}

