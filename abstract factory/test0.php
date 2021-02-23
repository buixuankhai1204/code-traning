<?php

namespace RefactoringGuru\Singleton\Conceptual;


interface FurnitureFactory{

     function createChair():AbstractChair;
     function createCoffeeTable():AbstractCoffeeTable;
}
Class VictorianFunitureFactory implements FurnitureFactory{
    public function createChair():AbstractChair{
        return new VictorianChair();
    }
    public function createCoffeeTable():AbstractCoffeeTable{
        return new VictorianCoffeeTable();

    }
    
}
Class ModernFunitureFactory implements FurnitureFactory{
    public function createChair():AbstractChair{
        return new ModernChair();
    }
    public function createCoffeeTable():AbstractCoffeeTable{
        return new ModernCoffeeTable();

    }
   
}
interface AbstractChair{
    function hasLegs();
    function putOn();
}
class VictorianChair implements AbstractChair{
    public function hasLegs(){
        echo"ghe thuoc Vitorian co 4 chan";
    }
    public function putOn(){
        echo"ghe thuoc Vitorian ngoi tren ghe";
    }
}
class ModernChair implements AbstractChair{
    public function hasLegs(){
        echo"ghe thuoc Modern khong co chan ";
    }
    public function putOn(){
        echo"ghe thuoc Modern ngoi tren ghe cua modern";
    }
}

interface AbstractCoffeeTable{
    function putOn();
    function hasLegs();
}
class VictorianCoffeeTable implements AbstractCoffeeTable{
    public function hasLegs(){
        echo"ban uong ca phe thuoc Vitorian co 4 chan";
    }
    public function putOn(){
        echo"ban uong ca phe thuoc Vitorian ngoi tren ban uong ca phe";
    }
}
class ModernCoffeeTable implements AbstractCoffeeTable{
    public function hasLegs(){
        echo"ban uong ca phe thuoc Modern co 4 chan";
    }
    public function putOn(){
        echo"ban uong ca phe thuoc Modern ngoi tren ban uong ca phe";
    }
}
interface AbstractSofa{
    function putOn();
    function hasLegs();
}
class VictorianSofa implements AbstractSofa{
    public function hasLegs(){
        echo"sofa thuoc Vitorian co 4 chan";
    }
    public function putOn(){
        echo"sofa thuoc Vitorian ngoi tren sofa";
    }
}
class ModernSofa implements AbstractSofa{
    public function hasLegs(){
        echo"sofa thuoc Modern co 4 chan";
    }
    public function putOn(){
        echo"sofa thuoc Modern ngoi tren sofa";
    }
}
function ClientCode(FurnitureFactory $factory){
    $chair=$factory->createChair();
    $CoffeeTable=$factory->createCoffeeTable();
    echo $chair->putOn() . "";
    echo $CoffeeTable->putOn() . "";
}
echo "Client: Testing client code with the first factory type:";
ClientCode(new VictorianFunitureFactory());


echo "Client: Testing the same client code with the second factory type:";
ClientCode(new ModernFunitureFactory());