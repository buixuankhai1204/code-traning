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
    <input type="@email" placeholder="email" id='email' value="<?php echo set_value('email') ?>"name='email'>
    <?php echo form_error('email') ?>
    <input type="text" placeholder="fullname" id='fullname' value="<?php echo set_value('fullname') ?>"name='fullname'>
    <?php echo form_error('fullname') ?>
    <input type="password" placeholder="Password" id='password' name="password" value="">
    <?php echo form_error('password') ?><br>
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