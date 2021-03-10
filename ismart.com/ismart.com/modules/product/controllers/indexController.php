<?php

function construct()
{
//    echo "DÙng chung, load đầu tiên";
load('helper', 'format');
    load('helper', 'redirect');
    load('helper', 'data');
    load('helper', 'session');
    load('helper', 'header-cart');

}

function indexAction()
{
//     load_model('index');
//    $id = (int) $_GET['id'];
//     $list_products = get_list_products($id);
//     $list_products_info_cart = get_list_products_info_cart($id);
// //    show_array($list_comment);
// $data['list_products'] = $list_products;
// $data['list_products_info_cart'] = $list_products_info_cart;
load_view('index');

}

function detailAction()
{
    // load_model('detail');
    // // load('helper', 'data');
    // $id = (int) $_GET['id'];
    // $list_products=get_products($id);
    // // show_array($list_products); 
    // $data['list_products']= $list_products;
    load_view('detail');
}

function editAction()
{
    $id = (int) $_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}
