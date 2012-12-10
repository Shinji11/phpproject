<?php
require_once 'Encode.php';
session_start();
$userid = htmlspecialchars($_POST['userid'], ENT_QUOTES, 'UTF-8');
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  $stt = $db->prepare('SELECT * FROM AM_MEMBER ME 
  	                      INNER JOIN AM_COM CO 
  	                              ON CO.BRA_CD = ME.BRA_CD 
  	                           WHERE ME.USER_ID = :userid');
  $stt->bindValue(':userid', $userid);
  $stt->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
 charset=utf-8" />
<title>MENU</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="../workschedule/js/headr.js"></script>
<link href="../workschedule/css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../workschedule/css/menustyle.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="wrapper">
	<?php require("menuheader.php"); ?>

	<div id="contents">
		
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>