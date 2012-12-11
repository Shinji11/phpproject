<?php
require_once '../Encode.php';
session_start();
$rownum = 1;
$scheduledate = $_POST['scheduledate'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  $stt = $db->prepare('SELECT * FROM AM_MEMBER ME 
                          INNER JOIN AM_CD A001 
                                  ON A001.GROUP_CD = "A001"
                                 AND A001.KEY_ITEM1 = ME.AUTHORITY_CD
                               WHERE ME.COM_CD = :comcd 
                                 AND ME.BRA_CD = :bracd
                            ORDER BY ME.USER_CD');
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();
  $stt2 = $db->prepare('SELECT * FROM WORK_SCHEDULE WS 
                          INNER JOIN AM_MEMBER ME 
                                  ON ME.USER_ID = WS.USER_ID
                               WHERE ME.COM_CD = :comcd 
                                 AND ME.BRA_CD = :bracd 
                                 AND WS.SCHEDULE_DATE = :scheduledate 
                            ORDER BY ME.USER_CD');
  $stt2->bindValue(':comcd', $_SESSION['comcd']);
  $stt2->bindValue(':bracd', $_SESSION['bracd']);
  $stt2->bindValue(':scheduledate', $scheduledate);
  $stt2->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link id="calendar_style" href="../protocalendar/stylesheets/simple.css" media="screen" rel="Stylesheet" type="text/css" />
<link href="../css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/schedulingstyle.css" rel="stylesheet" type="text/css" />
<script src="../protocalendar/lib/prototype.js" type="text/javascript"></script>
<script src="../protocalendar/lib/effects.js" type="text/javascript"></script>
<script src="../protocalendar/javascripts/protocalendar.js" type="text/javascript"></script>
<script src="../protocalendar/javascripts/lang_ja.js" type="text/javascript"></script>
<script src="../protocalendar/javascripts/lang_zh-cn.js" type="text/javascript"></script>
<script src="../protocalendar/javascripts/lang_zh-tw.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/headr.js"></script>
<script type="text/javascript" src="../js/scheduling.js"></script>
</head>
<body onload="hidden()">
<div id="wrapper">
	<?php require("../common/header.php"); ?>
	<div id="contents">
		<div class="calender-code">
	        <form action="javascript:void(0);">
	        <input id="calendar_hm3" name="calendar_hm3" type="text" value="<?php print($scheduledate); ?>"/>
	        <input type="button" id="calendar_hm3_icon" />
	        <script type="text/javascript" id="cal-script3">
	            InputCalendar.createOnLoaded('calendar_hm3',
	                          {alignTo: 'calendar_hm3_icon',
	                            format: 'yyyy/mm/dd',
	                            enableHourMinute: false,
	                            lang: 'ja',
	                            triggers: ['calendar_hm3_icon']});
	        </script>
	        </form>
	        <form method="POST" action="scheduling.php?title=SCHEDULING"/>
	          <input type="hidden" id="scheduledate" name="scheduledate"/><br/>
	          <input type="submit" value="WORK SCHEDULE" onClick="changeDate()"/>
	        </form>
    	</div><!-- calender-code -->
    	
    	<?php if(!($scheduledate == "")) { 
                $counter = 0;
        ?>
		<div id="workschedule">
			<p class="pschedule" ><?php print(date_ja($scheduledate)); ?></p>
			<table id="table">
				<tr>
					<th></th>
					<?php for ($num = 6; $num < 24; $num++) { ?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } 
						  for ($num = 0; $num < 4; $num++) {
					?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } ?>					
				</tr>
				<?php while ($row = $stt2->fetch()) { 
	      			$lastnm = e($row['LAST_NM']);
	      			$firstnm = e($row['FIRST_NM']);
	      			$usernm = $lastnm."  ".$firstnm;
	      			
					require("../common/scheduledata.php");
					
					$counter++; } 
	         		if ($counter == 0) {
          		?>
         		<tr><td colspan="44"><p class="pschedule">--まだデータは存在しません--</p></td></tr>
         		<?php } ?>
				<tr>
					<th></th>
					<?php for ($num = 6; $num < 24; $num++) { ?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } 
						  for ($num = 0; $num < 4; $num++) {
					?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } ?>					
				</tr>
			</table>
			
		</div><!-- workschedule -->


		<div id="scheduling">
			<form method="POST" action="scheduling.php?title=SCHEDULING">
			<table id="table2" border="1">
				<tr>
					<th></th>
					<?php for ($num = 6; $num < 24; $num++) { ?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } 
						  for ($num = 0; $num < 4; $num++) {
					?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } ?>					
				</tr>
				<tr id="clickbox">
					<td><select id="name" name="name">
						<option value=""></option>
					    <?php 
					      while ($row = $stt->fetch()) {
					      	$usercd = e($row['USER_CD']);
					      	$lastnm = e($row['LAST_NM']);
					      	$firstnm = e($row['FIRST_NM']);
					        print('<option value="'.$usercd.'"');
					        print('>'.$lastnm."  ".$firstnm.'</option>');
					      }
					    ?>
					    </select>
					</td>
					<td></td>
					<?php for ($num = 6; $num < 24; $num++) { ?>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt<?php print($num); ?>" class="bt" onclick="changeCheckbox('cb<?php print($num); ?>', 'bt<?php print($num); ?>')"/>
						<input type="hidden" name="cb<?php print($num); ?>" value="0"/>
						<input type="checkbox" id="cb<?php print($num); ?>" name="cb<?php print($num); ?>" class="checkbox" value="1"/>
					</td>
					<?php } 
						  for ($num = 0; $num < 3; $num++) {
					?>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt<?php print($num); ?>" class="bt" onclick="changeCheckbox('cb<?php print($num); ?>', 'bt<?php print($num); ?>')"/>
						<input type="hidden" name="cb<?php print($num); ?>" value="0"/>
						<input type="checkbox" id="cb<?php print($num); ?>" name="cb<?php print($num); ?>" class="checkbox" value="1"/>
					</td>
					<?php } ?>
					<td></td>
				    </tr>
				<tr>
				</tr>
			</table>
			<p><input type="submit" value="REGISTER"/></p>
			</form>
		</div><!-- scheduling -->
		<?php } ?>
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>