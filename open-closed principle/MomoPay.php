<?php 
   
    class MomoPay extends Pay
    {
        protected $Pay;
        public function __construct(Pay $Pay){
            $this->Pay=$Pay;
        }
       public function StandardPay()
       {
           if($this->Pay->check_account()){
            echo $this->Pay->fees * 0.05;
           }
           else{
            echo" tai khoan cua ban khong du tien";

           }
       }

    }
?>