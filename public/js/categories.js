$(document).ready(function(){
	var pathname = window.location.pathname;
	
	$('.main-nav > li > a[href="'+pathname+'"]').parent().addClass('active');
	$('#navigation ul li > a[href="'+pathname+'"]').parent().addClass('nav-active');
})