<?php
    function is_username($username){
        $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
        if(!preg_match($partten,$_POST['username'],$matchs))
        return false;
        return true;
    };
    function is_password($password)
    {
        $partten1 = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        if (!preg_match($partten1, $_POST['password'], $matchs)) {
            return false;
        }
    
        return true;
    };
    function is_email($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return false;
        }
        
        return true;
    };
    function form_error($label_field){
        global $error;
        if(isset($error[$label_field])) return "<p class='error'> {$error[$label_field]}</p>";
    };
    function set_value($label_field){
        global $$label_field;
        if(isset($$label_field)) return $$label_field;
    };
    function redirect_to($url){
        if(!empty($url))
            header("Location: {$url}");
            return false;
    }
    function is_phone($phone)
{
    $partten2 = "/^(09|08|01[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($partten2, $_POST['phone'], $matchs)) {
        return false;
    }

    return true;
};
?>
    