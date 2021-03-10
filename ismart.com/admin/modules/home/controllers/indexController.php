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
    $role=get_role();
    if($role['role']==0){
        echo"bạn không được truy cập phần này,vui lòng quay trở lại";
    }else{
load_view('index'); 
    }
    
}

function addAction()
{
}

function editAction()
{
    
}