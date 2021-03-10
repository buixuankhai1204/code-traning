<?php

function add_users($data)

{
    return db_insert('tbl_users',$data);
}

function user_exits($username,$email)
{
    $check_users = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}' OR `username`='{$username}'");
    echo $check_users;
    if($check_users>0)
        return true;
    return false;
}
function token($token){
    return db_update ('tbl_users',array('is_active'=>1), "`active_token`='{$token}'");
}
function check_token($token){
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_token` = '{$token}' AND `is_active`='0'");
    if($check>0)
        return true;
    return false;
}
function check_login($username,$password){
    $check=db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' AND `password`='{$password}'");
    if($check>0)
    return true;
    return false;
}

