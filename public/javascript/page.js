$(function() {
	$(".pageside li").click(function() {
		$(this).addClass("active");
		var index = $(this).index();
		if(index == 0) {
			$(".codelist").show();
		} else {
			$(".codelist").eq(index-1).show();
			$(".codelist").eq(index-1).siblings().hide();
		}
		$(this).siblings().removeClass("active");
		$('html,body').animate({
			scrollTop: $(".container").offset().top
		}, 300)
	})
})
$(function() {
	$.fn.slides = function(option) {
		option = $.extend({},{
			id: '',
			direction: 'left',
			speed: 1000,
			atuoplay: true
		}, option);
	}
})