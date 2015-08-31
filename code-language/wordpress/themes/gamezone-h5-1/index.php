<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

<div id="slider"> <img src="<?php echo get_template_directory_uri(); ?>/images/slider-default.png">

<div class="slider"><?php echo adrotate_ad(3); ?></div>

<div class="slider"><?php echo adrotate_ad(4); ?></div>

  <a href="javascript:;" class="arrow-btn arrow-left"></a> <a href="javascript:;" class="arrow-btn arrow-right"></a> 
  <script>
	$('.slider:first').addClass('current');

$number=$('.slider').index();
	
	function showArrow(){
		var num=$('#slider').find('.slider.current').index();
		if(num==1||num==$number){
			if(num==1){
				$('.arrow-left').hide();
				$('.arrow-right').show();
				}
			if(num==$number){
				$('.arrow-left').show();
				$('.arrow-right').hide();
				}
			}
		else{
			$('.arrow-left').show();
			$('.arrow-right').show();
			}
		}
	showArrow();
	$('.arrow-left').click(function(e) {
		if($('#slider').find('.slider.current').index()!=1){
			$('#slider').find('.slider.current').removeClass('current').prev().addClass('current');
			}
			showArrow();
		});
	$('.arrow-right').click(function(e) {

		if($('#slider').find('.slider.current').index()!=2){
			$('#slider').find('.slider.current').removeClass('current').next().addClass('current');
			}
		showArrow();
		});
</script> 
</div>
<div class="h5-b2">
  <div class="h5-block">
    <div class="h5-head icon-square">编辑推荐</div>
    <div class="h5-body h5-game-oneThird">
    
    <?php $posts = get_posts( "category=12&numberposts=3" ); ?>
		<?php if( $posts ) : ?>
    <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
    
    
    <?php include 'h5-game-quarter.php'; ?>
      
    
    <?php endforeach; ?>
    <?php endif; ?>
    
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="h5-block">
    <div class="h5-head icon-square">最新发布</div>
    <div class="h5-body">
      <?php $posts = get_posts( "category=1&numberposts=9" ); ?>
			<?php if( $posts ) : ?>
      <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
      
      <?php include 'h5-game-quarter.php'; ?>
      
      <?php endforeach; ?>
      <?php endif; ?>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<div class="h5-b3">
  <div class="h5-block">
    <div class="h5-half fl">
      <div class="h5-game-half">
        <div class="h5-head icon-triangle">热门排行</div>
        <div class="h5-half-body hotRanking">
        
        <?php $posts = get_posts( "category=9&numberposts=10" ); ?>
				<?php if( $posts ) : ?>
        <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
        
        <?php include 'h5-game-half.php'; ?>
        
        <?php endforeach; ?>
        <?php endif; ?>
        
        </div>
      </div>
    </div>
    <div class="h5-half fr">
      <div class="h5-game-half">
        <div class="h5-head icon-triangle">评价排行</div>
        <div class="h5-half-body evaluateRanking">
          <?php $posts = get_posts( "category=10&numberposts=10" ); ?>
					<?php if( $posts ) : ?>
          <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
          
          <?php include 'h5-game-half.php'; ?>
          
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    
    <script>
    	$('.hotRanking .h5-half-num').attr('',function(){
				var index=$(this).parent().index()+1;
				$(this).html(index);
				if(index<=3){
					$(this).addClass('red');
					}
				else{
					$(this).addClass('grey');
					}
				});
			$('.evaluateRanking .h5-half-num').attr('',function(){
				var index=$(this).parent().index()+1;
				$(this).html(index);
				if(index<=3){
					$(this).addClass('blue');
					}
				else{
					$(this).addClass('grey');
					}
				});
    </script>
    <div class="clearfix"></div>
  </div>
</div>
<script type="text/javascript">
    var wxData = {
        url : 'http://h5.appgame.com/',
        desc :"任玩堂旗下H5游戏站，无需下载，小游戏直接在手机平板上玩！",
        title :"任玩小游戏",
        img_url :  "http://h5.appgame.com/wp-content/uploads/sites/83/2014/07/h5.png"
    }

    function onBridgeReady() {
        //转发朋友圈
        WeixinJSBridge.on("menu:share:timeline", function(e) {
            var data = {
                img_url: wxData.img_url,
                img_width: "120",
                img_height: "120",
                link: wxData.url,
                desc:wxData.desc,
                title: wxData.title
            };
            WeixinJSBridge.invoke("shareTimeline", data, function(res) {
                WeixinJSBridge.log(res.err_msg)
            });
        });
        //同步到微博
        WeixinJSBridge.on("menu:share:weibo", function() {
            WeixinJSBridge.invoke("shareWeibo", {
                "content": wxData.desc,
                "url": wxData.url
            }, function(res) {
                WeixinJSBridge.log(res.err_msg);
            });
        });
        //分享给朋友
        WeixinJSBridge.on('menu:share:appmessage', function(argv) {
            WeixinJSBridge.invoke("sendAppMessage", {
                img_url: wxData.img_url,
                img_width: "120",
                img_height: "120",
                link: wxData.url,
                desc: wxData.desc,
                title: wxData.title
            }, function(res) {
                WeixinJSBridge.log(res.err_msg)
            });
        });
    };
    //执行
    try{
        document.addEventListener('WeixinJSBridgeReady', function() {
            onBridgeReady();
        });
    }catch(e){}

</script>
<?php get_footer(); ?>