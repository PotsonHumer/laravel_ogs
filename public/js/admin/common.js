$(function(){

	/* 側邊選單展縮特效 */

	$('aside > ul > li > a').click(function(event){
		var parent       = $(this).parent('li');
		var sub          = $(this).next('ul');
		var other        = $('aside > ul > li').not(parent);
		var singleHeight = parent.height();

		if(sub.length > 0){
			event.preventDefault();

			var subHeight = Number(sub.children('li').length) * singleHeight;

			sub.addClass('animate');
			other.removeClass('open');
			other.find('ul').css({maxHeight:'0'});

			if(parent.hasClass('open')){
				sub.css({maxHeight:'0'});
				parent.removeClass('open');
			}else{
				parent.addClass('open');
				sub.css({maxHeight:subHeight +'px'});
			}
		}

	});
});