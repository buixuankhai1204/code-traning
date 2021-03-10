
<?php
get_header();

// show_array($_POST);  
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="post_title" id="title" value='<?php echo $list_post['post_title'] ?>'>
                        <p class="error"><?php if(isset($error['post_title'])) echo ($error['post_title']) ?></p>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="friend_url" id="slug" value='<?php echo $list_post['friend_url'] ?>'>
                        <p class="error"><?php if(isset($error['friend_url'])) echo ($error['friend_url']) ?></p>
                        <label for="desc">Mô tả</label>
                        <textarea name="category" id="desc" class="ckeditor" value=""><?php echo $list_post['category'] ?></textarea>
                        <p class="error"><?php if(isset($error['category'])) echo ($error['category']) ?></p>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="link_images" id="file" data-uri="?mod=post&action=upload" value="<?php echo $list_post['link_images'] ?>">
                            <input type="submit" name="Upload" value="Upload" id="upload_single_bt">
                            <img id="show_list_file" src="public/uploads/<?php echo $list_post['link_images'] ?>">
                            <div id="show_error"></div>
                        </div>
                        <label>Danh mục cha</label>
                        <select name="description">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="Điện thoại">Điện thoại</option>
                            <option value="thể thao">thể thao</option>
                            <option value="Chính trị">Chính trị</option>
                        </select>
                        <label for="admin_add">Người tạo</label>
                        <input type="text" name="admin_add" id="admin_add-name" value="<?php echo $list_post['admin_add'] ?>">
                        <p class="error"><?php if(isset($error['admin_add'])) echo ($error['admin_add']) ?></p>
                        <label for="date">Ngày tạo</label>
                        <input type="date" name="date" id="date" value="<?php echo $list_post['date'] ?>">
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();


?>