<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function my_autoload($class){
    include_once $class.'.php';
}
spl_autoload_register('my_autoload');
$position1 = PositionData::getInstance();
$data_arr = array();
if (!empty($data_arr)){
    $position1->addData($data_arr[0], $data_arr[1], $data_arr[2], $data_arr[3]);
}
var_dump($position1->listData());
