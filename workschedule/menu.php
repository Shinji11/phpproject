<?php
require_once 'Encode.php';
session_start();
$userid = htmlspecialchars($_POST['userid'], ENT_QUOTES, 'UTF-8');
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  $stt = $db->prepare('SELECT * FROM AM_MEMBER ME 
  	                      INNER JOIN AM_COM CO
                                  ON CO.COM_CD = ME.COM_CD  
  	                             AND CO.BRA_CD = ME.BRA_CD 
  	                           WHERE ME.USER_ID = :userid');
  $stt->bindValue(':userid', $userid);
  $stt->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;
 charset=utf-8" />
<title>MENU</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<link type="text/css" href="../workschedule/css/headerstyle.css" rel="stylesheet" />
<link type="text/css" href="../workschedule/css/menustyle.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="../workschedule/js/common.js"></script>
</head>
<body>
<div id="wrapper"> 
  <div id="header">
    <?php require("common/menuheader.php"); ?>
  </div><!-- header -->

	<div id="contents">
    <div id="logomark">
      <img id="logo" src="images/<?php print($com); ?>.png">
    </div><!-- logomark -->
	</div><!-- contents -->

	<div id="footer">
	</div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>