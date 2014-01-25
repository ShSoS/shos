// function Slider(contaier, nav){
// 	this.contaier = contaier;
// 	this.nav = nav.show();

// 	this.imgs = this.contaier.find('img');
// 	this.imgWidth = this.imgs[0].width;
// 	this.imgsLen = this.imgs.length;

// 	this.current = 0;
// }

// Slider.prototype.transition = function( coords ){
// 	this.contaier.animate({
// 		'margin-left': coords || -(this.current * this.imgWidth)
// 	});
// };

// Slider.prototype.setCurrent = function( dir ) {
// 	var pos = this.current;
// 	pos += ( ~~( dir === 'next') || -1 );

// 	this.current = ( pos < 0 ) ? this.imgsLen -1 : pos % this.imgsLen;
	
// 	return pos;
// }

$(document).ready(function() {
	$('.arrow_sldier').click(function() {
		var action = $(this).attr('data-dir');
		var width=$(this).parent().find('li:first-child').width();
		var ul_width= $(this).parent().find('ul').width();
		var margin_left = parseInt($(this).parent().find('ul').css('margin-left'));
		margin_left = Math.abs(margin_left);
		width = width * 3;
		if( action == 'next' ) {
			if( margin_left < ul_width ) {
				$(this).parent().find('.slider ul').animate({'margin-left': '-='+width+'px'},200);
			}
			else {
				$(this).parent().find('.slider ul').animate({'margin-left':'-35px'},200);
			} 
		} else {
			if( margin_left > ul_width ) {
				$(this).parent().find('.slider ul').animate({'margin-right': '+='+width+'px'},200);
			}
			else {
				$(this).parent().find('.slider ul').animate({'margin-right':'-35px'},200);
			} 
		}
	});
});