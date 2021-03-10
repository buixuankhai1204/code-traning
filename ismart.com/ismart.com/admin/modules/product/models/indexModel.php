<?php

function add_product($data){
    return db_insert('tbl_product',$data);
}
function get_list_product(){
    $result = db_fetch_array("SELECT * FROM `tbl_product`");
    $list_item=array();
    foreach($result as $item){
        $item['delete_url']="?mod=product&action=delete&id={$item['product_id']}";
        $item['edit_url']="?mod=product&action=edit&id={$item['product_id']}";
        $list_item[] = $item;
    }
    return $list_item;
}
    function get_product_by_id($id){
        $item = db_fetch_row("SELECT * FROM `tbl_product` WHERE `product_id` = {$id}");
        return $item;
    }
    function update_product($data,$product_title){
        db_update ('tbl_product',$data ,"`product_title`='{$product_title}'");
    }
    function update_delete_product($id){
        return db_update ('tbl_product',array('is_active'=>0,'status'=>'đã xóa'), "`product_id`='{$id}'");
    }
    function get_list_delete_product(){
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `is_active`='0'");
        $list_item= array();
        foreach($result as $item){
        $item['delete_url']="?mod=product&action=delete&id={$item['product_id']}";
        $item['edit_url']="?mod=product&action=edit&id={$item['product_id']}";
        $item['remove_url']="?mod=product&action=remove_product&id={$item['product_id']}";
        $list_item[] = $item;
    }
    return $list_item;
    }
    function update_remove_product($id){
        return db_update ('tbl_product',array('is_active'=>2,'status'=>'hoạt động'), "`product_id`='{$id}'");
    }

