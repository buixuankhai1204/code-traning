<?php
class Manager implements Worker, ClientFacer {
    public  function takeBreak(){
        date_default_timezone_get("Asia/Ho_Chi_Minh");
        if(date("h:i:sa") == "12:00:00"){
            //code thong bao cho nhan viine cong ty
            echo"nghi giai lao 30'";
        }
    }
    public function timeGetPaid(){
        date_default_timezone_get("Asia/Ho_Chi_Minh");
        if(date("d")=="05"){
            //code thong bao  tra luong cho nhan vien
            echo "thong bao tra luong";
        }
    }
    public function callToClient($phoneNumber){
        echo "phone to number".$phoneNumber;
    }
    public function attendMeetings($phoneNumber){
        echo "send message to".$phoneNumber;
    }
}

?>