<?php
require_once '../Encode.php';
session_start();
$title = "MASTER";
$rownum = 1;
$sqlflg = $_POST['sqlflg12'];
$sqlflg23 = $_POST['sqlflg23'];
print($sqlflg);
try {
	$db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
	require("../sql/editmastersql.php");
	$row2 = $stt2->fetch();

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
			<table class="registration" >
				<tr>
					<th colspan="4">[ EDIT MANAGER ]</th>
				</tr>
				<tr>
					<th class="registertitle" colspan="4">COMPANY&BRANCH-OFFICE</th>
				</tr>
				<tr>
					<th>COMPANY CODE:</th>
					<td><input id="comcd" name="comcd" class="read" type="text" readonly="readonly" value="<?php print(e($row2['COM_CD'])); ?>" /></td>
					<th>COMPANY NAME:</th>
					<td><input id="comnm" name="comnm" class="read" type="text" value="<?php print(e($row2['COM_NM'])); ?>" /></td>
				</tr>
				<tr>
					<th>BRANCH CODE:</th>
					<td><input id="bracd" name="bracd" class="read" type="text" readonly="readonly" value="<?php print(e($row2['BRA_CD'])); ?>" /></td>
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
					<td><input id="usercd" name="usercd" class="read" type="text" readonly="readonly" value="<?php print(e($row2['USER_CD'])); ?>" ></td>
					<th>LAST NAME:</th>
					<td><input id="lastnm" name="lastnm" class="read" type="text" readonly="readonly" value="<?php print(e($row2['LAST_NM'])); ?>" ></td>
					<th>FIRST NAME:</th>
					<td><input id="firstnm" name="firstnm" class="read" type="text" readonly="readonly" value="<?php print(e($row2['FIRST_NM'])); ?>" ></td>
				</tr>
			</table>
			<input type="hidden" name="sqlflg" id="sqlflg" value="2"/>
			<P class="left"><input type="submit" class="button" id="returnbutton" value=""/></P>
			<p class="right"><input type="submit" class="button" id="deletebutton" value="" onclick="return changeSqlFlg(3)"/></p>
			<p class="right"><input type="submit" class="button" id="updatebutton" value=""/></p>
		</div><!-- registerinfo -->
		</form>
	</div><!-- contents -->

	<div id="footer">
	</div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>