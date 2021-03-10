<?php

function construct()
{
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'email');
}
function regAction()
{
    global $error, $username, $fullname, $password;
   
    if (isset($_POST['btn_reg'])) {
        $error = array();

        if (empty($_POST['username'])) {
            $error['username'] = 'bạn chưa nhập Tên đăng nhập';
        } else {
            if (!(strlen($_POST['username']) >= 6 && strlen($_POST['username']) <= 32)) {
                $error['username'] = "Bạn chưa nhập đủ số lượng kí tự";
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = 'Tên đăng nhập của bạn có số lượng kí tự từ 6 đến 32, có dấu gạch dưới, dấu chấm và có chữ số và kí tự';
                } else {
                    $username = $_POST['username'];
                }

            }
        }
        //KẾT THÚC THAO TÁC TRÊN USERNAME
        if (empty($_POST['email'])) {
            $error['email'] = 'bạn chưa số điện thoại';
        } else {
            if (!(strlen($_POST['email']) >= 6 && strlen($_POST['email']) <= 32)) {
                $error['email'] = "Bạn nhập Chưa đủ kí tự";
            } else {
                if (!is_email($_POST['email'])) {
                    $error['email'] = 'Email của bạn nhập sai!';
                } else {
                    $email = $_POST['email'];
                }

            }
        }
        //kết thúc thao tác trên email
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Bạn chưa nhập họ và tên';
        } else {
            $fullname = $_POST['fullname'];
        }
        // kết thúc thao tác trên fullname
        if (empty($_POST['password'])) {
            $error['password'] = 'Bạn chưa nhập mật khẩu';
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "Bạn chưa nhập đủ số lượng kí tự";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = 'Mật khẩu của bạn có số lượng kí tự từ 6 đến 32, có dấu gạch dưới, dấu chấm và có chữ số và kí tự';
                } else {
                    $password = md5($_POST['password']);
                }

            }
        }
        //KẾT THÚC THAO TÁC TRÊN PASSWORD

        if (empty($error)) {
            if (!user_exits($username, $email)) {
                $active_token = md5($username . time());
                $data = array(
                    'fullname' => $fullname,
                    'password' => $password,
                    'username' => $username,
                    'email' => $email,
                    'active_token' => $active_token,
                    'reg_date' => time()
                );
                add_users($data);
                $link_token=base_url("?mod=users&action=active&active_token={$active_token}");
                $content= "<p>Xin chào bạn A</p>
                <p>chào mừng bạn đã đến với khóa học</p>
                <p>bạn vui lòng click vào khóa học tại đây <a href='$link_token'>Đăng nhập</a></p>";
                redirect_to("?mod=users&action=login");
                echo send_mail('buixuankhai1204@gmail.com', 'Bùi Xuân Khải', "xin chào bạn", $content);
            } else {
                $error['account'] = ' Tên đăng nhập hoặc mật khẩu sai';

            }
        }
    }
    load_view('reg');
}

function activeAction()
{
    $token= $_GET['active_token'];
    
    if(check_token($token)){
        token($token);
        $link_login=base_url("?mod=users&action=login");
        echo"bạn đã xác thực thành công,click vào <a href='$link_login'>đây</a> để đăng nhập";
    }else{
        echo"link chuyển hướng của bạn bị lỗi hoặc link đã hết hạn sử dụng";
    }
}


function loginAction()
{
    if (isset($_POST['btn_reg'])) {
        global $error,$username,$password;
        $error = array();
    
        if (empty($_POST['username'])) {
            $error['username'] = 'bạn chưa nhập Tên đăng nhập';
        } else {
            if (!(strlen($_POST['username']) >= 6 && strlen($_POST['username']) <= 32)) {
                $error['username'] = "Bạn chưa nhập đủ số lượng kí tự";
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = 'Tên đăng nhập của bạn có số lượng kí tự từ 6 đến 32, có dấu gạch dưới, dấu chấm và có chữ số và kí tự';
                } else {
                    $username = $_POST['username'];
                }
    
            }
        }
        //KẾT THÚC THAO TÁC TRÊN USERNAME
    
        if (empty($_POST['password'])) {
            $error['password'] = 'Bạn chưa nhập mật khẩu';
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "Bạn chưa nhập đủ số lượng kí tự";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = 'Mật khẩu của bạn có số lượng kí tự từ 6 đến 32, có dấu gạch dưới, dấu chấm và có chữ số và kí tự';
                } else {
                    $password = md5($_POST['password']);
                }
    
            }
        }
        //KẾT THÚC THAO TÁC TRÊN PASSWORD
    
        if (empty($error)) {
            if (check_login($username, $password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                redirect('index.php');
            } else {
                $error['account'] = ' Tên đăng nhập hoặc mật khẩu sai';
            };
                if(isset($_POST['remember_me'])){
                    setcookie('is_login', true, time() + 3600);
                    setcookie('user_login', $username, time() + 3600);
                }
        }
    }
    load_view('login');
}

function editAction()
{
    $id = (int) $_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}

