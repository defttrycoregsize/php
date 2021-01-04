<?php
if(!defined('PATH_SYSTEM')){
    die('Bad Request');
}
class Index_Controller extends Controller{
    public function indexAction(){
        echo "Đây là trang index" ;
    }
}
?>
