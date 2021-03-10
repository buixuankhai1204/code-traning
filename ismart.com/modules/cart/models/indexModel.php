<?php

function get_list_product_by_cat_id($cat_id)
{

    $list_product = db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = $cat_id");
    $list_item = array();
    foreach ($list_product as $item) {
        if ($item['cat_id'] == $cat_id) {
            $item['url'] = "?mod=product&controller=index&action=detail&id={$item['id']}";
            $list_item[] = $item;
        }
    }
    return $list_item;
}
function add_cart_buy($id)
{
    $item = get_list_product_by_cat_id($id);
    $qty = 1;
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $id,
        'product_title' => $item['product_title'],
        'price' => $item['price'],
        'qty' => $qty,
        'sub_total' => $qty * $item['price'],
        'product_thumb' => $item['product_thumb'],
        'code' => $item['code'],
        'url' => "?mod=product&controller=index&action=detail&id={$id}", 
    );
    update_info_cat(); 
}

function update_info_cat()
{
    if(isset($_SESSION['cart'])){
        $num_order = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order += $item['qty'];
            $total += $item['price'] * $item['qty'];
        }
        $_SESSION['cart']['info'] = array(
            'num_order' => $num_order,
            'total' => $total,
        );
    }
    
}
function get_list_buy_cart()
{
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $item['url_delete_cart'] = "?mod=cart&controller=index&action=delete&id={$item['id']}"; //'url' => "?mod=cart&act=delete&id={$id}"
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}
function get_total_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return 0;
}

function delete_cart($id)
{
    if (isset($_SESSION['cart'])) {
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cat();
        } else {
            unset($_SESSION['cart']);
        }
    }
}
function update_cart($qty)
{
    foreach ($qty as $id => $new_qty) {
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
    }
    update_info_cat();
}


function get_info_cat($cat_id)
{
    $list_product_cat = db_fetch_array("SELECT * FROM `tbl_product_cat` WHERE `id` = $cat_id");
    $list_product_cat['url'] = "?mod=product&controller=index&action=index&cat_id={$cat_id}";
    return $list_product_cat;
}
function get_products($id)
{

    $list_product = db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = $id");
    $list_product['url'] = "?mod=cart&controller=index&action=add&id={$id}";
    return $list_product;
}


