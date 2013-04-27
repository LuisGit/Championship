$(document).ready(function() {
	
	/*Home Page*/
	$(".home h1").fitText();
	$(".home li").fitText(1.1);
	$("footer p").fitText(2, { minFontSize: '5', maxFontSize: '11' });
	
	/*Navigation*/
	$("nav a").fitText(1, { minFontSize: '15', maxFontSize: '30' });
	
	/*Select a Round Page*/
	$(".mainRound ul.title-area a span").fitText(1, { minFontSize: '27', maxFontSize: '30' });
	$(".mainRound ul a").fitText(1, { minFontSize: '27', maxFontSize: '50' });	
	$(".mainRound ul.side-nav a span").fitText(1.3, { minFontSize: '10', maxFontSize: '16' });
});
		