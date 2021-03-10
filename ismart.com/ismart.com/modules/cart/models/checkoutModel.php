<?php
    // function get_num_order_cart(){
    //     if (isset($_SESSION['cart'])) {
    //         return $_SESSION['cart']['info']['num_order'];
    //     }
    //     return '0';
    // }
    function check_out_item(){
        if(isset($_SESSION['cart'])) {
            return $_SESSION['cart']['buy'];
        }
        return '0';
    }
    function check_out_total(){
        if(isset($_SESSION['cart'])) {
            return $_SESSION['cart']['info'];
        }
        return '0';
    }
?>