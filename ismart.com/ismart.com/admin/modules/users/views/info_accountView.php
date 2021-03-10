<?php get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=reg" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?page=change_pass" title="">Đổi mật khẩu</a>
                </li>
                <li>
                    <a href="?mod=users&action=team" title="">Nhóm quản trị</a>
                </li>
                <li>
                    <a href="?mod=users&action=logout" title="">Thoát</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="fullname">Tên đầy đủ</label>
                        <input type="text" name="fullname" id="display-name"value="<?php echo $info_users['fullname'] ?>">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="admin" readonly="readonly" value="<?php echo $info_users['username'] ?>">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"  value="<?php echo $info_users['email'] ?> ">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone" id="tel"  value="<?php echo $info_users['phone'] ?>">
                        <label for="">Địa chỉ</label>
                        <input name="address" id="address"  value="<?php echo $info_users['address'] ?>"></input>
                        <button type="submit" name="btn-update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
?>

