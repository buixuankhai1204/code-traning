<?php
function construct()
{
    load('helper', 'format');
    load('helper', 'redirect');
    load('helper', 'data');
    load('helper', 'session');
    load('helper', 'header-cart');
    load_model('index');
}

function indexAction()
{
    $role=get_role();
    echo $role['role'];
    // $data['list_buy'] = get_list_buy_cart();
    // $data['num_order'] = get_num_order_cart();
    load_view('index');
}
function listAction()
{
    // $data['list_buy'] = get_list_buy_cart();
    // $data['num_order'] = get_num_order_cart();
    load_view('list');
}
function detail_orderAction()
{
    // $data['list_buy'] = get_list_buy_cart();
    // $data['num_order'] = get_num_order_cart();
    load_view('detail_order');
}
// function usersAction()
// {
//     // $data['list_buy'] = get_list_buy_cart();
//     // $data['num_order'] = get_num_order_cart();
//     load_view('users');
// }


