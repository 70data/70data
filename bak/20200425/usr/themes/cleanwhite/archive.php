<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container" id="body">
  <div class="row">
    <div class="col-md-8" id="main" role="main">
    <?php if ($this->have()): ?>
    <?php while($this->next()): ?>
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
        <?php $this->content(''); ?>
        </div>
        <div style="height: 40px;">
        <a itemtype="url" href="<?php $this->permalink() ?>" style="float: right;margin: 0px 20px 0px 0px;">阅读全文</a>
        <img src="<?php $this->options->themeUrl('img'); ?>/all.png" style="margin: 2px 10px 0px 0px;float: right;" />
        </div>
      </article>
    <?php endwhile; ?>
    <?php else: ?>
        <article class="post">
            <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
        </article>
    <?php endif; ?>
    <ol class="page-navigator">
      <?php $this->pageNav('&laquo;', '&raquo;'); ?>
    </ol>
    </div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>