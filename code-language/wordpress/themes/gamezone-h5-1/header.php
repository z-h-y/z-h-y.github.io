<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" href="http://www.appgame.com/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://www.appgame.com/favicon.ico" type="image/x-icon" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fittext.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/function.js"></script>
<style>
.slider,.h5-game-detail a{display:none;}
.slider.current{display:block;}
.h5-header-nav li.active {background: url(http://h5.appgame.com/wp-content/themes/gamezone-h5-1/images/navLink-on.jpg) center top repeat-x;}
#content{margin:0; width:100%;}
/* TopGolab Nav 2014-08-02 pjx */
#topHeader{height:41px; background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/topNavBackground.jpg) repeat-x;}
#globarNav{max-width:1000px; margin:0 auto;}
#globarNav .gNavLink li{float:left; margin-right:40px; color:#888888;}
#globarNav .gNavLink li a{line-height:41px; font-size:12px; color:inherit; text-decoration:none;}
#globarNav .gNavLink li:hover,#globarNav .gNavLink li.select{background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/topNavOn.jpg) center bottom no-repeat; color:#333333;}
#globarNav .gNavIcon li a.personalIcon{display:block; width:18px; height:16px; background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/personalIcon.png) no-repeat; margin:11px 0;}
.floatR{float:right;}
@media screen and (max-width:767px){
#topHeader {display:none }
}

.h5show img { max-width:100%; height:auto}
.clear { clean:both}
.content-top-right p { padding-bottom:20px;}

.jathisshare { padding-bottom:30px; padding-top:20px;}
@media screen and (max-width:520px){
.jathisshare { display:none }
body.single #main {  padding: 0 0px; }
body.single { margin:0 }
}
@media screen and (max-width:480px){
body.single #main {  padding: 0 0px; }
body.single { margin:0 }

@media screen and (max-width: 660px){
.footer-logo { display:none; }
}
}
.mb-h5-hb li a { font-size:16px;}


.autoimg{max-width:100%; height:auto; vertical-align:middle;}
.mb-h5-logo{padding:10px; border-bottom:1px #ccc solid;}
.mb-h5-logo-icon{float:left; width:34.375%; display:block;}
.mb-h5-logo-img{float:right; width:37.5%; display:block;}
.gotoTop{width:40px; height:40px; background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/goto-icon.png) center center no-repeat; background-size:cover; position:fixed; right:10px; bottom:10px; z-index:999;}
.h5-game-link{background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/start-off.jpg) center center no-repeat; background-size:cover;}
.h5-game-link:hover{background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/start-on.jpg) center center no-repeat; background-size:cover;}

