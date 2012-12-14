<?php
require_once '../Encode.php';
session_start();
$title = "PERSONAL SCHEDULE";
$pesonaldate = $_POST["personaldate"];
$date = explode("/", $_POST["personaldate"]);
$year = $date[0];
$month = $date[1];
$sqlflg = $_POST["sqlflg"];
try {	
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  if ($sqlflg == 1) {
  require("../sql/insertpersonalschedulesql.php");	
  } else if ($sqlflg == 2) {
  require("../sql/updatepersonalschedulesql.php");	
  } else if ($sqlflg == 3) {
  require("../sql/deletepersonalschedulesql.php");	
  }

  require("../sql/membersql.php");
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();

  require("../sql/personalschedulesql.php");
  $stt3->bindValue(':userid', $_SESSION['userid']);
  $stt3->bindValue(':comcd', $_SESSION['comcd']);
  $stt3->bindValue(':bracd', $_SESSION['bracd']);
  $stt3->bindValue(':year', $year);
  $stt3->bindValue(':month', $month);
  $stt3->execute();

} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;
 charset=utf-8" />
<title>PERSONAL SCHEDULE</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="../js/headr.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<link href="../css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/personalstyle.css" rel="stylesheet" type="text/css" />
</head>
<body onload="hidden()">
<div id="wrapper">
	<?php require("../common/header.php"); ?>
	<div id="contents">
		<div id="calender">
			<form method="POST" action="personal.php"/>
			<select id="personaldate" name="personaldate" value="<?php print($personaldate); ?>">
				<option value="<?php print(date("Y/m")); ?>" selected><?php print(date("Y/m")); ?></option>
			    <?php 
			        for ($i = 1; $i < 6; $i++) {
			    		$personaldate = date("Y/m", strtotime("+".$i." month"));
			        	print('<option value="'.$personaldate.'"');
			        	print('>'.$personaldate.'</option>');
			      }
			    ?>
			</select><br/><br/>
			<input id="entrybutton" class="button" type="submit" value=""/>
        </form>
		</div><!-- calender -->
		<?php if (!$message == "") { ?>
			<ul class="message">
				<li><p class="message"><?php print($message); ?></p></li>
			</ul>
		<?php } ?>
		
		<?php if(!($pesonaldate == "")) { 
                $counter = 0;
        ?>
		<div id="workschedule">
			<p class="scheduletitle" ><?php print($year."年".$month."月"); ?></p>
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
	      			$monthdata = e($row['MONTH']);
	      			$daydata = e($row['DAY']);
	      			$toptag = $monthdata."/".$daydata;
	      			
	      			$datelist[$datenum] = $toptag;
	      			
					require("../common/personalscheduledata.php");
					$datenum++;
					$counter++; } 
	         		if ($counter == 0) {
          		?>
         		<tr><td colspan="44"><p class="scheduletitle">--まだデータは存在しません--</p></td></tr>
         		<?php } ?>
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
		</div><!-- workschedule -->

		<div id="editselect">
			<?php if ($counter != 0) { ?>
			<form method="POST" action="personaledit.php">
			<select id="date" name="editdate">
			    <?php 
			        for ($day = 1; $day < $datenum; $day++) {
			      		print('<option value="'.$datelist[$day].'"');
			        	print('>'.$datelist[$day].'</option>');		
			      }
			    ?>
			</select>
			<input type="hidden" class="button" name="edityear" value="<?php print($year); ?>" />
			<input type="submit" class="button" id="editbutton" value=""/>
			</form>
			<?php } ?>
		</div><!-- editselect -->

		<div id="scheduling">
			<form method="POST" action="personal.php">
			<table id="table2" border="1">
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
				<tr id="clickbox">
					<td><select id="insertdate" name="insertdate">
					    <?php 
					      for ($day = 1; $day < 32; $day++) {
					      	if ($day == 29 && $month == 2) {
					      		if(($year % 4) == 0) {
					      			print('<option value="'.$month."/".$day.'"');
					        		print('>'.$month."/".$day.'</option>');
					        		break;
					      		} else {
					      			break;	
					      		}
					      	} else if ($day == 31 && $month == 4) { 
					      		break;
					      	}
					        print('<option value="'.$month."/".$day.'"');
					        print('>'.$month."/".$day.'</option>');

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
			<p class="left"><input type="button" class="button" id="allbutton" onclick="allChange()"/></p>
			<p class="left"><input type="button"  class="button"id="clearbutton" onclick="allClear()"/></p>
			<input type="hidden" name="sqlflg" value="1"/>
			<p class="right"><input type="submit" class="button" id="registerbutton" value=""/></p>
			</form>
		</div><!-- scheduling -->
		<?php } ?>
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>