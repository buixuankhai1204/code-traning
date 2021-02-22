<?php

    interface scout{
        function health();
        function Skill();
        function age();
        function height();
    }
    Class ScoutMen implements scout{
        private $FootballPlayer;
        public $type;
        public function __construct($type)
        {
            $this->type=$type;
            $this->reset();
        }
        public function reset(){
            $this->FootballPlayer=new MalePlayer();
        }
        public function health(){
            $this->FootballPlayer->array[]="chỉ số sức khỏe phải trên 80"."\n";
        }
        public function Skill(){
            $this->FootballPlayer->array[]="chỉ số sức khỏe phải trên 70"."\n";
        }
        public function age(){
            $this->FootballPlayer->array[]="độ tuổi của cầu thủ phải dưới 25 tuổi"."\n";
        }
        public function height(){
            $this->FootballPlayer->array[]="chiều cao của cầu thur trên 180cm"."\n";
        }
        public function getInfo(){
            $result=$this->FootballPlayer;
            $this->reset();
            return $result;
        }
    }
    class MalePlayer{
        public $array=[];
        public function list(){
            echo"cầu thủ được tuyển phải phải có ".implode(', ', $this->array);
            echo "\n";
        }
    }


    class manager {
        public $scout;
        public $type;
        public function getBuild(scout $scout){
            $this->scout=$scout;
        }
        public function getType(ScoutMen $ScoutMen){
            $this->type=$ScoutMen;
        }
        public function buildHeath(){
            $this->scout->health();
        }
        public function buildAllParameter(){
            $this->scout->health();
            $this->scout->skill();
            $this->scout->age();
            $this->scout->height();
        }
        public function buildDetail($type){
            if($type=="build CB"){
                echo "xây dựng cầu thủ vị trí CB: ";
            $this->scout->health();
            $this->scout->height();
            }

            elseif($type=="build ST"){
                echo "xây dựng cầu thủ vị trí ST: ";
            $this->scout->Skill();
            $this->scout->height();
            }
            elseif($type=="build young"){
                echo "xây dựng cầu thủ trẻ: ";
            $this->scout->age();
            $this->scout->health();
            }
            else{
                echo"error";
            }
        }
    }
    function ClientCode(manager $buildDetail){
        $buildMen=new ScoutMen("build ST");
        $buildDetail->getBuild($buildMen);
        
        $buildDetail->buildDetail($buildMen->type);
        $buildMen->getInfo()->list();
        echo"build the football player has heath"."\n";
        $buildDetail->buildHeath();
        $buildMen->getInfo()->list();

        echo"build the football player has all paragram"."\n";
        $buildDetail->buildAllParameter();
        $buildMen->getInfo()->list();
    }
    $manager=new manager();
    ClientCode($manager);
?>