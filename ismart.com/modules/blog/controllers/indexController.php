<?php

function construct()
{
//    echo "DÙng chung, load đầu tiên";
load('helper', 'header-cart');

// load_model('index');
}

function indexAction()
{
    // $id = (int) $_GET['id'];
    // echo $_GET['slug'];
    // $list_page=get_list_detail($id);
    // $data['list_page']=$list_page;
    load_view('index');
}

function detailAction()
{
    load_view('detail');
  
}

function editAction()
{
    
}
