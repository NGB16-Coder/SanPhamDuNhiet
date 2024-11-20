<?php

class AdminCommentController
{
    public $modelcomment;
 
    public function __construct()
    {
        $this->modelcomment = new AdminComment();
        
    }
    public function listComment(){
        
            $listComment = $this->modelcomment->getAllComment();
            require_once "./views/manageComment/listComment.php";
        
    }
   
    public function deleteComment()
    {
        // Lấy ra thông tin danh mục cần xóa
        $bl_id = $_GET['id'];
       
        if ($bl_id) {
            $this->modelcomment->deleteComment($bl_id);
            header('location: '.BASE_URL_ADMIN.'?act=listComment');
            exit();
        } else {
            die;
        }

    }
}