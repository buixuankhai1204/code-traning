<?php

namespace RefactoringGuru\Singleton\Conceptual;
class Singleton{
        private static $instance=[];

        protected function __construct(){

        }
        
        public static function get_instance_logger(){

            $item=static::class;
            if(!isset(self::$instance[$item])){

                self::$instance[$item]=new static();
            }
            return self::$instance[$item];

        }
        public function someBusinessLogic(){
        
        }
}


class Logger extends Singleton{
    public function timeDateText(String $text){
        $date = date('Y-m-d');
        echo $date; 
        echo $date."\t".$text."\n";
    }
    public static function log(String $text):void{
        $logger= Logger::get_instance_logger();
        $logger->timeDateText($text);
    }
}
class Config extends Singleton{
    private $array=[];

    public function getValue(String $key):String{
        return $this->array[$key];
    }
    public function setValue(String $key, String $value){

        $this->array[$key]=$value;
    }
}
$logger1=Logger::get_instance_logger();
$logger2=Logger::get_instance_logger();
if($logger1==$logger2){
    echo"ok"."\n";
}else{
    echo "false";
}
Logger::log('hello');
$username="buixuankhai";
$password="password";
$config= Config::get_instance_logger();
$config->setValue('username',$username);
$config->setValue('password',$password);
$config2= Config::get_instance_logger();
if($username==$config2->getValue('username')&&$password==$config2->getValue('password')){
    Logger::log("ban da dang nhap thanh cong");
}else{
    Logger::log("ban da dang nhap that bai");
}
    Logger::log('bye');






