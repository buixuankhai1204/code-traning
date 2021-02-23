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
        public $type2;
        public $type3;
        public function __construct($type="",$type2="",$type3="")
        {
            $this->type=$type;
            $this->type2=$type2;
            $this->type3=$type3;
            $this->reset();
        }
        public function reset(){
            $this->FootballPlayer=new MalePlayer();
        }
        public function health(){
            $this->FootballPlayer->array[]="chỉ số sức khỏe phải trên 80"."<br>";
        }
        public function Skill(){
            $this->FootballPlayer->array[]="chỉ số kĩ thuật phải trên 70"."<br>";
        }
        public function age(){
            $this->FootballPlayer->array[]="độ tuổi của cầu thủ phải dưới 25 tuổi"."<br>";
        }
        public function height(){
            $this->FootballPlayer->array[]="chiều cao của cầu thur trên 180cm"."<br>";
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
            echo"cầu thủ được tuyển phải phải có ".implode(',', $this->array);
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
        public function buildDetail($type="",$type2="",$type3=""){
            if($type=="build CB"&&$type2=="build young"){
            echo "xây dựng cầu thủ vị trí CB và trẻ tuổi: "."<br>";
            $this->scout->health();
            $this->scout->height();
            $this->scout->age();

            }

            elseif($type=="build ST"){
                echo "xây dựng cầu thủ vị trí ST: ";
            $this->scout->Skill();
            $this->scout->height();
            }
            elseif($type2=="build young"){
                echo "xây dựng cầu thủ trẻ: ";
            $this->scout->age();
            $this->scout->health();
            }
            else{
                echo"khong tim thay yeu cau";
            }
        }
    }
    function ClientCode(manager $buildDetail){
        $buildMen=new ScoutMen("build CB","build young");
        $buildDetail->getBuild($buildMen);
        $buildDetail->buildDetail($buildMen->type,$buildMen->type2);
        $buildMen->getInfo()->list();



        $buildMen=new ScoutMen("build ST");
        $buildDetail->getBuild($buildMen);
        $buildDetail->buildDetail($buildMen->type);
        $buildMen->getInfo()->list();

        
        echo"build the football plaayer has heath"."<br>";
        $buildDetail->buildHeath();
        $buildMen->getInfo()->list();

        echo"build the football player has all paragram"."<br>";
        $buildDetail->buildAllParameter();
        $buildMen->getInfo()->list();
    }
    $manager=new manager();
    ClientCode($manager);
?>