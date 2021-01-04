<?php
if(!defined('PATH_SYSTEM')){
    die('Bad Request');
}

class Controller{
    public function model($modelName){
        $modelName = ucfirst(strtolower($modelName));
        require_once PATH_APPLICATION.'/models/'.$modelName.'.php';
        $modelObject = new $modelName;
        return $modelObject;
    }

    public function view($view, $data=array()){
        require_once PATH_APPLICATION.'/views/'.$view.'.php';
    }
}
?>

