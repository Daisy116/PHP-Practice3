<?php

class App {
    
    public function __construct() {
        $url = $this->parseUrl();
        
        $controllerName = "{$url[0]}Controller";
        if (!file_exists("controllers/$controllerName.php"))
            return;
        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        $methodName = isset($url[1]) ? $url[1] : "index";
        if (!method_exists($controller, $methodName))
            return;
        unset($url[0]); unset($url[1]);
        $params = $url ? array_values($url) : Array();
        call_user_func_array(Array($controller, $methodName), $params);
    }
    
    public function parseUrl() {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");    // 把url最左邊的/去掉
            $url = explode("/", $url);    // 依/將字串拆解成陣列存放(例如陣列第一個是類別，陣列第二個是呼叫方法，後面存參數...)
            return $url;
        }
    }
    
}

?>