<?php
class Db {
    private static $_instance = null;
    private function __construct() {}
    protected function __clone (){}
    public static function getInstance (){
        if (is_null(self::$_instance)){
            return self::$_instance = new self();
        }else{
            return self::$_instance;
        }
    }
    
    public function query ($str_query){
        $setting = parse_ini_file('database.ini');
        $mysqli = new mysqli($setting['host'], $setting['name'], $setting['password'], $setting['nameDatabase']);
        $mysqli->set_charset("utf8");
        $typeInquiry = explode(" ", $str_query);
        //проверка на select
        if($typeInquiry['0']=="SELECT"||$typeInquiry['0']=="select"||$typeInquiry['0']=="Select"){
            $res = $mysqli->query($str_query);
            $arrayDB=array();
            while($row = mysqli_fetch_assoc($res)) {
                array_push($arrayDB, $row);
            }
            return json_encode($arrayDB);
        }else{
            $res = $mysqli->query($str_query);
        }
    }
}