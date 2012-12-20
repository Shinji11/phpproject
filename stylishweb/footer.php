<div id="footer">
	<div class="slideFrame" id="slider">
		<div class="slideCtrl left">DASH &gt;</div>
		<ul class="slideGuide">
			<?php for ($imgnum = 1; $imgnum < 9; $imgnum++) { ?>
			<li class="slideCell"><img src="images/photo/<?php print($imgnum); ?>.jpg" width="200" height="150"></li>
			<?php } ?>
		</ul>
		<div class="slideCtrl right">&lt; RETURN</div>
	</div><!-- alideFrame -->
</div><!-- footer --> 


/* slider
--------------------------------------------------------- */
.slideFrame {
	overflow: hidden;
	width: 100%;
}

.slideCell {
	display: block;
	float: left;
	margin-right: 5px;
}

/* controller */
.slideCtrl {
	display: none;
	position: absolute;
	top: 0;
	width: 90px;
	height: 100%;
	color: #fff;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
	background-color: #333;
	opacity: 0.8;
	-moz-opacity: 0.8;
	-webkit-opacity: 0.8;
	filter: alpha(opacity=80);
}

.slideCtrl.left {
	left: 0; 
	height: 150px;
}
.slideCtrl.right {
	right: 0;
	height: 150px;
}

/* slider-2 */
#slider-2.slideFrame {
	position: relative;
	height: 150px;
}
#slider-2 .slideCtrl {
	padding-top: 65px;
}