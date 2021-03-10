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
    // $id = (int) $_GET['id'];
    // // echo $id;
    // $list_page=get_list_about($id);
    $data['list_post']=get_list_post();
    
    load_view('index',$data);
}

function addAction()
{
    
    global $post_title, $friend_url, $link_images,$category,$data;
    $error=array();
    if(isset($_POST['btn-submit'])){
        
        if (empty($_POST['post_title'])) {
            $error['post_title'] = 'Bạn chưa nhập tiêu đề bài viết';
        } else {
            $post_title = $_POST['post_title'];
        }
        //kết thúc tiêu đề
        if (empty($_POST['friend_url'])) {
            $error['friend_url'] = 'Bạn chưa nhập link thân thiện';
        } else {
            $friend_url = $_POST['friend_url'];
        }
        if (empty($_POST['category'])) {
            $error['category'] = 'Bạn chưa nhập mô tả';
        } else {
            $category = $_POST['category'];
        }
        if (empty($_POST['description'])) {
            $error['description'] = 'Bạn chưa chọn danh mục';
        } else {
            $description = $_POST['description'];
        }
        if (empty($_POST['link_images'])) {
            $error['link_images'] = 'Bạn chưa chọn hình ảnh';
        } else {
            $link_images = $_POST['link_images'];
        }
        if (empty($_POST['admin_add'])) {
            $error['admin_add'] = 'Bạn chưa nhập người tạo';
        } else {
            $admin_add = $_POST['admin_add'];
        }
        $date=$_POST['date'];
        if(empty($error)){
            $data = array(
                'post_title' => $post_title,
                'friend_url' => $friend_url,
                'category' => $category,
                'link_images' => $link_images,
                'admin_add' => $admin_add,
                'date' => $date,
                'description' => $description
            );
            add_post($data); 
            show_array($data_error['error']);
        }
        else{
            echo"chưa thêm được dữ liệu";
            
        }
        
    }
    $data_error=array(
        'error'=>$error
    );
    load_view('add',$data_error);
  
}

function editAction()
{
    
    global $post_title, $friend_url, $link_images,$category,$data,$description,$data;
    
    if(isset($_POST['btn-submit'])){
        $error=array();
        if (empty($_POST['post_title'])) {
            $error["post_title"] = 'Bạn chưa nhập tiêu đề bài viết';
        } else {
            $post_title = $_POST['post_title'];
        }
        //kết thúc tiêu đề
        if (empty($_POST['friend_url'])) {
            $error['friend_url'] = 'Bạn chưa nhập link thân thiện';
        } else {
            $friend_url = $_POST['friend_url'];
        }
        if (empty($_POST['category'])) {
            $error['category'] = 'Bạn chưa nhập mô tả';
        } else {
            $category = $_POST['category'];
        }
        if (empty($_POST['description'])) {
            $error['description'] = 'Bạn chưa chọn danh mục';
        } else {
            $description = $_POST['description'];
        }
        if (empty($_POST['link_images'])) {
            $error['link_images'] = 'Bạn chưa chọn hình ảnh';
        } else {
            $link_images = $_POST['link_images'];
        }
        if (empty($_POST['admin_add'])) {
            $error['admin_add'] = 'Bạn chưa nhập người tạo';
        } else {
            $admin_add = $_POST['admin_add'];
        }
        $date=$_POST['date'];
        if(empty($error)){
            $data = array(
                'post_title' => $post_title,
                'friend_url' => $friend_url,
                'category' => $category,
                'admin_add' => $admin_add,
                'date' => $date,
                'description' => $description,
                'link_images' => $link_images
            );
            update_post($data,$post_title);
            
        }
        else{
            echo"chưa thêm được dữ liệu"; 
        }
        
    }
    $id=$_GET['id'];
    echo $id;
    $data_error=array(
        'error'=>$error,
        'list_post'=>get_post_by_id($id)
    );
 
    load_view('edit',$data_error);
  
}   
function deleteAction()
{
    $id = (int) $_GET['id'];
    show_array($_POST['status']);
    update_delete_post($id);
    redirect('?mod=post&controller=index&action=index');
}
function delete_postAction()
{
    $data['list_delete_post']=get_list_delete_post();
    load_View('delete_post',$data);
}
function remove_postAction()
{
    $id = (int) $_GET['id'];
    update_remove_post($id);
    redirect('?mod=post&controller=index&action=delete_post');

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
