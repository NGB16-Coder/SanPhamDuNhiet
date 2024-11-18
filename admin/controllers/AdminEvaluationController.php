<?php

class AdminEvaluationController
{
    public $modelDanhGia;

    public function __construct()
    {
        $this->modelDanhGia = new AdminEvaluation();

    }
    public function listEvaluation()
    {

        $listEvaluation = $this->modelDanhGia->getAllEvaluation();
        require_once "./views/manageEvaluation/listEvaluation.php";

    }

    public function deleteEvaluation()
    {
        // Lấy ra thông tin đánh giá cần xóa
        $dg_id = $_GET['id'];

        if ($dg_id) {
            $this->modelDanhGia->deleteEvaluation($dg_id);
            header('location: '.BASE_URL_ADMIN.'?act=listEvaluation');
            exit();
        } else {
            die;
        }

    }
}
