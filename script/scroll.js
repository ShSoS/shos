
var myScroll;
function loaded() {
	myScroll = new iScroll('content_middle', { scrollbarClass: 'myScrollbar' });
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

document.addEventListener('DOMContentLoaded', loaded, false);