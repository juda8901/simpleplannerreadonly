$(document).ready(function() {
$('div.accountMenuItem').hide();
$('h3').click(function(){
	$(this).next().slideToggle(500);
	if ($(this).find('.arrow').attr('src')=='arrowUP.png')
		$(this).find('.arrow').attr('src', 'arrowDown.png');
	else if ($(this).find('.arrow').attr('src')=='arrowDown.png')
		$(this).find('.arrow').attr('src','arrowUP.png');
})
		
})