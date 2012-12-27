<?php
require_once '../Encode.php';
session_start();
$title = "PERSONAL SCHEDULE";
$date = explode("/", $_POST["editdate"]);
$year = $date[0];
$month = $date[1];
$rowdate = explode("/", $_POST["editrowdate"]);
$rowmonth = $rowdate[0];
$rowday = $rowdate[1];
$usernm = $_SESSION['username'];
$messagelist = array();
try {
	$db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
	if ($_POST["deleteflg"] == 3) {
		require("../sql/deletepersonalschedulesql.php");
	}
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
<title>SCHEDULING</title>
<?php require("../common/head.php"); ?>
<link href="../css/personalstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<?php require("../common/header.php"); ?>
	</div><!-- header -->

	<div id="contents">
		<!--  メッセージリスト  start-->
		<?php if (count($messagelist) > 0) {
			foreach ($messagelist as $message) {
			?>
			<ul class="message">
				<li><p class="message"><?php print($message); ?></p></li>
			</ul>
		<?php } }?>
		<!--  メッセージリスト  end-->

		<div id="scheduling">
			<p class="scheduletitle" ><?php print($year."年".$month."月"); ?></p>
		<form name="editform" method="POST" action="personaledit.php">
			<table id="schedulingtable" border="1">
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
				<?php
				$rownum = 1;
				while ($row = $stt3->fetch()) {
					$monthdata = e($row['MONTH']);
				$daydata = e($row['DAY']);
				$toptag = $monthdata."/".$daydata;
					require("../common/editdata.php");
				?>
				<form method="POST" action="personaledit.php">
				<tr id="clickbox">
					<td style="border-right: none;"><input type="text" id="dataname" name="editrowdate" class="transparent" readonly="readonly" value="<?php print($toptag); ?>" /></td>
					<td style="border-left: none;"></td>
					<?php for ($num = 16; $num < 36; $num++) { ?>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt<?php print($rownum.$num); ?>" class="bt" onclick="changeCheckbox('cb<?php print($rownum.$num); ?>', 'bt<?php print($rownum.$num); ?>', 2)"/>
						<input type="hidden" name="cb<?php print($rownum.$num); ?>" value="0"/>
						<input type="checkbox" id="cb<?php print($rownum.$num); ?>" name="cb<?php print($rownum.$num); ?>" class="checkbox" value="1"/>
					</td>
					<?php } ?>
					<td style="border-right: none;"></td>
					<td style="border-left: none;">
						<input type="hidden" name="editdate" value="<?php print($year."/".$month); ?>"/>
						<input type="hidden"  id="deleteflg" name="deleteflg" value="3"/>
						<input type="submit" id="sdeletebutton" name="sdeletebutton<?php print($rownum); ?>" value="" onclick="return checkDelete()"/>
					</td>
				</tr>
				</form>
				<?php $rownum++; } ?>
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
			</table>
			<input type="hidden" name="sqlflg" id="sqlflg"/>
			<input type="hidden" name="rownum" id="rownum" />
			<input type="hidden" name="editdate" value="<?php print($year."/".$month); ?>"/>
			<p class="right"><input type="submit" id="updatebutton" class="button" value="" /></p>
		</form>

		<!-- 仮想フォーム -->
		<form name="returnform" method="POST" action="personal.php">
				<p class="left"><input type="submit" id="returnbutton" class="button" value=""/></p>
		<input type="hidden" id="personaldate" name="personaldate" value="<?php print($year."/".$month); ?>" />
		</form>
		<!-- 仮想フォーム -->

		</div><!-- scheduling -->
	</div><!-- contents -->

	<div id="footer">
		<?php
		for ($j = 1; $j < $rownum + 1;  $j++) {
			for ($i = 16; $i < 36;  $i++) {
		?>
		<script type="text/javascript">
		<!--
			changeEditColor(<?php print($editdata[$j.$i]); ?>, <?php print($j.$i); ?>, 2);
			hiddenCheckBox(<?php print($j.$i); ?>);
		// -->
		</script>
		<?php } } ?>
	</div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>