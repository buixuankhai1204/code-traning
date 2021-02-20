<?php

class Developer implements Worker, Coder {
    public function task(){
        echo "we done the task about 1 year ";
    }
    public  function takeBreak(){
        date_default_timezone_get("Asia/Ho_Chi_Minh");
        if(date("h:i:sa") == "12:00:00"){
            //code thong bao cho nhan viine cong ty
            echo"nghi giai lao 30'";
        }
    }
    public function timeGetPaid(){
        if(date("d")=="05"){
            //code thong bao  tra luong cho nhan vien
            echo "thong bao tra luong";
        }
        else{
            echo"chua toi gio tra luong";
        }
    }
}
?>