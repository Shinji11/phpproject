//外部リンクを別タブで開く
$(function(){
	$("a[href^='http://'],a[href^='https://']").attr("target","_blank");
});

//ページトップへスクロールする
$(function(){
	$(".pageScroll a").click(function(){
		$("html,body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 'slow','swing');
		return false;
	});
});

//テーブルの偶数・奇数の行の色を変える
$(function(){
	$("tr:odd").addClass("odd");
});

//アコーディオン
$(function(){
	$('.accordion dt').click(function() {
		$('.accordion dt a').removeClass("selected").next().slideUp(); //←ここ追記
		$(this).toggleClass("selected").next().slideToggle(); //←ここ追記
	}).next().hide();
});

//ツールチップ
$(function(){
	$(".tooltip img").hover(function() {
		$(this).next("span").animate({opacity: "show", top: "70"}, "fast");}, function() {
			$(this).next("span").animate({opacity: "hide", top: "80"}, "fast");
	});
});

//ドロップダウンメニュー
$(function(){
	$(".ul_menu .target").hover(function() {
		$(this).children('.menu').show();
	}, function() {
		$(this).children('.menu').hide();
	});
});

//画像のロールーバー
$(function(){
	$('.fade').each( function(){
		$(this).hover( function(){
			$(this).stop().animate({opacity:0.7}, 50);
		}, function(){
			$(this).stop().animate({opacity:1}, 200);
		});
	});
});

//ページをフェードインさせる
$(function() {
	$(document).ready(function() {
		$('#contents,#visual').fadeIn("slow");
	});
});

//スクロールしてもナビゲーションを最小化して残す
$(function() {
	var nav = $('#nav');
	//navの位置
	var navTop = nav.offset().top;
	//スクロールするたびに実行
	$(window).scroll(function () {
		var winTop = $(this).scrollTop();
		//スクロール位置がnavの位置より下だったらクラスfixedを追加
		if (winTop >= navTop) {
			nav.addClass('fixed');
			nav.addClass('down');
		} else if (winTop <= navTop) {
			nav.removeClass('fixed');
			nav.removeClass('down');
		}
	});
});

//スクロールするとページの先頭へ戻るボタンを表示
$(function() {
	var topBtn = $('#pageTop');
	topBtn.hide();
	//スクロールが100に達したらボタン表示
	$(window).scroll(function () {
		if ($(this).scrollTop() > 400) {
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});
	//スクロールしてトップ
	topBtn.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
	});
});

//スクロールすると透明になる
$(function() {
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		if(scrollTop !== 0)
			$('#visual').stop().animate({'opacity':'0.1'},800);
		else
			$('#visual').stop().animate({'opacity':'1'},400);
	});
});

//IE6以下ユーザーにメッセージを表示
$(function () {
	if ( $.browser.msie && $.browser.version <= 6 ) {
		$('body').prepend('<div class="error">ご覧頂いているブラウザは旧式のものです。このウェブサイトを快適に閲覧するにはブラウザをアップグレードしてください。</div>');
	}
});

