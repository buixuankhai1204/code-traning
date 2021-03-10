<?php
$id=$_POST['id'];
$qty=$_POST['qty'];
$price=$_SESSION['cart']['buy'][$id]['price'];
//cập nhật lại giá của từng sản phẩm
$sub_total= $price*$qty;
//cập nhật lại số lượng của từng sản phẩm
$_SESSION['cart']['buy'][$id]['qty']=$qty;
$_SESSION['cart']['buy'][$id]['sub_total']=$sub_total;//cập nhật lại tổng tiền
update_info_cat();
$total=$_SESSION['cart']['info']['total'];//cập nhật tại tổng tiền
$num_total=$_SESSION['cart']['info']['num_order'];//cập nhật lại tổng số lượng

$result= array(
    'sub_total' => currency_format($sub_total),
    'total' => currency_format($total),
);
echo json_encode($result);
