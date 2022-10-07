<?php
/**
 * 小墙- 用最简单的方法墙掉垃圾评论
 *
 * @package AntiSpam
 * @author willin kan
 * @version 1.0.5
 * @update: 2011.09.09
 * @link http://kan.willin.org/typecho/
 */
class AntiSpam_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive') ->beforeRender = array('AntiSpam_Plugin', 'field');
        Typecho_Plugin::factory('Widget_Feedback')->comment      = array('AntiSpam_Plugin', 'filter');

    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $action = new Typecho_Widget_Helper_Form_Element_Radio(
          'action', array(
            0 => '直接挡掉',
            1 => '标记为垃圾'
         ), 1,
          '遇到垃圾评论的处理方法');
        $form->addInput($action);

        $lang_check = new Typecho_Widget_Helper_Form_Element_Radio(
          'lang_check', array(
            0 => '任何语系都可以留下评论',
            1 => '只允许中文语系的评论'
         ), 0,
          '中文语系检查');
        $form->addInput($lang_check);

        $lang_action = new Typecho_Widget_Helper_Form_Element_Radio(
          'lang_action', array(
            0 => '直接挡掉',
            1 => '标记为垃圾',
            2 => '标记为待审核'
         ), 2,
          '非中文语系评论的处理方法', "
<script type='text/javascript'>
//<![CDATA[
window.onload = function(){
var lang_action = $$('.lang-action').setStyle('background','#E8EFD1'), action_id = lang_action.get('id');
if($('lang_check-0').get('checked')){lang_action.setStyles({'height':0,'opacity':0,'overflow':'hidden'})};
$('lang_check-0').addEvent('click',function(){easy.up(action_id)});
$('lang_check-1').addEvent('click',function(){easy.down(action_id)});

/* easy-slide for MooTools - by willin kan
 * @param array a = ['id_name'];
 */
easy = {
  _morph : function(a, x) {
    var l = a.length;
    for (i = 0; i < l; i++) {
      h = x ? 50 : 0; // height
      var fx = new Fx.Morph(a[i]);
      fx.start({'height': h, 'opacity': x});
    }
  }, // 有 3 個功能:

  up : function(a) {
    this._morph(a, 0);
  },

  down : function(a) {
    this._morph(a, 1);
  },

  toggle : function(a) {
    x = $(a[0]).getStyle('height').toInt() ? 0 : 1;
    this._morph(a, x);
  }
}

}
//]]>
</script>");
        $lang_action->setAttribute('class', 'lang-action typecho-option');
        $form->addInput($lang_action);

    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}


    /**
     * 设栏位
     *
     * @access public
     * @return void
     */
    public static function field()
    {
        if (Typecho_Widget::widget('Widget_Archive')->is('single') && !Typecho_Widget::widget('Widget_User')->hasLogin()) {
          ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])text([\"\'])(.+)/textarea>#",
          "textarea$1name=$2comment$3$4/textarea><textarea name=\"text\" cols=\"100%\" rows=\"4\" style=\"display:none\">spam</textarea>",$input);') );
        }

    }

    /**
     * 评论过滤器
     *
     * @access public
     * @return void
     */
    public static function filter($comment)
    {
        $config = Typecho_Widget::widget('Widget_Options')->plugin('AntiSpam');
        if (!Typecho_Widget::widget('Widget_User')->hasLogin()) {
            $w = Typecho_Request::getInstance()->comment;
            if (!empty($w) && $comment['text'] == 'spam') {
                $comment['text'] = Typecho_Common::stripTags($w);
                if ($config->lang_check && stripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'zh') === false) {
                    if (!$config->lang_action) {
                        throw new Typecho_Exception('Access Denied!');
                    } else {
                        $comment['text'] = "[ 小墙判断这是非中文语系的评论! ]\n" . $comment['text'];
                        $comment['status'] = $config->lang_action == 1 ? 'spam' : 'waiting';
                    }
                }
            } else {
                if ($config->action) {
                    $comment['text'] = "[ 小墙判断这是 Spam! ]\n" . $comment['text'];
                    $comment['status'] = 'spam';
                } else {
                    throw new Typecho_Exception('Spam Detected!');
                }
            }
        }
        return $comment;

    }

}
