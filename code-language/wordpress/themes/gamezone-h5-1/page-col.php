<?php 
/* Template Name: page-col */
?>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<script>(function($){$.fn.appgamePages=function(options){var opts=$.extend({},$.fn.appgamePages.defaults,options);return this.each(function(){var $this=$(this);var $PagesClass=opts.PagesClass;var $AllMth=$this.find($PagesClass).length;var $Mth=opts.PagesMth;var $NavMth=opts.PagesNavMth;var $PagesNum=opts.PagesNum;var $PagesTotal=opts.PagesTotal;var PagesNavHtml="<div class=\"Pagination\"><a href=\"javascript:;\" class=\"homePage\">首页</a><a href=\"javascript:;\" class=\"PagePrev\">上一页</a><span class=\"Ellipsis\"><b>...</b></span><span class=\"pagesnum\"></span><span class=\"Ellipsis\"><b>...</b></span><a href=\"javascript:;\" class=\"PageNext\">下一页</a><a href=\"javascript:;\" class=\"lastPage\">尾页</a></div>";if($AllMth>$Mth){var relMth=$Mth-1;$this.find($PagesClass).filter(":gt("+relMth+")").hide();var PagesMth=Math.ceil($AllMth/$Mth);var PagesMthTxt;if($PagesTotal){PagesMthTxt="<span>共<b>"+$AllMth+"</b>条，共<b>"+PagesMth+"</b>页</span>"}else{PagesMthTxt=""}$this.append(PagesNavHtml).find(".Pagination").append(PagesMthTxt);var PagesNavNum="";for(var i=1;i<=PagesMth;i++){PagesNavNum=PagesNavNum+"<a href=\"javascript:;\">"+i+"</a>"};if($PagesNum){$('.Ellipsis,.pagesnum').css('display','inline')}else{$('.Ellipsis,.pagesnum').css('display','none')}$this.find(".pagesnum").append(PagesNavNum).find("a:first").addClass("PageCur");if($NavMth<PagesMth){$this.find("span.Ellipsis:last").show();var relNavMth=$NavMth-1;$this.find(".pagesnum a").filter(":gt("+relNavMth+")").hide()}else{$this.find("span.Ellipsis:last").hide()};var $input=$this.find(".Pagination #PageNum");var $submit=$this.find(".Pagination .PageNumOK");$input.keyup(function(){var pattern_d=/^\d+$/;if(!pattern_d.exec($input.val())){alert("请填写正确的数字！");$input.focus().val("");return false}});$submit.click(function(){if($input.val()==""){alert("请填写您要跳转到第几页！");$input.focus().val("");return false}if($input.val()>PagesMth){alert("您跳转的页面不存在！");$input.focus().val("");return false}else{showPages($input.val())}});var $PagesNav=$this.find(".pagesnum a");var $PagesFrist=$this.find(".homePage");var $PagesLast=$this.find(".lastPage");var $PagesPrev=$this.find(".PagePrev");var $PagesNext=$this.find(".PageNext");$PagesNav.click(function(){var NavTxt=$(this).text();showPages(NavTxt);$('html,body').animate({scrollTop:$(opts.PagesClass).parent().offset().top},500)});$PagesFrist.click(function(){showPages(1);$('html,body').animate({scrollTop:$(opts.PagesClass).parent().offset().top},500)});$PagesLast.click(function(){showPages(PagesMth);$('html,body').animate({scrollTop:$(opts.PagesClass).parent().offset().top},500)});$PagesPrev.click(function(){var OldNav=$this.find(".pagesnum a[class=PageCur]");if(OldNav.text()==1){alert("已经是首页啦！")}else{var NavTxt=parseInt(OldNav.text())-1;showPages(NavTxt);$('html,body').animate({scrollTop:$(opts.PagesClass).parent().offset().top},500)}});$PagesNext.click(function(){var OldNav=$this.find(".pagesnum a[class=PageCur]");if(OldNav.text()==PagesMth){alert("已经是最后一页啦！")}else{var NavTxt=parseInt(OldNav.text())+1;showPages(NavTxt);$('html,body').animate({scrollTop:$(opts.PagesClass).parent().offset().top},500)}});function showPages(page){$PagesNav.each(function(){var NavText=$(this).text();if(NavText==page){$(this).addClass("PageCur").siblings().removeClass("PageCur")}});var AllMth=PagesMth/$NavMth;for(var i=1;i<=AllMth;i++){if(page>(i*$NavMth)){$PagesNav.filter(":gt("+(i*$NavMth-1)+")").show();$PagesNav.filter(":gt("+(i*$NavMth-1+$NavMth)+")").hide();$PagesNav.filter(":lt("+(i*$NavMth)+")").hide();$this.find("span.Ellipsis:first").show()};if(page<=$NavMth){$PagesNav.filter(":gt("+($NavMth-1)+")").hide();$PagesNav.filter(":lt("+$NavMth+")").show();$this.find("span.Ellipsis:first").hide()}};var LeftPage=$Mth*(page-1);var NowPage=$Mth*page;$this.find($PagesClass).hide();$this.find($PagesClass).filter(":lt("+(NowPage)+")").show();$this.find($PagesClass).filter(":lt("+(LeftPage)+")").hide()}}})};$.fn.appgamePages.defaults={PagesClass:'.item',PagesMth:10,PagesNavMth:4,PagesNum:true,PagesTotal:true};$.fn.appgamePages.setDefaults=function(settings){$.extend($.fn.appgamePages.defaults,settings)}})(jQuery);</script>
<script>
$(function(){
	$('#h5-col').appgamePages({
		PagesClass:'.h5-col', //需要分页的元素
		PagesMth:12, //每页显示个数		
		PagesNavMth:3, //显示导航个数
		PagesTotal:false,
		PagesNum:true
		});
	});
</script>


<div id="primary">
  <div class="full" role="main">
    <div class="h5-block">
      <div class="h5-head icon-pen">全部合集</div>
      <div class="h5-body" id="h5-col">
        <?php
$categories_shop = get_categories("echo=0&show_count=1&child_of=14&title_li=&orderby=count&order=ASC&hide_empty=0&number=14");
foreach($categories_shop as $category) { ?>
        <div class="h5-col">
          <div class="m-txt">
            <h3><?php echo get_cat_name( $category->cat_ID ) ?></h3>
            <a href="<?php echo get_category_link($category->cat_ID); ?>"><img src="<?php echo z_taxonomy_image_url($category->term_id); ?>" class="autoimg" /></a> </div>
          <?php $posts = get_posts( "category=".$category->cat_ID."&numberposts=3" ); ?>
          <?php if( $posts ) : ?>
          <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
          <?php include 'h5-game-quarter.php'; ?>
          <?php endforeach; ?>
          <?php endif; ?>
          <div class="more"><a href="<?php echo get_category_link($category->cat_ID); ?>">查看全部</a></div>
        </div>
        <?php 
}

 ?>
        <div class="cl"></div>
      </div>
    </div>
  </div>
  <!-- #content --> 
</div>
<!-- #primary -->
<?php get_footer(); ?>