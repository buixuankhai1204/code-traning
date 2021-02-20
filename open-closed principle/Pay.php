<?php 
    
class Pay{
    protected $fees;
    protected $name_pay;
    protected $my_money;
 
    public function __construct($fees,$name_pay,$my_money){
        $this->fees=$fees;
        $this->name_pay=$name_pay;
        $this->my_money=$my_money;
    }
    public function StandardPay(){
        return "15.000vnd";
    }
    public function check_account(){
            if(($this->fees)>($this->my_money))
                return false;
                return true;
    }
    public function check_type(){
        if ($this->name_pay=="momo") {
            $item= new Pay($this->fees,'momo',$this->my_money);
            $item1=new MomoPay($item);
            echo $item1->StandardPay();
        }
        elseif($this->name_pay=="zalo"){
            $item= new Pay($this->fees,'zalo',$this->my_money);
            $item1=new ZaloPay($item);
            echo $item1->StandardPay();
        }
        else{
            $this->StandardPay();
        }
}
    }
?>