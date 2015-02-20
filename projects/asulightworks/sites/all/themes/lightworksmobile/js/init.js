/*
	theme - ASULIGHTWORKS
	init.js
	built by Esser Design - Jason Geiger (@jasonjgeiger)
	built on Javascript standards
	relies on jQuery 1.6.4
    
	Copyright 2011. All Rights Reserved.	
*/
var Site = window.Site || {};
(function($) {
	$(function() {
		var ahref;
		//HOMEPAGE SCROLLER
		var features = $('.index #masthead ul').children().length;
		$('.index #masthead ul').css({width:features*960});
		$('.index #masthead').serialScroll({
			target:'.children',
			items:'.child',
			next:'.next',
			prev:'.prev',
			axis:'x',
			lazy:true,
			interval:10000,
			duration:1000,
			force:true
		});
		//INITIVATES
		$('.initiatives-widget .nav li').eq(0).addClass('active');
		$('.initiatives-widget .initiative').eq(0).addClass('active');
		$('.initiatives-widget .nav a').click(function(e){
			var id = this.href.toString().split('#')[1];
			$('.initiatives-widget .initiative').each(function(){
				$(this).removeClass('active');									   
			});
			$('.initiatives-widget .nav li').each(function(){
				$(this).removeClass('active');									   
			});
			$(this).parent().addClass('active');
			$('#'+id).addClass('active');
			return false;
		});
		//NO WIDOWS IN TITLES
		$('#aside h1,#aside h2,#aside h3').each(function(){
			if($(this).children().length > 0){
				var target = $(this).children(),next = target;
				while( next.length ) {
				  target = next;
				  next = next.children();
				}
			}else{
				target = $(this);	
			}
			var str = target.html(),space = str.lastIndexOf(' ');
			str = str.replace(/^\s+/,"");
			if(space!==false)target.html(str.substr(0, space)+'&nbsp;'+str.substr(space + 1));
		});
		//HANDLE DROPDOWN NAVIGATION FOR OLD IE
		if($.browser.msie && ($.browser.version == '6.0' || $.browser.version == '7.0')){
			$('#nav li.primary').mouseover(function(){
				$(this).find('.subnav').css({'left':'0px'});
			}).mouseout(function(){
				$(this).find('.subnav').css({'left':'-999em'});
			});
		}
		
	});
	$(window).bind("load", function() {
		$('pre').slideToggle('fast');
		if(is_admin && $('pre').length>0){
			$('body').prepend('<div id="debug">TOGGLE PRINT_R</div>');
		}
		$('#debug').click(function(){
			$('pre').slideToggle('fast');							   
		});
	});
	
})(jQuery);