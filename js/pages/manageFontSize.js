$(document).ready(function() {
	
	/*Home Page*/
	$(".home h1").fitText();
	$(".home li").fitText(2);
	
	/*Navigation*/
	$("nav a").fitText(1, { minFontSize: '15', maxFontSize: '30' });
	
	/*Select a Round Page*/
	$(".mainRound ul a").fitText(1.3, { minFontSize: '10', maxFontSize: '20' });
	$(".mainRound ul a span").fitText(1, { minFontSize: '27', maxFontSize: '50' });
});
		