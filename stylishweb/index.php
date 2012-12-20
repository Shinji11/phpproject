<!DOCTYPE HTML>
<html lang="ja-JP">
<head>
<meta charset="UTF-8">
<title>slider</title>
<link rel="stylesheet" href="css/style.css">
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../jquery-1.6.min.js"></script>
<script src="js/slider.js"></script>
<script>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="js/fitter.js"></script>
<script src="js/fadechanger.js"></script>
<script src="js/imgloader.js"></script>
<script src="js/transition.js"></script>
<script type="text/javascript"></script>
<script>

$(function(){
		// 早送り・巻き戻し
		$("#slider").slider({
			direction: "right",
			time: 24,
			speed: 3
		});
});

$(function(){
    $("ul.menu").hide();
        $("ul#ul_menu>li").hover(function(){
            $("ul:not(:animated)",this).slideUp()
        },
        function(){
            $("ul",this).slideDown();
        })
    })

</script>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="title">
				<table>
					<tr>
						<th colspan="2"><p>BARISTRIDE CORPORATION</p></th>
					</tr>
					<tr>
						<th><p>RECRUITING INFOMATION FOR STUDENTS GRADUATING IN 2014</p></th>
						<td><a href="">PRE ENTRY/LOGIN &gt;</a></td>
					</tr>
				</table>
			</div>
			<div id="nav">
				<ul id="ul_menu">
					<li>
						<div class="category">
						<p>PRESIDENT</p>
						<p>MESSAGE</p>
						<p><a href="" >社長メッセージ</a></p>
						</div>
					</li>
					<li>
						<ul class="menu">
							<li><a href="">ディビジョンカンパニー製</a></li>
							<li><a href="">総合商社とは何か</a></li>
							<li><a href="">ビジネストピックス</a></li>
						</ul>
						<div class="category">
						<p>DIVISION</p>
						<p>COMPANY</p>
						<p><a href="" >BRのビジネス</a></p>
						</div>
					</li>
					<li>
						<ul class="menu">
							<li><a href="">「三方よし」の精神</a></li>
							<li><a href="">キーワードでひもとく社風</a></li>
							<li><a href="">バリストライドの歴史</a></li>
						</ul>	
						<div class="category">
						<p>HISTORY&</p>
						<p>CULTURE</p>
						<p><a href="" >歴史・風土</a></p>
						</div>
					</li>
					<li>
						<div class="category">
						<p>PROJECT</p>
						<p>STORY</p>
						<p><a href="" >プロジェクトストーリ-</a></p>
						</div>
					</li>
					<li>
						<div class="category">
						<p>BARISTRIDE</p>
						<p>PERSON</p>
						<p><a href="" >社員紹介</a></p>
						</div>
					</li>
					<li>
						<div class="category">
						<p>CROSS</p>
						<p>TALK</p>
						<p><a href="" >クロストーク</a></p>
						</div>
					</li>
					<li>
						<ul class="menu">
							<li><a href="">募集要項(総合職)</a></li>
							<li><a href="">福利厚生</a></li>
							<li><a href="">採用方針・スケジュール</a></li>
							<li><a href="">社外セミナー情報</a></li>
							<li><a href="">人材育成の基本方針</a></li>
							<li><a href="">採用(応募)方式</a></li>
							<li><a href="">よくあるご質問</a></li>
						</ul>
						<div class="category">
						<p>RECRUITING</p>
						<p>INFORMATION</p>
						<p><a href="" >採用情報</a></p>
						</div>
					</li>
					<li style="border-right: 1px solid #92999F;">
						<ul class="menu">
							<li><a href="">企業理念</a></li>
							<li><a href="">企業概要</a></li>
							<li><a href="">海外拠点</a></li>
						</ul>
						<div class="category">
						<p>COMPANY</p>
						<p>PROFILES</p>
						<p><a href="" >会社情報</a></p>
						</div>
					</li>
				</ul>	
			</div><!-- nav -->
		</div><!-- header -->

		<div id="contents">
			<div id="topimg">
			</div>
			
		</div><!-- contents -->
		
	</div><!-- wrapper -->
</body>
</html>