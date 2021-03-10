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
    $data['list_buy'] = get_list_buy_cart();
    $data['num_order'] = get_num_order_cart();
    load_view('index', $data);
}

function addAction()
{
    // $id = (int) $_GET['id'];
    // add_cart_buy($id);
    $id = (int) $_GET['id'];
    echo $id;
    add_cart_buy($id);
    redirect('gio-hang.html');

}

function deleteAction()
{
    $id = (int) $_GET['id'];
    delete_cart($id);
    redirect('?mod=cart&controller=index&action=index');

}
function delete_allAction()
{
    $id = (int) $_GET['id'];
    delete_cart($id);
    redirect('?mod=cart&controller=index&action=index');
}

function ajaxAction()
{
    load_model('ajax');
}
function editAction()
{
}

function checkoutAction()
{
    load_model('checkout');
    $data['num_order'] = get_num_order_cart();
    $data['check_item'] = check_out_item();
    $data['check_total'] = check_out_total();
    load_view('checkout', $data);
}
