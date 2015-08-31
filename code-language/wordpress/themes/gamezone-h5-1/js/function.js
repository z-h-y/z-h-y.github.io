$(function(){
	/*$('.screenshot-small-border').click(function(e) {
		$('.screenshot-small-border').removeClass('current');
		$(this).addClass('current');
  });*/
	
	
	$("#fittext").fitText(2);
	
	
	$('.kind-a').click(function(e) {
    $('.kind-list').slideToggle();
  });
	
	
	$('.screenshot-small a').click(function(e) {
    var index=$(this).parent().parent().index()-1;
		$('.screenshot-small-border').removeClass('current');
		$(this).parent().addClass('current');
		$('.screenshot-big').eq(index).show().siblings('.screenshot-big').hide();
  });
	
	
	
	
	});