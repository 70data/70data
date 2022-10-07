<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container" id="body"> 
    <div class="row">
        <div class="col-md-8" id="main" role="main"> 
            <div class="error-page">
                <h2 class="post-title">404 - <?php _e('Not Found'); ?></h2>
                <p><?php _e('你想查看的页面被小兔子当作胡萝卜吃掉了。。。'); ?></p>
            </div>
        </div>

<?php $this->need('sidebar.php'); ?>

    </div>
</div>

<?php $this->need('footer.php'); ?>
