<?php
require_once '../Encode.php';
session_start();
$title = "PERSONAL SCHEDULE";
$editselect = $_POST['editselect'];
$editdate = $_POST['editdate'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  require("../sql/workschedulesql2.php");
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
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link href="../css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/schedulingstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/headr.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
</head>
<body onload="hidden()">
<div id="wrapper">
	<?php require("../common/header.php"); ?>
	<div id="contents">
		<div id="scheduling">
			<p class="scheduletitle"><?php print(date_ja($editdate)."  ".$usernm); ?></p>
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
			<p><input type="submit" value="EDIT"/></p>
			<p><input type="submit" value="DELETE"/></p>
	         	<input type="hidden" id="scheduledate" name="scheduledate" value="<?php print($editdate); ?>"/><br/>
	          	<input type="submit" value="RETURN"/>
	        </form>
		</div><!-- scheduling -->
	</div><!--contents-->

	<div id="footer">
		<?php for ($i = 6; $i < 25;  $i++) { ?>
		<script type="text/javascript">
		<!--
			changeEditData(<?php print($editdata[$i]); ?>, <?php print($i); ?>);
		// -->
		</script>
<?php } ?>
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>