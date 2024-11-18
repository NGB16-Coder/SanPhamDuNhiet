<?php

class User
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $password)
    {
        try {
            $sql = "SELECT * FROM user WHERE email= :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            // var_dump($user);
            if ($email == "" || $password == "") {
                return "Vui lòng nhập đầy đủ email và mật khẩu!";
            } elseif (($email === $user['email']) && ($password === $user['password'])) {
                if ($user['role_id'] === 1) {
                    return $user['email']; // đăng nhập vào trang admin

                } else {
                    return 'Trang client'; // đăng nhập vào trang client
                }
            } else {
                return "Sai tài khoản hoặc mật khẩu!";
            }
        } catch (Exception $e) {
            echo 'Lỗi checkLogin() '.$e->getMessage();
            return false;
        }
    }

    public function insertUser($fullname, $email, $phone_number, $address, $password)
    {
        try {
            $sql = "INSERT INTO user(fullname, email, phone_number, address, password) 
                    VALUES (:fullname,:email,:phone_number,:address,:password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':fullname' => $fullname,
                ':email' => $email,
                ':phone_number' => $phone_number,
                ':address' => $address,
                ':password' => $password,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi insetUser() '.$e->getMessage();
        }
    }

    public function getAllUser()
    {
        try {
            $sql = "SELECT * FROM user";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllUser() '.$e->getMessage();
        }
    }
}
