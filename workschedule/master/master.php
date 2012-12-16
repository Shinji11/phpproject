<?php
require_once '../Encode.php';
session_start();
$title = "MASTER";
$rownum = 1;
$sqlflg = $_POST['sqlflg'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  if ($sqlflg == 1) {
  require("../sql/insertmanagersql.php");	
  } 
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
		<div id="registerinfo">
		    <?php if (!$message == "") { ?>
		      <ul class="message">
	    	    <li><p class="message"><?php print($message); ?></p></li>
	      	  </ul>
	    	<?php } ?>
			<form method="POST" action="master.php">
			<table class="registration" >
				<tr>
					<th class="registertitle" colspan="4">COMPANY&BRANCH-OFFICE</th>
				</tr>
				<tr>
					<th>CompanyCode:</th>
					<td><input id="comcd" name="comcd" class="read" type="text"></td>
					<th>CompanyName:</th>
					<td><input id="comnm" name="comnm" class="read" type="text"></td>
				</tr>
				<tr>	
					<th>BranchCode:</th>
					<td><input id="bracd" name="bracd" class="read" type="text"></td>
					<th>BranchName:</th>
					<td><input id="branm" name="branm" class="read" type="text"></td>
				</tr>
			</table>
			<br/>
			<table class="registration" >	
				<tr>
					<th class="registertitle" colspan="6">MANAGER</th>
				</tr>
					<th>EmployeeNumber:</th>
					<td><input id="usercd" name="usercd" class="read" type="text"></td>
					<th>LastName:</th>
					<td><input id="lastnm" name="lastnm" class="read" type="text"></td>
					<th>FirstName:</th>
					<td><input id="firstnm" name="firstnm" class="read" type="text"></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><input id="password" name="password" class="read" type="password"/></td>
					<th>Confirm Password</th>
					<td><input id="password2" class="read" type="password"/></td>
				<tr>
			</table>
			<input type="hidden" name="sqlflg" value="1"/>
			<p><input class="button" id="registerbutton" type="submit" value=""></p>
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
					<td><input class="button" id="editbutton" type="submit" value=""/></td>
					<td><input class="button" id="deletebutton" type="submit" value="DELETE"/></td>
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