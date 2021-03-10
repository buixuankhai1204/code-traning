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
    $data['list_product']=get_list_product();
    load_view('index',$data);

}
// function addAction()
// {

// load_view('add');

// }
function listAction()
{

load_view('list');

}
function editAction()
{   
    
    global $product_title,$product_thumb, $product_desc, $product_price, $product_code,$configuration,$admin_add,$date,$data;
    if(isset($_POST['btn-submit'])){
        $error=array();
        if (empty($_POST['product_title'])) {
            $error['product_title'] = 'Bạn chưa nhập tên sản phẩm';
        } else {
            $product_title = $_POST['product_title'];
        }
        //kết thúc tiêu đề
        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = 'Bạn chưa nhập chi tiết sản phẩm';
        } else {
            $product_desc = $_POST['product_desc'];
        }
        if (empty($_POST['product_price'])) {
            $error['product_price'] = 'Bạn chưa nhập giá tiền sản phẩm';
        } else {
            $product_price = $_POST['product_price'];
        }
        if (empty($_POST['product_code'])) {
            $error['product_code'] = 'Bạn chưa nhập mã sản phẩm';
        } else {
            $product_code = $_POST['product_code'];
        }
        if (empty($_POST['configuration'])) {
            $error['configuration'] = 'Bạn chưa nhập cấu hình';
        } else {
            $configuration = $_POST['configuration'];
        }
        if (empty($_POST['admin_add'])) {
            $error['admin_add'] = 'Bạn chưa nhập người tạo';
        } else {
            $admin_add = $_POST['admin_add'];
        }
        if (empty($_POST['product_thumb'])) {
            $error['product_thumb'] = 'Bạn chưa chọn hình ảnh';
        } else {
            $product_thumb = $_POST['product_thumb'];
        }
        $date=$_POST['date'];
        if(empty($error)){
            $data = array(
                'product_title' => $product_title,
                'product_desc' => $product_desc,
                'product_price' => $product_price,
                'product_code' => $product_code,
                'product_thumb' => $product_thumb,
                'admin_add' => $admin_add,
                'date' => $date,
                'configuration' => $configuration
            );
            update_product($data,$product_title);
            
        }
        else{
            echo"chưa thêm được dữ liệu"; 
        }
        
    }
     
    $id=$_GET['id'];
    echo $id;
    $data['list_product']=get_product_by_id($id);
    load_view('edit',$data);
  
}
function addAction()
{
    
    global $product_title, $product_desc, $product_price, $product_code,$configuration,$data,$admin_add,$date,$product_thumb,$description;
    if(isset($_POST['btn-submit'])){
        $error=array();
        if (empty($_POST['product_title'])) {
            $error['product_title'] = 'Bạn chưa nhập tên sản phẩm';
        } else {
            $product_title = $_POST['product_title'];
        }
        //kết thúc tiêu đề
        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = 'Bạn chưa nhập chi tiết sản phẩm';
        } else {
            $product_desc = $_POST['product_desc'];
        }
        if (empty($_POST['product_price'])) {
            $error['product_price'] = 'Bạn chưa nhập giá tiền sản phẩm';
        } else {
            $product_price = $_POST['product_price'];
        }
        if (empty($_POST['product_code'])) {
            $error['product_code'] = 'Bạn chưa nhập mã sản phẩm';
        } else {
            $product_code = $_POST['product_code'];
        }
        if (empty($_POST['configuration'])) {
            $error['configuration'] = 'Bạn chưa nhập cấu hình';
        } else {
            $configuration = $_POST['configuration'];
        }
        if (empty($_POST['admin_add'])) {
            $error['admin_add'] = 'Bạn chưa nhập người tạo';
        } else {
            $admin_add = $_POST['admin_add'];
        }
        if (empty($_POST['product_thumb'])) {
            $error['product_thumb'] = 'Bạn chưa chọn hình ảnh';
        } else {
            $product_thumb = $_POST['product_thumb'];
        }
        if (empty($_POST['description'])) {
            $error['description'] = 'Bạn chưa chọn danh mục';
        } else {
            $description = $_POST['description'];
        }
        $date=$_POST['date'];
        if(empty($error)){
            $data = array(
                'product_title' => $product_title,
                'product_desc' => $product_desc,
                'product_price' => $product_price,
                'product_code' => $product_code,
                'product_thumb' => $product_thumb,
                'admin_add' => $admin_add,
                'date' => $date,
                'configuration' => $configuration,
                'description' => $description
            );
            add_product($data);
            
        }
        else{
            echo"chưa thêm được dữ liệu";
        }
        
    }
     
    // show_array($_POST);
    load_view('add');
  
}
function  uploadAction()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Bước 1: Tạo thư mục lưu file
        $error = array();
        $target_dir="public/uploads/";
        $target_file = $target_dir . basename($_FILES['file']['name']);
        // Kiểm tra kiểu file hợp lệ
        $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
            $error['file'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
        }
        //Kiểm tra kích thước file
        $size_file = $_FILES['file']['size'];
        if ($size_file > 5242880) {
            $error['file'] = "File bạn chọn không được quá 5MB";
        }
    // Kiểm tra file đã tồn tại trê hệ thống
        if (file_exists($target_file)) {
            $error['file'] = "File bạn chọn đã tồn tại trên hệ thống";
        }
    //
        if (empty($error)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $flag = true;
                echo json_encode(array('status' => 'ok','file_path' => $target_file));
            } else {
                echo json_encode(array('status' => 'error'));
            }
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
   
}
function deleteAction()
{
    $id = (int) $_GET['id'];
    update_delete_product($id);
    
    redirect('?mod=product&controller=index&action=index');
}
function delete_productAction()
{
    $data['list_delete_product']=get_list_delete_product();
    load_View('delete_product',$data);

}
function remove_productAction()
{
    $id = (int) $_GET['id'];
    update_remove_product($id);
    redirect('?mod=product&controller=index&action=delete_product');

}
