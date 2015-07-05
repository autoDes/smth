<?php
class PositionData{
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
    public function addData($u_id, $longitude, $latitude, $accuracy){
        $db = Db::getInstance();
        return $db->query("INSERT INTO position VALUES(null, '$u_id', '$longitude', '$latitude', '$accuracy')");
    }
    public function listData(){
        $db = Db::getInstance();
        $arr = $db->query("SELECT * FROM position");
        return $arr;
    }
}