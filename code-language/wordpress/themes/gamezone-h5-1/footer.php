<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<?php if(!is_home()) { ?>
<div class="clearfix"></div>
</div>
<!-- #main -->
</div>
<!-- #page -->
<?php } ?>


<div id="h5-footer">
  <div class="h5-footer"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo"><img src="http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/logo-h5.png"></a>
    <div class="footer-link">
      <p class="footer-link-top"><a href="http://h5.appgame.com/">首页</a><a href="http://h5.appgame.com/category/arcade/">街机</a><a href="http://h5.appgame.com/category/action/">动作</a><a href="http://h5.appgame.com/category/sports/">运动</a><a href="http://h5.appgame.com/category/shooting/">射击</a><a href="http://h5.appgame.com/category/chess/">棋牌</a><a href="http://h5.appgame.com/category/puzzle/">益智</a><a href="http://h5.appgame.com/category/role/">角色扮演</a></p>
      <p class="footer-link-bottom">All Rights Reserved by AppGame © <a href="http://www.appgame.com" target="_blank">任玩堂</a> | <a href="http://www.appgame.com/archives/category/game-type/mmorpg" target="_blank">手机网游</a> | <a href="http://jp.appgame.com" target="_blank">日系手机游戏</a> | <a href="http://gl.appgame.com" target="_blank">手游攻略大全</a> | <a href="http://h5.appgame.com/statement">免责声明</a> | <a href="http://bbs.appgame.com" target="_blank">玩家论坛</a></p>
    </div>
    <div class="clearfix"></div>
  </div>
</div>



<a href="javascript:$('html,body').animate({scrollTop:0},500);" class="gotoTop mobile"></a>


<div style="display:none">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3bb4de6086a0ea218cc71f62c9c502c2' type='text/javascript'%3E%3C/script%3E"));
</script>
<script src="http://img01.static.appgame.com/libs/jsCommon/analytics/appgame-analytics.js"></script>
</div>
<?php wp_footer(); ?>
</body></html>