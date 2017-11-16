<?php
require_once 'Controller.php';
error_reporting(E_ALL);
ini_set("display_errors", "On");

class hello{
    function __construct()
    {
    }

    public function GET($GET){
        include('views/hello.php');
        //echo "he";
    }
    public function POST($POST){
        echo "<h1>POST Method</h1>";
    }
}