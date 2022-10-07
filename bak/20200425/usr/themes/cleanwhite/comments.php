<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="action-share bdsharebuttonbox">
  分享： 
  <a class="bds_qzone" data-cmd="qzone"></a>
  <a class="bds_tsina" data-cmd="tsina"></a>
  <a class="bds_weixin" data-cmd="weixin"></a>
  <a class="bds_tqq" data-cmd="tqq"></a>
  <a class="bds_sqq" data-cmd="sqq"></a>
  <a class="bds_renren" data-cmd="renren"></a>
  <a class="bds_douban" data-cmd="douban"></a>
  <a class="bds_fbook" data-cmd="fbook"></a> 
</div>
<div class="titlex" id="commentsx"> 
  <h3><?php _e('评论'); ?></h3> 
</div> 
<div id="comments">
  <?php $this->comments()->to($comments); ?>
  <?php if ($comments->have()): ?>
  <?php $comments->listComments(); ?>
  <?php endif; ?>
  <?php if($this->allow('comment')): ?>
  <div id="<?php $this->respondId(); ?>" class="respond">
    <div class="cancel-comment-reply">
    <?php $comments->cancelReply(); ?>
    </div>
    <div id="respond" class="no_webshot"> 
      <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
        <?php if($this->user->hasLogin()): ?>
        <p><?php _e('登录身份：'); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
        <div class="comt" style="margin-bottom: 20px;"> 
          <div class="comt-box"> 
            <textarea rows="3" cols="100%" name="text" id="comment" class="input-block-level comt-area" placeholder="让你的评论一针见血" tabindex="1" required ><?php $this->remember('text'); ?></textarea>
            <div class="comt-ctrl">
              <button type="submit" name="submit" id="submit" tabindex="5"><?php _e('提交评论'); ?></button>
            </div>
          </div>
        </div>
        <?php else: ?>
        <div class="comt"> 
          <div class="comt-box"> 
            <textarea rows="3" cols="100%" name="text" id="comment" class="input-block-level comt-area" placeholder="让你的评论一针见血" tabindex="1" required ><?php $this->remember('text'); ?></textarea>
            <div class="comt-ctrl">
              <button type="submit" name="submit" id="submit" tabindex="5"><?php _e('提交评论'); ?></button>
            </div>
          </div>
        </div>
        <div class="comt-comterinfo" id="comment-author-info">
          <ul>
            <li class="form-inline" style="margin-right:10px;">
              <label class="hide" for="author"><?php _e('昵称'); ?></label>
              <input type="text" name="author" id="author" class="ipt" value="<?php $this->remember('author'); ?>" required tabindex="2" placeholder="<?php _e('昵称'); ?>" />
            </li> 
            <li class="form-inline" style="margin-right:10px;">
              <label class="hide" for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
              <input type="email" name="mail" id="email" class="ipt" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> tabindex="3" placeholder="<?php _e('邮箱'); ?>" />
            </li> 
            <li class="form-inline">
              <label class="hide" for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
              <input type="text" name="url" id="url" class="ipt" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> tabindex="4" placeholder="<?php _e('网站'); ?>" />
            </li> 
          </ul>
        </div> 
        <?php endif; ?>
      </form>
    </div>
  </div>
  <?php else: ?>
  <h3><?php _e('评论已关闭'); ?></h3>
  <?php endif; ?>
</div>
