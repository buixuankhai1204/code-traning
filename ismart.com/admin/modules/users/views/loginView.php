
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/login.css" type="text/css">
    <link rel="stylesheet" href="public/css/main.css"type="text/css">
</head>
<body>
    <style>
        p.error{
            color: red;
            text-align: left;
            display: inline-block;
            margin: 0px;
        }
    </style>
    <div id="wrapper">
    <div id="content">
        <h1>login</h1>
    <form action="" method="POST">

    <input type="text" placeholder="Username" id='username' value="<?php echo set_value('username') ?>"name='username'>
    <?php echo form_error('username') ?>
    <input type="password" placeholder="Password" id='password' name="password" value="">
    <?php echo form_error('password') ?><br>
    <input type="checkbox" name='remember_me' id='remember_me'>
    <label for="remember_me">Ghi nhớ đăng nhập</label>
    <input class="submit" type="submit" id="reg" name="btn_reg" value="Đăng Kí">
    <?php echo form_error('account') ?>
    <div class="forget_password">
        <a href="">Quên mật khẩu?</a>
    </div>
    </form>
    </div>
    </div>


</body>
</html>
<?php
get_footer();
?>