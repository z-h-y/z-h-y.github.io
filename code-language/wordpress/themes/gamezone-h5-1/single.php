<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

  <div class="content">
  
  	<div class="body">
    
    <?php while ( have_posts() ) : the_post(); ?>
    
    <div class="content-top">
      <div class="content-top-common cf">
      <?php if( is_user_logged_in() ) {
          global $current_user;
          get_currentuserinfo(); 
        echo "<div class='logout'><font color='red'>".$current_user->display_name."</font>";
          $url_this = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
          echo wp_loginout($url_this)."</div>";
          }
      ?>     
      	<?php the_content(); ?>
      </div>
      <div class="content-top-question">
        <?php if( is_user_logged_in() ) {
          if(!isset($_GET['go'])) {
        echo '<form action="./?go" method="post" id="f_wb"><div>';
        echo '<label>请输入名字</label><input type="text" class="skin-text-willwhite" name="my_nick" id="my_nick" style="width:182px;" value="'.$current_user->display_name.'"></div>';
        echo '<div><a href="javascript:void(0);"><img id="submit_pic" src="http://sczjpc.com/images/start_t.gif" width="190" alt="查看结果，并发送微博" title="查看结果，并发送微博" onclick="my_on_submit();return false;"><img id="load_pic" src="http://sczjpc.com/images/load.gif" style="display:none;"></a></div></form>';
        echo "<script>
function my_on_submit()
{
  var nick=document.getElementById('my_nick').value;
  if(nick==''){alert('名字不能为空哦~~');document.getElementById('my_nick').focus();return false;}
  
  document.getElementById('submit_pic').style.display='none';
  document.getElementById('load_pic').style.display='inline-block';
  on_submit();
  
}
function on_submit()
{
  var f_wb=document.getElementById('f_wb');
  f_wb.submit();
}


</script>";} else {echo "<p>点击下方“分享”按钮查看测试结果~</p>";
                  echo open_social_share_html();}
        } else {
        echo open_social_login_html();
        echo "<p>还未登录</p>";
        }
        ?>
      </div>  
    </div>  
    
    <?php endwhile; // end of the loop. ?>

<div class="clear"></div>
  </div>
  <!-- #content --> 
</div>
<!-- #primary -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>