.mbname{font-size:24px; line-height:46px; color:#333; font-weight:normal;}
.mbkind{font-size:14px; line-height:24px; color:#888888; font-weight:normal; padding-bottom:8px; border-bottom:1px #aaaaaa solid;}



@media screen and (max-width:640px){
.content-top-right h1,.content-top-right h2{display:none;}
.content-top-right h3{border-top:1px #aaa solid;}
.gotoTop{display:block;}
.h5-header{display:none;}
.h5-b3{background:none;}
}
@media screen and (max-width:480px){
p.p-fixed{position:fixed; left:0; bottom:0; background:#fff; z-index:99; padding:10px; text-align:center; width:100%; box-sizing:border-box; border-top:1px #cccccc solid;}

.content{float:none;}
#sidebar{padding:0 10px; margin-top:10px;}
.sidebar{display:block; width:auto; padding-top:10px;}
.g-single{text-align:center;}
.content-top-right p:last-child,.content-top{padding-bottom:0;}
}
</style>




<style>
/*2014-11-18 合集*/
.cl{clear: both;}
.autoimg{max-width: 100%;height: auto;}
.icon-pen{background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/11/pen.png) left center no-repeat;}
.h5-col{width:33.33%; height:428px; box-sizing:border-box; -moz-box-sizing:border-box; padding-left:20px; float:left; margin-bottom:20px;}
.h5-col .h5-game{width:100%; padding-left:0; margin-bottom:0px; border-bottom:1px #eeeeee solid; float:none;}
.h5-col .m-txt h3{font-size: 18px;line-height: 2;color: #000000; background:#fff; font-weight: normal;display: none; padding-left:10px;}
.h5-col .more a{display: block;font-size: 12px;line-height: 35px;color: #444444;text-decoration: none;text-align: center;background: #fff;}
.h5-col .more a:hover{background: #aaaaaa;color: #fff;}

.Pagination{text-align:center;}
.Pagination a{display:inline-block; width:36px; height:36px; text-align:center; line-height:36px; background-color:#ffffff; margin:0 2px; font-size:14px; font-weight:bold; color:#000;}
.Pagination .PageCur,.Pagination a:hover{background-color:#ec6517; color:#fff;}
.Pagination .PagePrev{text-indent:-9999px; background-image:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/11/aleft.png); background-color:#bbbbbb; background-position:center center; background-repeat:no-repeat;}
.Pagination .PageNext{text-indent:-9999px; background-image:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/11/aright.png); background-color:#bbbbbb; background-position:center center; background-repeat:no-repeat;}
.Pagination .Ellipsis{float:left; display:none; width:0; text-indent:-9999px;}
.Pagination .PagePrev:hover,.Pagination .PageNext:hover{background-color:#666666;}
.Pagination .homePage,.Pagination .lastPage{ display:none; }

.kind-list-body li a em{width: 35px;height: 40px;background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/11/i-con5.png) no-repeat center center;display: inline-block; background-size:21px auto;}
.kind-list-body li a i{font-style: normal;display: block;float: left;}
.icon-9{background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/11/col-icon.jpg);}
#game-col a{position:relative;}
#game-col a em{width: 15px;height: 11px;background:url(http://h5.appgame.com/wp-content/uploads/sites/83/2014/11/i-con5.png) no-repeat center center;display:block; background-size:100% auto; position:absolute; right:16px; top:17px;}

@media screen and (max-width:960px){
  .h5-col{width:50%;}
  }
@media screen and (max-width:640px){
  .h5-col{width:100%; margin-bottom:15px; height:auto;}
  .h5-col .h5-game,.h5-col .more{display: none;}
  .h5-col .m-txt h3{display:inherit;}
  }
</style>
</head>


<body <?php body_class(); ?>>
<header id="topHeader">
    <nav id="globarNav">
      <ul class="gNavLink floatL">
        <li><a href="http://www.appgame.com" target="_blank">任玩堂</a></li>
        <li><a href="http://www.appgame.com/archives/category/hot-video" target="_blank">视频</a></li>
        <li><a href="http://app.appgame.com/" target="_blank">游戏库</a></li>
        <li><a href="http://jp.appgame.com" target="_blank">11区</a></li>
        <li class="select"><a href="http://h5.appgame.com/">小游戏</a></li>
        <li><a href="http://hd.appgame.com/" target="_blank">活动</a></li>
        <li><a href="http://shop.appgame.com" target="_blank">商城</a></li>
        <li><a href="http://gl.appgame.com/" target="_blank">攻略大全</a></li>
        <li><a href="http://bbs.appgame.com" target="_blank">论坛</a></li>
      </ul>
      <ul class="gNavIcon floatR">
        <li><a href="javascript:;" class="personalIcon"></a></li>
      </ul>
      <div class="clearfix"></div>
    </nav>
</header>

<div id="h5-header">
  <div class="h5-header-top">
    <div class="h5-header"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="h5-logo"><img src="http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/logo-h5.png"></a>
      <div class="h5-search">
        <form action="http://h5.appgame.com/" method="get">
        <input id="q1" type="text" name="s" value="" hidden="true" style="display:none;" />
        <input id="search_input_frame1" type="text" value="请输入搜索关键词" onClick="this.value=''" class="searchText" />
        <input type="submit" onclick='document.getElementById("q1").value = document.getElementById("search_input_frame1").value' value="" class="searchSubmit"  />
        </form>
      </div>
      <?php /*?><div class="h5-header-ad"><a href='http://ramoney.appgame.com/www/dlv/ck.asp?n=a17bee50&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://ramoney.appgame.com/www/dlv/avw.asp?zoneid=26&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a17bee50&amp;ct0=INSERT_ENCODED_CLICKURL_HERE' border='0' alt='' /></a></div><?php */?>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="h5-header-bottom">
    <div class="h5-header h5-header-nav">
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"<?php if ( is_home()) { ?> class="active"<?php } ?>>首页</a></li>
        <li<?php if ( is_category('3')) { ?> class="active"<?php } ?>><a href="http://h5.appgame.com/category/action/">动作</a></li>
        <li<?php if ( is_category('4')) { ?> class="active"<?php } ?>><a href="http://h5.appgame.com/category/sports/">运动</a></li>
        <li<?php if ( is_category('5')) { ?> class="active"<?php } ?>><a href="http://h5.appgame.com/category/shooting/">射击</a></li>
        <li<?php if ( is_category('7')) { ?> class="active"<?php } ?>><a href="http://h5.appgame.com/category/puzzle/">益智</a></li>
        <li<?php if ( is_category('6')) { ?> class="active"<?php } ?>><a href="http://h5.appgame.com/category/chess/">棋牌</a></li>
        <li<?php if ( is_category('8')) { ?> class="active"<?php } ?>><a href="http://h5.appgame.com/category/role/">角色扮演</a></li>
        <li<?php if ( is_category('2')) { ?> class="active"<?php } ?>><a href="http://h5.appgame.com/category/arcade/">街机</a></li>
	<li<?php if ( is_page(890)) { ?> class="active"<?php } ?> id="game-col"><a href="http://h5.appgame.com/game-col">合集<em></em></a></li>
        <div class="clearfix"></div>
      </ul>
    </div>
  </div>
  <div class="mobile mb-h5-logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mb-h5-logo-icon"><img src="http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/mb-h5-logo.png" class="autoimg"></a>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mb-h5-logo-img"><img src="http://h5.appgame.com/wp-content/uploads/sites/83/2014/08/mb-h5-img.png" class="autoimg"></a>
    <div style="clear:both;"></div>
  </div>
  <div class="mobile mb-h5-hb" id="fittext">
  	<ul>
    	<li><a href="http://h5.appgame.com/"<?php if ( is_home()) { ?> class="active"<?php } ?>>首页</a></li>
      <li><a href="http://h5.appgame.com/category/hot/hotranking"<?php if ( is_category('9')) { ?> class="active"<?php } ?>>热门</a></li>
      <li><a href="javascript:;" class="kind-a">分类</a></li>
      <div class="clearfix"></div>
    </ul>
     
    <div class="kind-list">
    	<div class="kind-list-search">
        <form action="http://h5.appgame.com/" method="get">
        <input id="q" type="text" name="s" value="" hidden="true" style="display:none;" />
        <input id="search_input_frame" type="text" value="请输入搜索关键词" onClick="this.value=''" class="kls-text" />
        <input type="submit" onclick='document.getElementById("q").value = document.getElementById("search_input_frame").value' value="" class="kls-submit"  />
        </form>
        <div class="clearfix"></div>
      </div>
      
      <div class="kind-list-body">
      	<ul>
          <li><a href="http://h5.appgame.com/category/all/"><b class="icon-1"></b>全部游戏</a></li>
          <li><a href="http://h5.appgame.com/game-col"><b class="icon-9"></b><i>专题合集</i><em></em></a></li>
          <li><a href="http://h5.appgame.com/category/arcade/"><b class="icon-2"></b>街机游戏</a></li>
          <li><a href="http://h5.appgame.com/category/action/"><b class="icon-3"></b>动作游戏</a></li>
          <li><a href="http://h5.appgame.com/category/sports/"><b class="icon-4"></b>运动游戏</a></li>
          <li><a href="http://h5.appgame.com/category/shooting/"><b class="icon-5"></b>射击游戏</a></li>
          <li><a href="http://h5.appgame.com/category/chess/"><b class="icon-6"></b>棋牌游戏</a></li>
          <li><a href="http://h5.appgame.com/category/puzzle/"><b class="icon-7"></b>益智游戏</a></li>
          <li><a href="http://h5.appgame.com/category/role/"><b class="icon-8"></b>角色游戏</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>


<?php if(!is_home()) { ?>
<div id="page" <?php if(is_category()){?>class="categoryPage"<?php } else if(is_single()) { ?>class="singlePage"<?php } ?>>
<div id="main">
<?php } ?>