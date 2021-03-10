<?php

function construct()
{
//    echo "DÙng chung, load đầu tiên";
load_model('index');
load('helper', 'format');
    load('helper', 'redirect');
    load('helper', 'data');
    load('helper', 'session');
    load('helper', 'header-cart');

}

function indexAction()
{
    $id = (int) $_GET['id'];
    // echo $id;
    $list_page=get_list_about($id);
    $data['list_page']=$list_page;
    load_view('index',$data);
}

function addAction()
{
  
}

function editAction()
{
    
}
