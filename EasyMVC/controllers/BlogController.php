<?php

class BlogController extends Controller {
    
    function index() {
        echo "home page of BlogController";
    }
    
    function list($num) {
        echo "參數是 $num";
    }
    
}

?>