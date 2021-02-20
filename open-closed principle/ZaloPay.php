<?php 
    
    class ZaloPay extends Pay
    {
      protected $Pay;
      public function __construct(Pay $Pay){
          $this->Pay=$Pay;
      }
       public function StandardPay()
       {
          print_r($this->Pay);
         if($this->Pay->check_account()){
            echo $this->Pay->fees * 0.07;
           }
           else{
            echo" tai khoan cua ban khong du tien";

           }
       }

    }
?>