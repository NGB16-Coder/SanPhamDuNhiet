<?php

class AdminEvaluationController
{
    public $modelevaluation;
 
    public function __construct()
    {
        $this->modelevaluation = new AdminEvaluation();
        
    }
    public function listEvaluation(){
        
            $listEvaluation = $this->modelevaluation->getAllEvaluation();
            require_once "./views/manageEvaluation/listEvaluation.php";
        
    }
   
    public function deleteEvaluation()
    {
        // Lấy ra thông tin danh mục cần xóa
        $dg_id = $_GET['id'];
       
        if ($dg_id) {
            $this->modelevaluation->deleteEvaluation($dg_id);
            header('location: '.BASE_URL_ADMIN.'?act=listEvaluation');
            exit();
        } else {
            die;
        }

    }
}