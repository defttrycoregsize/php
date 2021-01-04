    <?php
    //// CẤU HÌNH CÁC HẰNG SỐ ĐẠI DIỆN CHO CÁC ĐƯỜNG DẪN ĐÉN THƯ MỤC HỆ THỐNG VÀ MODULE ỨNG DỤNG
    define('PATH_SYSTEM',__DIR__.'/system');
    define('PATH_APPLICATION',__DIR__.'/admin');

    // CẤU HÌNH CONTROLLER VÀ ACTION MẶC ĐỊNH

    define('DEFAULT_CONTROLLER','index');
    define('DEFAULT_ACTION','index');

    //// XÂY DỰNG FILE BOOSTRAP

    // LẤY THÔNG SỐ Controller và Action trên URL

    $controller = empty($_GET['c']) ? DEFAULT_CONTROLLER : $_GET['c'];
    $action = empty($_GET['a']) ? DEFAULT_ACTION : $_GET['a'];

    // Chuyển ĐỔI TÊN Controller VÌ NÓ CÓ ĐỊNH DẠNG {Name}_Controller

    $controller = ucfirst(strtolower($controller)).'_Controller';

    // CHUYỂN ĐỔI TÊN Action VÌ NÓ CÓ ĐỊNH DẠNG {name}Action

    $action = strtolower($action).'Action';

    // INLCUDE Controller CHÍNH ĐỂ CÁC Controller CON KẾ THỪA

    include_once PATH_SYSTEM.'/core/Controller.php';

    //// KIỂM TRA FILE Controller CÓ TỒN TẠI KHÔNG

    if(!file_exists(PATH_APPLICATION.'/controllers'.$controller.'.php')){
        die('FILE Controller không tồn tại');
    }

    ////// NẾU TỒN TẠI THÌ GỌI FILE Controller vào

    require_once PATH_APPLICATION.'/controllers'.$controller.'.php';

    //// KIỂM TRA CLASS Controller có tồn tại hay không

    if(!class_exists($controller)){
        die(' CLASS Controller không tồn tại');
    }

    //// NẾU TÒN TẠI KHỞI TẠO Controller

    $controllerObject = new $controller();

    // KIỂM TRA ACTION CÓ TỒN TẠI KHÔNG

    if(!method_exists($controllerObject,$action)){
        die('Action không tồn tại');
    }

    //// GỌI TỚI ACTION (TRUY CẬP TỚI PHƯƠNG THỨC)

    $controllerObject->{$action}();


    ?>
