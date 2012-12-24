<?php
require_once '../Encode.php';
session_start();
$title = "SCHEDULING";
$rownum = 1;
$namenum = 0;
$scheduledate = $_POST['scheduledate'];
$sqlflg = $_POST['sqlflg'];
$messagelist = array();
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
if (!$sqlflg == "") {
	require("../common/checkscheduling.php");
	if (count($messagelist) == 0) { 
  		if ($sqlflg == 1) {
  			require("../sql/insertworkschedulesql.php");	
  		} 
  	}
}

  require("../sql/membersql.php");
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();
  require("../sql/workschedulesql.php");
  
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

    	<!--  メッセージリスト  -->
		<?php if (count($messagelist) > 0) { 
			foreach ($messagelist as $message) {
			?>
			<ul class="message">
				<li><p class="message"><?php print($message); ?></p></li>
			</ul>
		<?php } }?>
		
    	<?php if(!($scheduledate == "")) { 
        ?>
		<div id="workschedule">
			<div id="schedulelist">
				<p class="scheduletitle" ><?php print(date_ja($scheduledate)); ?></p>
				<?php if ($row = $stt2->fetch()) { 
					require("../sql/workschedulesql.php");
				?> 
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
				<form method="POST" action="scheduleedit.php">
					<input type="hidden" name="editdate" value="<?php print($scheduledate); ?>"/>
					<p class="right"><input type="submit" class="button" id="editbutton" value=""/></p>
				</form>
			</div><!-- shedulelist -->

			<?php } else { ?>
			<p class="scheduletitle">--まだデータは存在しません--</p>
			<?php } ?>
		</div><!-- workschedule -->

		<div id="scheduling">
			<form method="POST" action="scheduling.php">
			<table id="schedulingtable" border="1">
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
					      $count = 0; 
					      while ($row = $stt->fetch()) {
			      			$break_flag = false;
					      	$usercd = e($row['USER_CD']);
					      	$lastnm = e($row['LAST_NM']);
					      	$firstnm = e($row['FIRST_NM']);
					      	$username = $lastnm."  ".$firstnm;
					      	for ($i = 0; $i < $namenum; $i++) {
					      		if ($username == $namelist[$i]) {
			      					$break_flag = true;
			      					break;
					      		}				       			 
				      		}
				      		if ($break_flag) {
				      			continue;
				      		}
				      		$count++;
					        print('<option value="'.$usercd.'"');
					        print('>'.$username.'</option>');
					      }
					      if ($count == 0) {
					   	  	print('<option >'."---NOT--".'</option>');
					   	
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
			<?php if ($count > 0) { ?>
			<p class="right"><input type="submit" class="button" id="registerbutton" value=""/></p>
			<?php } ?>
			</form>
		</div><!-- scheduling -->

		<?php } ?>
	</div><!-- contents -->

	<div id="footer">
	</div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>