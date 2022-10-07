<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    <div class="col-md-4 visible-md visible-lg"> 
      <section class="border margin-top-26"> 
        <div class="widget"> 
          <h3 class="title"><strong><?php _e('分类'); ?></strong></h3> 
          <ul class="nav-fenlei"> 
            <?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}" title="{description}">{name}</a> ({count})</li>'); ?>
          </ul>
        </div> 
      </section> 
      <section class="border margin-top-26"> 
        <div class="widget"> 
          <h3 class="title"><strong>标签</strong></h3> 
          <div class="nav-tag"> 
            <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 200))->to($tags); ?>  
            <?php while($tags->next()): ?>  
            <a rel="tag" href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
            <?php endwhile; ?>
          </div>
        </div> 
      </section>
      <section class="border margin-top-26">
        <div class="widget"> 
          <h3 class="title"><strong><?php _e('归档'); ?></strong></h3> 
          <ul class="nav nav-pills nav-stacked margin-top margin-bottom"> 
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
          </ul>
        </div> 
      </section> 
    </div>
  </div>
</div>