<?php
require_once '../Encode.php';
session_start();
$rownum = 1;
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  $stt = $db->prepare('SELECT * FROM AM_MEMBER ME 
  	                      INNER JOIN AM_COM CO
  	                              ON CO.BRA_CD = ME.BRA_CD
  	                           WHERE ME.DEL_FLG = "0"
  	                             AND ME.AUTHORITY_CD = "2"
  	                        ORDER BY CO.COM_NM');
  $stt->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
 charset=utf-8" />
<title>MEMBER</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="../js/headr.js"></script>
<link href="../css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/masterstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<?php require("../common/header.php"); ?>

	<div id="contents">
		<div id="registerinfo">
		<form method="POST" action="master.php">
		<table class="registration" >
			<tr>
				<th class="title" colspan="4">COMPANY&BRANCH-OFFICE</th>
			</tr>
			<tr>
				<th>CompanyCode:</th>
				<td><input id="comcd" name="comcd" type="text"></td>
				<th>CompanyName:</th>
				<td><input id="comnm" name="comnm" type="text"></td>
			</tr>
			<tr>	
				<th>BranchCode:</th>
				<td><input id="bracd" name="bracd" type="text"></td>
				<th>BranchName:</th>
				<td><input id="branm" name="branm" type="text"></td>
			</tr>
		</table>
		<br/>
		<table class="registration" >	
			<tr>
				<th class="title" colspan="6">MANAGER</th>
			</tr>
				<th>EmployeeNumber:</th>
				<td><input id="comid" name="comid" type="text"></td>
				<th>LastName:</th>
				<td><input id="lastnm" name="lastnm" type="text"></td>
				<th>FirstName:</th>
				<td><input id="firstnm" name="firstnm" type="text"></td>
			</tr>
			<tr>
				<th>Sex:</th>
				<td><select id="sexcd" name="sexcd" >
					<?php
					$sexes = array('男','女');
					foreach ($sexes as $sex) {
						if ($sex == '男') { 
							print('<option value="1" selected >'.$sex.'</option>');
						} elseif ($sex == '女') { 
							print('<option value="2" >'.$sex.'</option>');
						}
					}
					?>
					</select>
					<input id="authority" name="authority" type="hidden" value="2">
					<input id="title" name="title" type="hidden" value="MASTERs">
				</td>
				<th>Password</th>
				<td><input id="password" name="password" type="password"/></td>
				<th>Confirm Password</th>
				<td><input id="password2" type="password"/></td>
			<tr>
		</table>
		<p><input id="register" type="submit" value="REGISTER"></p>
		</form>
		</div><!-- registerinfo -->

				<div id="managerlist">
			<table id="manager" border="1">
				<tr>
					<th>NO</th>
					<th>COMPANY</th>
					<th>BRANCH-OFFICE</th>
					<th>MANAGERNAME</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
				<?php while ($row = $stt->fetch()) { 
					$lastname = e($row['LAST_NM']);
					$firstname = e($row['FIRST_NM']);
					$name = $lastname."  ".$firstname;
					?>
				<form method="POST" action="master.php">
				<tr>
					<td><?php print($rownum) ?></td>
					<td><?php print(e($row['COM_NM'])); ?></td>
					<td><?php print(e($row['BRA_NM'])); ?></td>
					<td><?php print($name); ?></td>
					<td><input id="edit" type="submit" value="EDIT"/></td>
					<td><input id="delete" type="submit" value="DELETE"/></td>
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