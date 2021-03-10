<?php
function add_post($data){
    return db_insert('tbl_post',$data);
}
function get_list_post(){
    $result = db_fetch_array("SELECT * FROM `tbl_post`");
    $list_item= array();
    foreach($result as $item){
        $item['delete_url']="?mod=post&action=delete&id={$item['post_id']}";
        $item['edit_url']="?mod=post&action=edit&id={$item['post_id']}";
        $item['remove_url']="?mod=post&action=remove_post&id={$item['post_id']}";
        $list_item[] = $item;
    }
    return $list_item;
}
function get_post_by_id($id){
    $item = db_fetch_row("SELECT * FROM `tbl_post` WHERE `post_id` = {$id}");
    return $item;
}
function update_post($data,$post_title){
        db_update ('tbl_post',$data ,"`post_title`='{$post_title}'");
    }
    function update_delete_post($id){
        return db_update ('tbl_post',array('is_active'=>0,'status'=>'đã xóa'), "`post_id`='{$id}'");
    }
    function get_list_delete_post(){
        $result = db_fetch_array("SELECT * FROM `tbl_post` WHERE `is_active`='0'");
        $list_item= array();
        foreach($result as $item){
        $item['delete_url']="?mod=post&action=delete&id={$item['post_id']}";
        $item['edit_url']="?mod=post&action=edit&id={$item['post_id']}";
        $item['remove_url']="?mod=post&action=remove_post&id={$item['post_id']}";
        $list_item[] = $item;
    }
    return $list_item;
    }
    function update_remove_post($id){
        return db_update ('tbl_post',array('is_active'=>2,'status'=>'hoạt động'), "`post_id`='{$id}'");
    }

