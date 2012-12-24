<?php
require_once '../Encode.php';
session_start();
$title = "SCHEDULING";
$scheduledate = $_POST['editdate'];
print($scheduledate);
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
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
		<div id="scheduling">
			<p class="scheduletitle"><?php print(date_ja($editdate)."  ".$usernm); ?></p>
			<form method="POST" action="scheduling.php">
			<table id="schedulingtable" border="1">
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
				<?php
					$rownum = 1; 
					while ($row = $stt2->fetch()) { 
					$lastnm = e($row['LAST_NM']);
				    $firstnm = e($row['FIRST_NM']);
  					$usernm = $lastnm."  ".$firstnm;
  					require("../common/editdata.php");
				?>
				<tr id="clickbox">
					<td><input id="editname" type="text" readonly="readonly" value="<?php print($usernm); ?>" /></td>
					<td></td>
					<?php for ($num = 16; $num < 36; $num++) { ?>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt<?php print($rownum.$num); ?>" class="bt" onclick="changeCheckbox('cb<?php print($rownum.$num); ?>', 'bt<?php print($rownum.$num); ?>', 1)"/>
						<input type="hidden" name="cb<?php print($rownum.$num); ?>" value="0"/>
						<input type="checkbox" id="cb<?php print($rownum.$num); ?>" name="cb<?php print($rownum.$num); ?>" class="checkbox" value="1"/>
					</td>
					<?php } ?>
					<td></td>
					<td><input type="submit" id="sdeletebutton" class="button" value=""/></td>
				</tr>
				<?php $rownum++; } ?>
				<tr>
				</tr>
			</table>
			<input type="hidden" name="sqlflg" id="sqlflg"/>
	        <input type="hidden" id="editusercd" name="editusercd" value="<?php print($editselect); ?>"/>
	        <input type="hidden" id="scheduledate" name="scheduledate" value="<?php print($editdate); ?>"/>
	        <P class="left"><input type="submit" class="button" id="returnbutton" value=""/></P>
			<p class="right"><input type="submit" class="button" id="deletebutton" value="" onclick="return changeSqlFlg(3)"/></p>
			<p class="right"><input type="submit" class="button" id="updatebutton" value="" onclick="return checkUpdateSchedule(2)"/></p>
			</form>
		</div><!-- scheduling -->
	</div><!-- contents -->

	<div id="footer">
		<?php 
		for ($j = 1; $j < $rownum + 1;  $j++) {
			for ($i = 16; $i < 36;  $i++) { 
		?>
		<script type="text/javascript">
		<!--
			changeEditColor(<?php print($editdata[$j.$i]); ?>, <?php print($j.$i); ?>, 1);
			hiddenCheckBox(<?php print($j.$i); ?>);
		// -->
		</script>
		<?php } } ?>
	</div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>