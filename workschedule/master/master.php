<?php
require_once '../Encode.php';
session_start();
$title = "MASTER";
$rownum = 1;
$sqlflg = $_POST['sqlflg'];
$messagelist = array();
print($sqlflg);
try {
	$db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');


	if ($sqlflg == 1) {
		require("../common/checkmanager.php");
		if (count($messagelist) == 0) {
			require("../sql/insertmanagersql.php");
		}
	} else if ($sqlflg == 2) {
		require("../common/checkmanager.php");
		if (count($messagelist) == 0) {
			require("../sql/updatemanagersql.php");
			}
	} else if ($sqlflg == 3) {
		require("../sql/deletemanagersql.php");
	}
	require("../sql/managersql.php");

} catch(PDOException $e) {
	die('エラーメッセージ：'.$e->getMessage());
}
?>
<html>
<head>
<title>MEMBER</title>
<?php require("../common/head.php"); ?>
<link href="../css/masterstyle.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="wrapper">
	<div id="header">
		<?php require("../common/header.php"); ?>
	</div><!-- header -->

	<div id="contents">
		<form method="POST" action="master.php">
		<div id="registerinfo">
			<!--  メッセージリスト  -->
			<?php if (count($messagelist) > 0) {
				foreach ($messagelist as $message) {
				?>
				<ul class="message">
					<li><p class="message"><?php print($message); ?></p></li>
				</ul>
			<?php } }?>
			<!-- メッセージリスト -->

			<table class="registration" >
				<tr>
					<th colspan="4">[ NEW MANAGER ]</th>
				</tr>
				<tr>
					<th class="registertitle" colspan="4">COMPANY&BRANCH-OFFICE</th>
				</tr>
				<tr>
					<th>COMPANY CODE:</th>
					<td><input id="comcd" name="comcd" class="read" type="text" value="<?php print(e($row2['COM_CD'])); ?>" /></td>
					<th>COMPANY NAME:</th>
					<td><input id="comnm" name="comnm" class="read" type="text" value="<?php print(e($row2['COM_NM'])); ?>" /></td>
				</tr>
				<tr>
					<th>BRANCH CODE:</th>
					<td><input id="bracd" name="bracd" class="read" type="text" value="<?php print(e($row2['BRA_CD'])); ?>" /></td>
					<th>BRANCH NAME:</th>
					<td><input id="branm" name="branm" class="read" type="text" value="<?php print(e($row2['BRA_NM'])); ?>" ></td>
				</tr>
			</table>
			<br/>
			<table class="registration" >
				<tr>
					<th class="registertitle" colspan="6">MANAGER</th>
				</tr>
				<tr>
					<th>BRANCH ID:</th>
					<td><input id="usercd" name="usercd" class="read" type="text" ></td>
					<th>LAST NAME:</th>
					<td><input id="lastnm" name="lastnm" class="read" type="text" ></td>
					<th>FIRST NAME:</th>
					<td><input id="firstnm" name="firstnm" class="read" type="text" ></td>
				</tr>
				<tr>
					<td></td>
					<th>PASSWORD</th>
					<td><input id="password" name="password" class="read" type="password" /></td>
					<th>CONFIRM PASSWORD</th>
					<td><input id="password2" class="read" type="password" /></td>
					<td></td>
				<tr>
			</table>
			<input type="hidden"  id="sqlflg" name="sqlflg"/>
			<p><input class="button" id="registerbutton" type="submit" value="" onclick="changeSqlFlg(1)"></p>
		</div><!-- registerinfo -->
		</form>

		<div id="managerlist">
			<table id="manager" border="1">
				<tr>
					<th>NO</th>
					<th>COMPANY</th>
					<th>BRANCH OFFICE</th>
					<th>MANAGERNAME</th>
					<th>EDIT</th>
				</tr>
				<?php while ($row = $stt->fetch()) {
					$lastname = e($row['LAST_NM']);
					$firstname = e($row['FIRST_NM']);
					$comcd = e($row['COM_CD']);
					$bracd = e($row['BRA_CD']);
					$usercd = e($row['USER_CD']);
					$userid = $comcd.$bracd.$usercd;
					$name = $lastname."  ".$firstname;
					?>
				<form method="POST" action="masteredit.php">
				<tr>

					<td><?php print($rownum) ?></td>
					<td><?php print(e($row['COM_NM'])); ?></td>
					<td><?php print(e($row['BRA_NM'])); ?></td>
					<td><?php print($name); ?></td>
					<td>
						<input type="hidden" name="edituserid" value="<?php print($userid); ?>"/>
						<input class="button" id="editbutton" type="submit" value="" />
					</td>
				</tr>
				</form>
				<?php $rownum++; } ?>
			</table>
		</div><!-- managerlist -->
	</div><!-- contents -->

	<div id="footer">
	</div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>