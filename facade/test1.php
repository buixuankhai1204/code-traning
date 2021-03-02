<?php 
    
    class CSKHFacade{


        public $pay;
        public $historyCall;

        function __construct(
        Payfacade $pay=null, 
        HistoryCall $historyCall=null
        )
        {
            $this->pay = $pay ?: new Payfacade();
            $this->historyCall = $historyCall ?: new HistoryCall();
        }

        public function useCSKH(){
            if($this->historyCall==new HistoryCall())
            {
                $this->historyCall->timeCall();
                $this->historyCall->dateCall();
            }

            if($this->pay==new Payfacade())
            $this->pay->VinaPay();
            $this->historyCall->timeCall();
                $this->historyCall->dateCall();
        }
    }


    class Payfacade{
        public function ViettelPay(){

            echo"use pay at Viettel";
        }

        public function VinaPay()
        {
            echo "use pay at Vinaphone";
        }

        public function MobiPay(){
            echo"use pay at mobiphone";
        }
    }

    class HistoryCall{
        public function timeCall(){
            echo " time call 5 minute";
        }
        public function  dateCall(){
            echo" time call 3 day ago ";
        }
    }


    function clientCode(CSKHFacade $cSKHFacade){
        $cSKHFacade->useCSKH();
    }


    $userPay= new Payfacade();
    $userHistoryCall= new HistoryCall();

    $facade= new CSKHFacade($userPay,$userHistoryCall);

    clientCode($facade);

