<?php 
interface  builder{
    function reset();
    function buildStepA();
    function buildStepB();
    function buildStepC();
}
class ConcreteBuilder1 implements builder{

    private  $product;

    public function __construct()
    {
        $this->reset();
    }
    public function reset(){
        $this->product= new Product1();
    }

    public function buildStepA(){
        $this->product->array[]="buildStepA\n";

    }
    public function buildStepB(){
        $this->product->array[]="buildStepB\n";
    }
    public function buildStepC(){
        $this->product->array[]="buildStepC\n";
    }
    public function getResult():Product1{
       $result= $this->product;
       $this->reset();
       echo"<pre>";
       print_r($result) ;
       echo"</pre>";
       return $result;
    }
}
class ConcreteBuilder2 implements builder{

    private $product;

    public function __construct()
    {
        $this->reset();
    }
    public function reset(){
        $this->product= new Product1();
    }

    public function buildStepA(){
        $this->product->array[]="buildStepA for product\n";

    }
    public function buildStepB(){
        $this->product->array[]="buildStepB for product\n";
    }
    public function buildStepC(){
        $this->product->array[]="buildStepC for product\n";
    }
    public function getResult():Product1{
       $result= $this->product;
       $this->reset();
       return $result;
    }
}

class Director{

    public $builder;

    public function Builder(builder $builder){
            $this->builder=$builder;
    }
    public function buildMinimalViableProduct(): void
    {
        $this->builder->buildStepA();
    }

    public function buildFullFeaturedProduct(): void
    {
        $this->builder->buildStepA();
        $this->builder->buildStepB();
        $this->builder->buildStepC();
    }
}
class Product1{
    public $array=[];
    public function list(){
    echo"product thuoc".implode(', ', $this->array)."\n";
    
    }
}

function ClientCode(Director $director){
    $builder= new ConcreteBuilder1();
    $director->Builder($builder);
    echo"product1 for build step A: ";
    $director->buildMinimalViableProduct();
    $builder->getResult()->list();
    echo"product1 for  build all step: ";
    $director->buildFullFeaturedProduct();
    $builder->getResult()->list();
    echo "Custom product:\n";
    $builder->buildStepA();
    $builder->buildStepB();
    $builder->getResult()->list();
}

$director = new Director();
clientCode($director);
?>