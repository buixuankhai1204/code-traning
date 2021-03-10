<?php function get_products($id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_products`WHERE `id` = {$id}");
    $result['url']= "?mod=cart&controller=index&action=add&id={$id}";
    return $result;
}

?>