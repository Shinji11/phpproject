// バックグラウンドフェードインアウト繰り返し
var i = 1;
$(function() {
		$("#img").fadeOut("slow", function() {
			$("#img").attr("src","images/" + i + ".jpg");
		});
		$("#img").fadeIn("slow");
	});
setInterval(function() {
	if (i == 5) {
		i = 0;
	}
			$("#img").fadeOut("slow", function() {
				$("#img").attr("src","images/" + i + ".jpg");
			});
			$("#img").fadeIn("slow");
			i = i + 1;
	}, 7000);

//スクロールするとバックグラウンドが透明になる
$(function() {
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		if(scrollTop !== 0)
			$("#img").stop().animate({"opacity":"0.1"},800);
		else
			$("#img").stop().animate({"opacity":"1"},400);
	});
});

//スクロールしてもナビゲーションを最小化して残す
$(function() {
	var nav = $("#nav");
	var topBtn = $("#top1");
	topBtn.hide();
	//navの位置
	var navTop = nav.offset().top;
	//スクロールするたびに実行
	$(window).scroll(function () {
		var winTop = $(this).scrollTop();
		//スクロール位置がnavの位置より下だったらクラスfixedを追加
		if (winTop >= navTop) {
			nav.addClass("fixed");
			nav.addClass("down");
			topBtn.fadeIn();
		} else if (winTop <= navTop) {
			nav.removeClass("fixed");
			nav.removeClass("down");
			topBtn.hide();
		}
	});
});

//ドロップダウンメニュー
$(function(){
	$(".ul_nav .li_nav").hover(function() {
		$(this).children('.menu').show();
	}, function() {
		$(this).children('.menu').hide();
	});
});

//TOPPAGE押下時トップページに移動する
$(function(){
	$(".scroll").click(function() {
			$("body,html").animate({
				scrollTop: 0
			}, 800);
		});
});
