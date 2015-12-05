/*--- スムーススクロール ---*/
$(function() {
	var topBtn = $('#backTop');
	topBtn.hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});
	topBtn.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 250);
		return false;
	});
});

$(document).ready(function(){
	$(".caption").click(function(){
		if($(this).find("a").attr("target")=="_blank"){
		window.open($(this).find("a").attr("href"), '_blank');
	}else{
		window.location=$(this).find("a").attr("href");
	}
	return false;
	});
})

/*$(function() {
	var $header = $('#header');
		$(window).scroll(function() {
		if ($(window).scrollTop() > 250) {
			$header.addClass('fixed');
		} else {
			$header.removeClass('fixed');
		}
	});
});*/
