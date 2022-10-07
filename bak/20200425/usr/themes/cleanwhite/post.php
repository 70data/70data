<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="container" id="body">
<div class="row">
<div class="col-md-8" id="main" role="main">
<article class="border margin-top-26">
  <div class="art-time">
    <a href=""><img src="<?php $this->options->themeUrl('img'); ?>/<?php echo $this->categories[0]['slug'] . '.png'; ?>" /></a>
  </div>
  <h3 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
  <ul class="post-meta list-unstyled">
    <li class="pull-left margin-right"><img src="<?php $this->options->themeUrl('img/time.png'); ?>" /><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
  </ul>
  <br />
  <ul class="post-meta list-unstyled">
    <li class="pull-left margin-right" style="margin-bottom:10px;"><img src="<?php $this->options->themeUrl('img/slug.png'); ?>" /><a href=""><?php $this->category(','); ?></a></li>
    <li class="pull-left margin-right" style="margin-bottom:10px;"><img src="<?php $this->options->themeUrl('img/note.png'); ?>" /><a href=""><?php $this->tags(' ', true, 'none'); ?></a></li>
  </ul>
  <div class="border-bottom clearfix"></div>
  <div class="post-content" itemprop="articleBody">
    <?php $this->content(); ?>
  </div>
  <ul class="post-near">
  <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
  <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
  </ul>
  <?php $this->need('comments.php'); ?>
</article>
</div>
<?php $this->need('sidebar.php'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>
