<div class="h5-game">
  <div class="h5-game-content">
    <div class="h5-game-icon" <?php if ( has_post_thumbnail()) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');echo 'style="background-image:url(' . $large_image_url[0] . ');"';}?>></div>
    <div class="h5-game-body">
      <h1 class="h5-game-name">
        <?php the_title(); ?>
      </h1>
      <h3 class="h5-game-kind">分类：
        <?php if (in_category('2')) { ?>
        街机游戏
        <?php } else if(in_category('3')) {?>
        动作游戏
        <?php } else if(in_category('4')) {?>
        运动游戏
        <?php } else if(in_category('5')) {?>
        射击游戏
        <?php } else if(in_category('6')) {?>
        棋牌游戏
        <?php } else if(in_category('7')) {?>
        益智游戏
        <?php } else if(in_category('8')) {?>
        角色游戏
        <?php } else {?>
        任玩小游戏
        <?php } ?>
      </h3>
      <p class="h5-game-detail"><?php echo mb_strimwidth(get_the_excerpt(), 0, 500); ?></p>
      <a href="<?php the_permalink() ?>" class="h5-game-link"></a> </div>
  </div>
</div>