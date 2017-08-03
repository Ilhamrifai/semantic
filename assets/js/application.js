$(function navMenu(){
	if (parseInt($(window).width()) > 768){
		$('nav ul li ul').parent('li').hover(function(){
			$(this).children('ul').show();
		},function(){
			$(this).children('ul').hide();
		});
	} else {
		$('nav > ul > li > ul').parent('li').click(function(){
			if($(this).children('ul').is(':hidden')){
				$('nav ul li ul').hide();
				$(this).children('ul').show();
			} else {
				$(this).children('ul').hide();
			}
		});
	}
});
$(function bookTitle(){
	$('.books .title a').each(function(){
		var $title = $(this).text();
		$(this).attr('title',$title);
		$(this).parents('.books').find('.thumbs').attr('title',$title);

	});
});
$(function membermenu(){
	$('.member-menu ul li ul').prev('a').click(function(){
		if($(this).next('ul').is(':hidden')){
			$(this).next('ul').show();
		} else {
			$(this).next('ul').hide();
		}
		return false;
	});
});