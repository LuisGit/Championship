$(document).ready(function() {
	$("h2").fitText();
	/*Home Page*/
	$(".home h1").fitText();
	$(".home li").fitText(1.1);
	$("footer p").fitText(2, { minFontSize: '5', maxFontSize: '11' });
	
	/*Navigation*/
	$("nav a").fitText(1, { minFontSize: '15', maxFontSize: '30' });
	$("ul.title-area a span").fitText(1, { minFontSize: '27', maxFontSize: '30' });
	$("ul a").fitText(1, { minFontSize: '27', maxFontSize: '50' });
	
	/*Select a Round Page*/
		
	$(".mainRound ul.side-nav a span").fitText(1.3, { minFontSize: '10', maxFontSize: '16' });
	
	/*Select a Round Page*/
	$(".firstRound .section-container p, .final .section-container a").fitText(2, { minFontSize: '17', maxFontSize: '30' });
	$(".firstRound table thead th").fitText(1, { minFontSize: '15', maxFontSize: '50' });
	$(".firstRound table tr").fitText(1, { minFontSize: '13', maxFontSize: '20' });
	$(".firstRound table td.flag").fitText(1, { minFontSize: '11', maxFontSize: '25' });
	$(".firstRound section ul span, .firstRound section ul li ul").fitText(1, { minFontSize: '11', maxFontSize: '25' });
	$(".firstRound section ul li ul.Penales").fitText(1, { minFontSize: '8', maxFontSize: '25' });
	
	/*Final*/
	$(".final section ul li, .final section ul li ul li").fitText(1, { minFontSize: '11', maxFontSize: '25' });
	$(".final div.firstPlace ul,.final div.secondPlace ul, .final .places div").fitText(1, { minFontSize: '11', maxFontSize: '25' });
	
	/*ACERCA DE*/
	$('.about p').fitText(2, { minFontSize: '12', maxFontSize: '14' });
});
		