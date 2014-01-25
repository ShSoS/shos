$(document).ready(function() {
	$('.profil_navigation a').hover(
		function() {
			$(this).find('.arrow_img').css({'display': 'block'});
			$(this).find('li').animate({'width': '400'}, 1000);
		},
		function() {
			$(this).find('.arrow_img').css({'display': 'none'});
			$(this).find('li').animate({'width': '240'}, 1000);
		}
	);
});