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
    
    load_view('index');
}

function addAction()
{
}

function editAction()
{
    
}