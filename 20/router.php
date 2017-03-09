<?php

function userInfo($params) {
    print_r($params);


}

class className {

    public function methodName($params) {
        echo '<pre>';
        print_r($params);
    }

}

    $router = [
        "/" => ["className", "methodName"],
        "/login" => "funcName",
        "/user/add" => "funcName",
        "/user/info/(\d+)" => "userInfo",
        "/logout" => function() {
            print_r("logout");
        }
    ];

    function router($router) {
        $url = $_SERVER['REQUEST_URI'];
        $is404 = true;

        foreach ($router as $urlTemlate => $code) {
            $regexp = "/^" . str_replace("/", "\\/", $urlTemlate) . "$/";
            if (preg_match($regexp, $url, $matches)) {
//                print_r($regexp);
//                echo '<pre>';
//                print_r($matches);
//                echo '<pre>';
                if (is_string($code) || (is_callable($code))) {
                    $code($matches);
                } elseif (is_array($code)) {
                    $code($matches);
                }
                $is404 = false;
            }
            if(1){
                
            }


            echo '<pre>';
            //print_r(gettype($code));
        }
    }

    router($router);

    // "^" . "/" . "$"