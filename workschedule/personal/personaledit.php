<?php
require_once '../Encode.php';
session_start();
$title = "PERSONAL SCHEDULE";
$year = $_POST['edityear'];
$date = explode("/", $_POST["editdate"]);
$month = $date[0];
$day = $date[1];
$usernm = $_SESSION['username'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  require("../sql/editpersonalschedulesql.php");
  $stt5->bindValue(':userid', $_SESSION['userid']);
  $stt5->bindValue(':year', $year);
  $stt5->bindValue(':month', $month);
  $stt5->bindValue(':day', $day);
  $stt5->execute();
  $row = $stt5->fetch();
  require("../common/editdata.php");
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
<link href="../css/personalstyle.css" rel="stylesheet" type="text/css" />
</head>
<body onload="hidden()">
<div id="wrapper">
	<div id="header">
		<?php require("../common/header.php"); ?>
	</div><!-- header -->

	<div id="contents">
		<div id="scheduling">
			<p class="scheduletitle"><?php print(date_ja($year."/".$month."/".$day)."  ".$usernm); ?></p>
			<form method="POST" action="personal.php">
			<table id="table2" border="1">
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
				<tr id="clickbox">
					<td><input id="name" name="editdate" class="transparent" type="text" readonly="readonly" value="<?php print($month."/".$day); ?>" /></td>
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
			<input type="hidden" name="sqlflg" id="sqlflg" />
	        <input type="hidden" id="personaldate" name="personaldate" value="<?php print($year."/".$month); ?>"/>
			<p class="left"><input type="submit" id="returnbutton" class="button" value="" onclick="changeSqlFlg('')"/></p>
			<p class="right"><input type="submit" id="deletebutton" class="button" value="DELETE" onclick="return changeSqlFlg(3)"/></p>
			<p class="right"><input type="submit" id="updatebutton" class="button" value="" onclick="changeSqlFlg(2)"/></p>
	        </form>
		</div><!-- scheduling -->
	</div><!-- contents -->

	<div id="footer">
		<?php for ($i = 6; $i < 26;  $i++) { ?>
		<script type="text/javascript">
		<!--
			changeEditData(<?php print($editdata[$i]); ?>, <?php print($i); ?>, 2);
		// -->
		</script>
		<?php } ?>
	</div><!-- footer -->
</div><!-- wrapper -->
</body>

</html>