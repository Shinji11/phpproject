<?php
require_once '../Encode.php';
session_start();
$rownum = 1;
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  $stt = $db->prepare('SELECT * FROM AM_MEMBER ME 
  	                      INNER JOIN AM_CD A001 
  	                              ON A001.GROUP_CD = "A001"
  	                             AND A001.KEY_ITEM1 = ME.AUTHORITY_CD
  	                           WHERE ME.COM_CD = :comcd 
  	                             AND ME.BRA_CD = :bracd 
  	                        ORDER BY ME.USER_CD');
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
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
<link href="../css/memberstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<?php require("../common/header.php"); ?>
	<div id="contents">
		<div id="memberlist">
		<table id="member" border="1">
			<tr>
				<th>NO</th>
				<th>ID</th>
				<th>NAME</th>
				<th>AOUTHORITY</th>
				<th>UPDATE</th>
				<th>DELETE</th>
			</tr>
			<?php while ($row = $stt->fetch()) { ?>
			<form action="member.php" method="POST">
			<tr>
				<td><?php print($rownum); ?></td>
				<td><?php print(e($row['USER_CD'])); ?></td>
				<td><?php print(e($row['LAST_NM'])); ?>&nbsp&nbsp<?php print(e($row['FIRST_NM'])); ?></td>
				<td><?php print(e($row['CHAR_ITEM1'])); ?></td>
				<td><input type="submit" name="update" value="UPDATE"/></td>
				<td><input type="submit" name="delete" value="DELETE"/></td>
			</tr>
			<?php $rownum++; } ?>
			</form>
		</table>
		</div><!--memberlist-->
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>