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
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link href="../css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/personalstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/headr.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery-1.5.min.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="../js/messages_ja.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#sqlflg").validate();
  });
</script>
</head>
<body onload="hidden()">
<div id="wrapper">
	<?php require("../common/header.php"); ?>
	<div id="contents">
			<p class="scheduletitle"><?php print(date_ja($year."/".$month."/".$day)."  ".$usernm); ?></p>
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
					<td><input id="name" name="editdate" type="text" readonly="readonly" value="<?php print($month."/".$day); ?>" /></td>
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
	         	<input type="hidden" id="personaldate" name="personaldate" value="<?php print($year."/".$month); ?>"/><br/>
			<p><input type="submit" value="EDIT" onclick="changeSqlFlg(2)"/></p>
			<p><input type="submit" value="DELETE" onclick="return changeSqlFlg(3)"/></p>
			<p><input type="submit" value="RETURN" onclick="changeSqlFlg('')"/></p>
	        </form>
		</div><!-- scheduling -->
	</div><!--contents-->

	<div id="footer">
		<?php for ($i = 6; $i < 26;  $i++) { ?>
		<script type="text/javascript">
		<!--
			changeEditData(<?php print($editdata[$i]); ?>, <?php print($i); ?>, 2);
		// -->
		</script>
<?php } ?>
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>