<?php
require_once '../Encode.php';
session_start();
$title = "SCHEDULING";
$editselect = $_POST['editselect'];
$editdate = $_POST['editdate'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  require("../sql/editworkschedulesql.php");
  $stt4->bindValue(':usercd', $editselect);
  $stt4->bindValue(':comcd', $_SESSION['comcd']);
  $stt4->bindValue(':bracd', $_SESSION['bracd']);
  $stt4->bindValue(':scheduledate', $editdate);
  $stt4->execute();
  $row = $stt4->fetch();
  $lastnm = e($row['LAST_NM']);
  $firstnm = e($row['FIRST_NM']);
  $usernm = $lastnm."  ".$firstnm;
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
<link href="../css/schedulingstyle.css" rel="stylesheet" type="text/css" />
</head>
<body onload="hidden()">
<div id="wrapper">
	<div id="header">
		<?php require("../common/header.php"); ?>
	</div><!-- header -->

	<div id="contents">
		<div id="scheduling">
			<p class="scheduletitle"><?php print(date_ja($editdate)."  ".$usernm); ?></p>
			<form method="POST" action="scheduling.php">
			<table id="table2" border="1">
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
					<td><input id="name" type="text" readonly="readonly" value="<?php print($usernm); ?>" /></td>
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
				<tr>
				</tr>
			</table>
			<input type="hidden" name="sqlflg" id="sqlflg"/>
	        <input type="hidden" id="editusercd" name="editusercd" value="<?php print($editselect); ?>"/>
	        <input type="hidden" id="scheduledate" name="scheduledate" value="<?php print($editdate); ?>"/>
	        <P class="left"><input type="submit" class="button" id="returnbutton" value=""/></P>
			<p class="right"><input type="submit" class="button" id="deletebutton" value="" onclick="return changeSqlFlg(3)"/></p>
			<p class="right"><input type="submit" class="button" id="updatebutton" value="" onclick="changeSqlFlg(2)"/></p>
			</form>
		</div><!-- scheduling -->
	</div><!-- contents -->

	<div id="footer">
		<?php for ($i = 6; $i < 26;  $i++) { ?>
		<script type="text/javascript">
		<!--
			changeEditData(<?php print($editdata[$i]); ?>, <?php print($i); ?>, 1);
		// -->
		</script>
		<?php } ?>
	</div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>