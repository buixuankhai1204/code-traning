<?php
namespace RefactoringGuru\FactoryMethod\Conceptual;

abstract Class Logistics{
    abstract public function createTransport(): TranSport;
    public function test(){
        $item=$this->createTransport();
        $item->Deliver();
    }
}
class RoadLogictics extends Logistics{
    public function createTransport():TranSport{
        return new Truck();
    }
}
class SeaLogictics extends Logistics{
    public function createTransport():TranSport{
        return new Ship();
    }
}
interface TranSport{
    public function  Deliver():String;
}
Class Truck implements TranSport{
    public function Deliver():String{
        return"van chuyen duong bo";
    }
}
Class Ship implements TranSport{
    public function Deliver():String{
        return"van chuyen duong thuy";
    }
}
function ClientCode(Logistics $item){
    echo"task1";
    $item->test();
}
echo"dduowng thuy";
ClientCode(new SeaLogictics());
echo"dduowng bo";
ClientCode(new RoadLogictics());
