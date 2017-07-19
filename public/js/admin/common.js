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


	/*  動態增加式欄位 */
	$('.dynamic').each(function(index){
		var thisDynamic = $(this);
		var appendClass = 'dynamic_' + index;
		var element = thisDynamic.clone().wrap('<div>').parent().html();

		thisDynamic.addClass(appendClass);

		$(document).on('click','.' + appendClass + '_add',function(){
			thisDynamic.after(element);
		});
	});
});