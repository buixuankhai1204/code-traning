<?php
function get_list_about($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_pages` WHERE `id` = {$id}");
    return $item;
}
