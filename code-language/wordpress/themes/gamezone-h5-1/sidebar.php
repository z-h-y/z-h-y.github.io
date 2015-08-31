<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>
<div id="sidebar">
<div class="sidebar">

  <div class="h5show"><?php echo adrotate_group(1); ?></div>
  <div class="gameabout">
    <div class="h5-head icon-square">相关游戏</div>
    <div class="kind-body">
      <ul>
<?php
global $post;
$cats = wp_get_post_categories($post->ID);
if ($cats) {
    $args = array(
          'category__in' => array( $cats[0] ),
          'post__not_in' => array( $post->ID ),
          'showposts' => 6,
          'caller_get_posts' => 1
      );
  query_posts($args);

  if (have_posts()) {
    while (have_posts()) {
      the_post(); update_post_caches($posts); ?>

 <li> <a href="<?php the_permalink() ?>"><span class="a-img" <?php if ( has_post_thumbnail()) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');echo 'style="background-image:url(' . $large_image_url[0] . ');"';}?>><img src="<?php echo get_template_directory_uri(); ?>/images/icon-default.png"></span><span class="a-text"><?php the_title(); ?></span></a> </li>

<?php
    }
  } 
  else {
    echo '暂无相关游戏';
  }
  wp_reset_query(); 
}
else {
  echo '暂无相关文章';
}
?>
        <div class="clearfix"></div>
      </ul>
    </div>
  </div>
  <div class="hotRanking">
    <div class="h5-head icon-square">热门排行</div>
    <div class="kind-body">
      <ul>
      
      
      	<?php $posts = get_posts( "category=9&numberposts=6" ); ?>
				<?php if( $posts ) : ?>
        <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
        
        
        <li> <a href="<?php the_permalink() ?>"><span class="a-img" <?php if ( has_post_thumbnail()) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');echo 'style="background-image:url(' . $large_image_url[0] . ');"';}?>><img src="<?php echo get_template_directory_uri(); ?>/images/icon-default.png"></span><span class="a-text"><?php the_title(); ?></span></a> </li>
        
        
        <?php endforeach; ?>
        <?php endif; ?>
      
       
        <div class="clearfix"></div>
      </ul>
    </div>
  </div>
</div>
</div>
<!-- #secondary .widget-area -->
<?php endif; ?>
