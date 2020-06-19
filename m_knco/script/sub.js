// JavaScript Document
$(function(){
	$("#header").load("/m_knco/include/header.html", function(){
		btnToggle(".btn-menu", ".menu_wrap", "body");
		btnToggle(".btn-close", ".menu_wrap", "body");
		menu(".menu .depth1 > li > a:not('.link')", ".menu .depth2");		
	});
	$("#footer").load("/m_knco/include/footer.html");
	
	$(".policy .depth1 .on").parent().css({"border-color": "#54a922"});
	menu(".policy .depth1 a", ".policy .depth2", function(){
		$(".policy .depth1 a").parent().css({"border-color": "#9e9e9e"});
		$(".policy .depth1 .on").parent().css({"border-color": "#54a922"});
	});
	
	tabmenu(".protect .tabmenu li",".protect .content");
	product('.protect span');
	count(".protect u span", ".protect ol li");
	more(".protect .more", ".protect ol li", "li", 12, 6);
	pest(".pest article");
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

function tabmenu(tab, contentAll){
	$(tab).eq(0).addClass("on");
	$(contentAll).hide();
	$(contentAll).eq(0).show();
	$(tab).on("click", function(){
		$(tab).removeClass("on");
		$(this).addClass("on");

		$(contentAll).hide();
		var contentIndex = $(this).index();
		$(contentAll).eq(contentIndex).show();
	})
	var hashTab = document.location.hash.slice(-4);
	$("a[href *=" + hashTab + "]").parent().trigger('click');
}

function product(e){
	for(var i=0; i < 25; i++){
		var text = $(e).eq(i).text();
		if (text.indexOf('원예용') == 0){
			$(e).eq(i).css({"background-color": "#00a0e9"})
		}
	}
}

function count(e, n){
	var count = $(n).last().index() + 1;
	$(e).text(count);
}

function more(btn, e1, e2, n1, n2){
	if($(e1).length <= n1){
		$(btn).remove();
	}
	$(e1).each(function(){
		if($(this).index() >= n1){
			$(this).hide();
		}
	})
	$(btn).on("click",function(){
		var $eHidden = $(e1).parent().filter(":visible").find(e2).filter(":hidden");
		if($eHidden.length <= n2){
			$(this).remove();
		}
		$eHidden.slice(0,n2).show();
	});
}

function pest(e){
	for(var i=0; i < 5; i++){
		var text = $(e).eq(i).find("span").text();
		if (text.indexOf('원예용') == 0){
			$(e).eq(i).find("h4").css({"background-color": "#00a0e9"});
			$(e).eq(i).find("span").css({"background-color": "#00a0e9"});
			$(e).eq(i).find("strong").css({"color": "#007cb5"});
			$(e).eq(i).find("strong").addClass("on");		
		}
	}
}