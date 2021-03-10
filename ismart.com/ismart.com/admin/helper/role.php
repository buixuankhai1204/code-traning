<?php
 function get_role(){
    return db_fetch_row("SELECT `role` FROM `tbl_users` WHERE `username`='{$_SESSION['user_login']}'");
}
?>