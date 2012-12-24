<?php
require_once '../Encode.php';
session_start();
$title = "PERSONAL SCHEDULE";
$personaldate = $_POST["personaldate"];
$date = explode("/", $_POST["personaldate"]);
$year = $date[0];
$month = $date[1];
$sqlflg = $_POST["sqlflg"];
$messagelist = array();
try {	
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  
if ($sqlflg == 1) {
	require("../common/checkpersonalschedule.php");
	if (count($messagelist) == 0) { 
			require("../sql/insertpersonalschedulesql.php");	
	}
}
  require("../sql/membersql.php");
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();

  require("../sql/personalschedulesql.php");

} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>PERSONAL SCHEDULE</title>
<?php require("../common/head.php"); ?>
<link href="../css/personalstyle.css" rel="stylesheet" type="text/css" />
</head>
<body onload="hidden()">
<div id="wrapper">
	<div id="header">
		<?php require("../common/header.php"); ?>
	</div><!-- header -->

	<div id="contents">
		<div id="monthlist">
			<form method="POST" action="personal.php"/>
			<select id="personaldate" name="personaldate" >
				<option value="<?php print(date("Y/m")); ?>" selected><?php print(date("Y/m")); ?></option>
			    <?php 
			        for ($i = 1; $i < 6; $i++) {
			    		$selectdate = date("Y/m", strtotime("+".$i." month"));
			    		if ($selectdate == $personaldate) {
			    			print('<option value="'.$selectdate.'"');
			        		print('selected >'.$selectdate.'</option>');
			    		} else {
			        		print('<option value="'.$selectdate.'"');
			        		print('>'.$selectdate.'</option>');
			        }
			      }
			    ?>
			</select><br/><br/>
			<input id="entrybutton" class="button" type="submit" value=""/>
        	</form>
		</div><!-- calender -->

		<!--  メッセージリスト  start-->
		<?php if (count($messagelist) > 0) { 
			foreach ($messagelist as $message) {
			?>
			<ul class="message">
				<li><p class="message"><?php print($message); ?></p></li>
			</ul>
		<?php } }?>
		<!--  メッセージリスト  end-->
		
		<?php if ($personaldate != "") { 
                $counter = 0;
        ?>
		<div id="workschedule">
			<p class="scheduletitle" ><?php print($year."年".$month."月"); ?></p>
			<?php if ($row = $stt3->fetch()) {
				require("../sql/personalschedulesql.php");
			 ?>
			<table id="personalscheduletable">
				<tr>
					<th>[DATE]</th>
					<?php for ($num = 6; $num < 24; $num++) { ?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } 
						  for ($num = 0; $num < 3; $num++) {
					?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } ?>
				</tr>

				<?php $datenum = 1;
				while ($row = $stt3->fetch()) { 
	      			$monthdata = sprintf("%02d", e($row['MONTH']));
	      			$daydata = sprintf("%02d", e($row['DAY']));
	      			$toptag = $monthdata."/".$daydata;
	      			
	      			$datelist[$datenum] = $toptag;      			
					require("../common/personalscheduledata.php");
					$datenum++; } ?>
				<tr>
					<th></th>
					<?php for ($num = 6; $num < 24; $num++) { ?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } 
						  for ($num = 0; $num < 3; $num++) {
					?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } ?>
				</tr>
			</table>
			<form method="POST" action="personaledit.php">
				<input  type="hidden" name="editdate" value="<?php print($personaldate); ?>"/>
				<p class="right"><input type="submit" id="editbutton" class="button" value=""/></p>
			</form>
		</div><!-- workschedule -->

		<?php } else { ?>
			<p class="scheduletitle">--まだデータは存在しません--</p>
		<?php } ?>

		<div id="scheduling">
			<form method="POST" action="personal.php">
			<table id="schedulingtable" border="1">
				<tr><th class="registertitle" colspan="43">NEW PERSONAL SCHEDULE</th></tr>
				<tr>
					<th>[DATE]</th>
					<?php for ($num = 6; $num < 24; $num++) { ?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } 
						  for ($num = 0; $num < 3; $num++) {
					?>
					<th colspan="2"><?php print($num); ?></th>
					<?php } ?>					
				</tr>
				<tr>
					<td><select id="insertdate" name="insertdate">
					    <?php 
					      $count = 0;
					      for ($day = 1; $day < 32; $day++) {
					      	$break_flag = false;
					      	$day2 = sprintf("%02d", $day);
					      	$date = $month."/".$day2;
					      	for ($daynum = 1; $daynum < $datenum; $daynum++) {
			      				if ($datelist[$daynum] == $date) {
			      					$break_flag = true;
			      					break;
			      				}
			      			}
			      			if($break_flag) {
        					continue;
			      			}
        					$count++;
					      	if ($day == 29 && $month == 2) {
					      		if (($year % 4) == 0) {
					      			print('<option value="'.$date.'"');
					        		print('>'.$date.'</option>');
					        		break;
					      		} else {
					      			break;	
					      		}
					      	} else if ($day == 31 && $month == 4) { 
					      		break;
					      	}
					        print('<option value="'.$date.'"');
					        print('>'.$date.'</option>');
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
						<input type="button" id="bt<?php print($num); ?>" class="bt" onclick="changeCheckbox('cb<?php print($num); ?>', 'bt<?php print($num); ?>', 2)"/>
						<input type="hidden" name="cb<?php print($num); ?>" value="0"/>
						<input type="checkbox" id="cb<?php print($num); ?>" name="cb<?php print($num); ?>" class="checkbox" value="1"/>
					</td>
					<?php } ?>
					<td></td>
				    </tr>
				<tr>
				</tr>
			</table>
			<input type="hidden" name="personaldate" value="<?php print($year."/".$month); ?>" />
			<p class="left"><input type="button" id="allbutton" class="button" onclick="allChange()"/></p>
			<p class="left"><input type="button" id="clearbutton" class="button" onclick="allClear()"/></p>
			<input type="hidden" name="sqlflg" value="1"/>
			<?php if($count != 0) { ?>
			<p class="right"><input type="submit"  id="registerbutton" class="button" value=""/></p>
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