// JavaScript Document
$(function(){
	$("#header").load("/m_knco/include/header.html", function(){
		btnToggle(".btn-menu", ".menu_wrap", "body");
		btnToggle(".btn-close", ".menu_wrap", "body");
		menu(".menu .depth1 > li > a:not('.link')", ".menu .depth2");		
	});
	$("#footer").load("/m_knco/include/footer.html");

	var productSwiper = new Swiper('.product-slide .swiper-container', {
		slidesPerView: "auto",
		scrollbar: {
			el: '.product-slide .swiper-scrollbar',
			draggable: true,
		}
	});
	
	info(".info");
	
	var newsSwiper = new Swiper('.news .swiper-container', {
		slidesPerView: 1,
		spaceBetween: 16,
		pagination:{
			el: '.swiper-pagination',
		},
		breakpoints: {
			480:{
				slidesPerView: 2
			}
		}
	});
});

function btnToggle(btn, e, body){
	$(btn).on("click", function(){
		$(this).toggleClass("on");
		$(e).toggle();
		if($(e).is(":visible")){
			$(body).css({"hihght": "100%"});
		} else{
			$(body).css({"hihght": "auto"});
		}
	})	
}

function menu(btn, nextCententAll, nextContentHide){
	$(btn).on("click", function(){
		$(btn).removeClass("on");
		$(nextContentHide).hide();
		if($(this).next().is(":visible")){
			$(nextCententAll).stop().slideUp(200);
		} else {
			$(this).addClass("on");
			$(nextCententAll).slideUp(200);
			$(this).next().stop().slideDown(200);
		}
	})
}

function info(e){
	$(document).on("scroll", function(){
		var scrollTop = $(document).scrollTop();
		var positionTop = $(e).position().top;
		if(scrollTop > (positionTop / 2)){
			$(e).addClass("on");
		} else{
			$(e).removeClass("on");
		}
	})
}