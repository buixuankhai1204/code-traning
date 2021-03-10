<?php

function construct()
{
   // load('helper', 'products');
   load('helper', 'format');
   load('helper', 'redirect');
   load('helper', 'data');
   load('helper', 'session');
   load('helper', 'header-cart');;

}

function indexAction()
{
    // load_model('index');
    // $data['list_mobile'] = get_list_product_by_cat_id(2);
    // $data['list_macbook'] = get_list_product_by_cat_id(1);
    // $data['list_tablet'] = get_list_product_by_cat_id(3);
    // $data['info_cat_mobile'] = get_info_cat(1);
    // $data['info_cat_macbook'] = get_info_cat(2);
    // $data['info_cat_tablet'] = get_info_cat(3);
    // $data['num_order'] = get_num_order_cart();
    load_view('index');
}

function addAction()
{
}

function editAction()
{
    
}