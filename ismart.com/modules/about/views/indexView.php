<?php
get_header();
// show_array($list_page);

?>
<html>
    <head>
        <title>Chi tiết</title>
        <meta charset="utf8"/>
    </head>
    <body>
    <div id="main-content-wp" class="detail-news-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-news-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $list_page['page_title'] ?></h3>
                </div>
                <div class="section-detail">
                    <p class="create-date"><?php echo $list_page['creat_at'] ?></p>
                    <div class="content-news">
                    <?php echo $list_page['page_content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php
get_footer();
//show_array($list_users);
?>