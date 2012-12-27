<?php
require_once '../Encode.php';
session_start();
$title = "SCHEDULING";
$rownum = $_POST["rownum"];
$scheduledate = $_POST["editdate"];
$messagelist = array();
try {
	$db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
	if ($_POST["updateflg"] == 2) {
		require("../sql/updateworkschedulesql.php");
	} else if ($rownum != "") {
		require("../sql/deleteworkschedulesql.php");
	}
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

			<!--  メッセージリスト  start-->
			<?php if (count($messagelist) > 0) {
				foreach ($messagelist as $message) {
				?>
				<ul class="message">
					<li><p class="message"><?php print($message); ?></p></li>
				</ul>
			<?php } }?>
			<!--  メッセージリスト  end-->

			<p class="scheduletitle"><?php print(date_ja($scheduledate)); ?></p>
			<form method="POST" action="scheduleedit.php">
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
					$usercd = e($row['USER_CD']);
					require("../common/editdata.php");
				?>
				<tr id="clickbox">
					<td>
						<input type="text" id="editname" readonly="readonly" value="<?php print($usernm); ?>" />
						<input type="hidden" id="usercd" name="usercd<?php print($rownum); ?>" value="<?php print($usercd); ?>"/>
					</td>
					<td></td>
					<?php for ($num = 16; $num < 36; $num++) { ?>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt<?php print($rownum.$num); ?>" class="bt" onclick="changeCheckbox('cb<?php print($rownum.$num); ?>', 'bt<?php print($rownum.$num); ?>', 1)"/>
						<input type="hidden" name="cb<?php print($rownum.$num); ?>" value="0"/>
						<input type="checkbox" id="cb<?php print($rownum.$num); ?>" name="cb<?php print($rownum.$num); ?>" class="checkbox" value="1"/>
					</td>
					<?php } ?>
					<td></td>
					<td><input type="submit" id="sdeletebutton" name="sdeletebutton<?php print($rownum); ?>" class="button" value="" onclick="return checkDelete(<?php print($rownum); ?>)"/></td>
				</tr>
				<?php $rownum++; } ?>
				<tr>
				</tr>
			</table>
			<input type="hidden" name="rownum" id="rownum" />
			<input type="hidden" name="updatenum" id="updatenum" value="<?php print($rownum); ?>"/>
			<input type="hidden" name="updateflg" id="updateflg"/>
			<input type="hidden" id="editdate" name="editdate" value="<?php print($scheduledate); ?>"/>
			<p class="right"><input type="submit" class="button" id="updatebutton" value="" onclick="onUpdate()"/></p>
			</form>
			<form name="returnform" method="POST" action="scheduling.php">
				<p class="left"><input type="submit" id="returnbutton" class="button" value=""/></p>
				<input type="hidden" id="scheduledate" name="scheduledate" value="<?php print($scheduledate); ?>"/>
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