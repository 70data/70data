<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
 <head> 
<meta charset="UTF-8" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" /> 
<meta name="renderer" content="webkit" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
<title>
<?php $this->archiveTitle(array(
    'category'  =>  _t(' %s '),
    'search'    =>  _t(' %s '),
    'tag'       =>  _t(' %s '),
    'author'    =>  _t('%s ')
    ), '', ' - '); ?>
<?php $this->options->title(); ?>
</title> 
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.css'); ?>"> 
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/main.css'); ?>"> 
<!--[if lt IE 9]>
<script src="<?php $this->options->themeUrl('js/html5.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/respond.min.js'); ?>"></script>
<![endif]--> 
<meta name="keywords" content="千夜" /> 
<meta name="description" content="千夜" /> 
<?php $this->header(); ?>
</head> 
<body> 
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation"> 
  <div class="container"> 
    <div class="row">  
      <div class="navbar-header col-md-1"> 
        <a class="navbar-brand" href="<?php $this->options->logoUrl() ?>">千&nbsp;夜</a> 
      </div> 
      <div class="collapse navbar-collapse col-md-5 margin-left"> 
        <ul class="nav navbar-nav"> 
          <li <?php if($this->is('index')): ?> class="active"<?php endif; ?>><a href="<?php $this->options->siteUrl() ?>">首页</a></li> 
          <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
          <?php while($pages->next()): ?>
          <li <?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
          <?php endwhile; ?>
        </ul> 
      </div> 
      <div class="col-md-4 navbar-right nopadding visible-md visible-lg"> 
        <form class="navbar-form margin-top" method="post" action="./" role="search"> 
          <div class="input-group"> 
            <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label> 
            <input type="text" name="s" class="form-control" placeholder="<?php _e('输入关键字搜索'); ?>" /> 
            <span class="input-group-btn"> 
              <button class="btn btn-default" type="submit"><?php _e('搜索'); ?></button> 
            </span> 
          </div> 
        </form> 
      </div> 
    </div> 
  </div> 
</nav> 