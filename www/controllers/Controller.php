<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
//require_once ('../config/App.php');
//global $smarty_conf;
require('/Users/k15125kk/college/websemi/projects/scheduler/www/libs/Smarty.class.php' );
class Controller{
    protected $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('/Users/k15125kk/college/websemi/projects/scheduler/www/views');
        $this->smarty->setCompileDir('/Users/k15125kk/college/websemi/projects/scheduler/templates_c');
    }

    public function GET(){}
    public function POST(){}
}