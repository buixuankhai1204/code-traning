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
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_title" id="product-name" value="<?php echo set_value('product_title') ?>">
                        <?php echo form_error('product_title') ?>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code" value="<?php echo set_value('product_code') ?>">
                        <?php echo form_error('product_code') ?>
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="product_price" id="price" value="<?php echo set_value('product_price') ?>">
                        <?php echo form_error('product_price') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="desc" value=""><?php echo set_value('product_desc') ?></textarea>
                        <?php echo form_error('product_desc') ?>
                        <label for="desc">cấu hình</label>
                        <textarea name="configuration" id="desc" class="ckeditor" value=""><?php echo set_value('configuration') ?></textarea>
                        <?php echo form_error('configuration') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                        <input type="file" name="product_thumb" id="file" data-uri="?mod=product&action=upload" >
                            <a id='upload_single_bt' name="Upload" value="Upload" href="">up load</a>
                            <div id="show_list_file">
                            <div id="show_error"></div>
                        </div><br>
                        <select name="description">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="Điện thoại">Điện thoại</option>
                            <option value="laptop">laptop</option>
                            <option value="tablet">tablet</option>
                        </select>
                        <label for="admin_add">Người tạo</label>
                        <input type="text" name="admin_add" id="admin_add-name" value="<?php echo set_value('admin_add') ?>">
                        <?php echo form_error('admin_add') ?>
                        <label for="date">Ngày tạo</label>
                        <input type="date" name="date" id="date" value="<?php echo set_value('date') ?>">
                        <?php echo form_error('date') ?>
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
