<?php
require_once '../Encode.php';
session_start();
$title = "SCHEDULING";
$rownum = 1;
$namenum = 0;
$scheduledate = $_POST['scheduledate'];
$sqlflg = $_POST['sqlflg'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  if ($sqlflg == 1) {
  require("../sql/insertworkschedulesql.php");	
  } else if ($sqlflg == 2) {
  require("../sql/updateworkschedulesql.php");	
  } else if ($sqlflg == 3) {
  require("../sql/deleteworkschedulesql.php");	
  }
  require("../sql/membersql.php");
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();
  require("../sql/workschedulesql.php");
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
<title>SCHEDULING</title>
<?php require("../common/head.php"); ?>
<link href="../css/schedulingstyle.css" rel="stylesheet" type="text/css" />
</head>
<body onload="hidden()">
<div id="wrapper">
	<div id="header">
		<?php require("../common/header.php"); ?>
	</div><!-- header -->

	<div id="contents">
		<div class="calender-code">
	        <form action="javascript:void(0);">
	        <input id="calendar_hm3" name="calendar_hm3" readonly="readonly" type="text" value="<?php
	         if ($scheduledate == "") {
	         	print(date("Y/m/d"));
	         	} else {
	         	print($scheduledate);
	         	} ?>"/>
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
	        <form method="POST" action="scheduling.php"/>
	          <input type="hidden" id="scheduledate" name="scheduledate"/><br/>
	          <input type="submit" class="button" id="entrybutton" value="" onClick="changeDate()"/>
	        </form>
    	</div><!-- calender-code -->

    	<?php if (!$message == "") { ?>
			<ul class="message">
				<li><p class="message"><?php print($message); ?></p></li>
			</ul>
		<?php } ?>
    	<?php if(!($scheduledate == "")) { 
        ?>
		<div id="workschedule">
			<div id="schedulelist">
				<p class="scheduletitle" ><?php print(date_ja($scheduledate)); ?></p>
				<?php if ($row = $stt2->fetch()) { ?> 
				<table id="workscheduletable">
					<tr>
						<th>[NAME]</th>
						<th>[h]</th>
						<?php for ($num = 6; $num < 24; $num++) { ?>
						<th colspan="2"><?php print($num); ?></th>
						<?php } 
							  for ($num = 0; $num < 3; $num++) {
						?>
						<th colspan="2"><?php print($num); ?></th>
						<?php } ?>					
					</tr>
					<?php while ($row = $stt2->fetch()) { 
		      			$lastnm = e($row['LAST_NM']);
		      			$firstnm = e($row['FIRST_NM']);
		      			$toptag = $lastnm."  ".$firstnm;
		      			$usercd = e($row['USER_CD']);
		      			$usercdlist[$namenum] =  $usercd;
		      			$namelist[$namenum] = $toptag;
		      			$sumhours = $sumhours + e($row['HOURS']);
						require("../common/workscheduledata.php");
						 $namenum++;} ?>
	         		<tr>
						<th></th>
						<th>計:<?php print($sumhours); ?></th>
						<?php for ($num = 6; $num < 24; $num++) { ?>
						<th colspan="2"><?php print($num); ?></th>
						<?php } 
							  for ($num = 0; $num < 3; $num++) {
						?>
						<th colspan="2"><?php print($num); ?></th>
						<?php } ?>					
					</tr>
				</table>
			</div><!-- shedulelist -->

			<div id="editselect">
				<form method="POST" action="scheduleedit.php">
				<select id="editselect" name="editselect">
				    <?php 
				      for ($i = 0; $i < $namenum; $i++) {
				        print('<option value="'.$usercdlist[$i].'"');
				        print('>'.$namelist[$i].'</option>');
				      }
				    ?>
				</select>
				<input type="hidden" id="editdate" name="editdate" value="<?php print($scheduledate); ?>"/>
				<input type="submit" class="button" id="editbutton" value=""/>
				</form>
			</div><!-- editselect -->

			<?php } else { ?>
			<p class="scheduletitle">--まだデータは存在しません--</p>
			<?php } ?>
		</div><!-- workschedule -->

		<div id="scheduling">
			<form method="POST" action="scheduling.php">
			<table id="table2" border="1">
				<tr><th class="registertitle" colspan="43">NEW SCHEDULE</th></tr>
				<tr>
					<th>[NAME]</th>
					<?php for ($num = 6; $num < 24; $num++) { ?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } 
						  for ($num = 0; $num < 3; $num++) {
					?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } ?>					
				</tr>
				<tr id="clickbox">
					<td><select id="nameselect" name="nameselect">
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
					<?php for ($num = 6; $num < 26; $num++) { ?>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt<?php print($num); ?>" class="bt" onclick="changeCheckbox('cb<?php print($num); ?>', 'bt<?php print($num); ?>', 1)"/>
						<input type="hidden" name="cb<?php print($num); ?>" value="0"/>
						<input type="checkbox" id="cb<?php print($num); ?>" name="cb<?php print($num); ?>" class="checkbox" value="1"/>
					</td>
					<?php } ?>
					<td></td>
				</tr>
				<tr></tr>
			</table>
			<input type="hidden" name="scheduledate" value="<?php print($scheduledate); ?>"/>
			<input type="hidden" name="sqlflg" value="1"/>
			<p><input type="submit" class="button" id="registerbutton" value=""/></p>
			</form>
		</div><!-- scheduling -->

		<?php } ?>
	</div><!-- contents -->

	<div id="footer">
	</div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>