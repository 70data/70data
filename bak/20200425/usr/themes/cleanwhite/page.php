<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="container" id="body"> 
<div class="row">
<div class="col-md-8" id="main" role="main"> 
<article class="border margin-top-26"> 
  <h3 class="post-title" itemprop="name headline" style="margin-left: 20px;"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3> 
  <ul class="post-meta list-unstyled" style="margin-left: 25px;margin-bottom: 20px;"> 
    <li class="pull-left margin-right"><img src="<?php $this->options->themeUrl('img/time.png'); ?>" /><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>  
  </ul> 
  <br />
  <div class="border-bottom clearfix"></div> 
  <div class="post-content" itemprop="articleBody"> 
    <?php $this->content(); ?>
  </div>
  <?php $this->need('comments.php'); ?> 
</article>
</div>
<?php $this->need('sidebar.php'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>