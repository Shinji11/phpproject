<?php
require_once '../Encode.php';
session_start();
$title = "SETTING";
$rownum = 1;
$sqlflg = $_POST['sqlflg'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  if ($sqlflg == 2) {
  require("../sql/updatemembersql.php");  
  } 
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>MEMBER</title>
<?php require("../common/head.php"); ?>
<link href="../css/memberstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="header"><!-- header -->
    <?php require("../common/header.php"); ?>
  </div>

  <div id="contents">
    <div id="editmember">
      <form method="POST" action="member.php">
      <table id="newmebertable">
        <tr>
          <th>ID:</th>
          <td><input name="usercd" type="text" class="read" value="<?php print($_SESSION['usercd']); ?>"/></td>
          <th>LAST NAME:</th>
          <td><input name="lastnm" type="text" class="read" value="<?php print($_SESSION['lastnm']); ?>" /></td>
          <th>FIRST NAME:</th>
          <td><input name="firstnm" type="text" class="read" value="<?php print($_SESSION['firstnm']); ?>" /></td>
        </tr>
        <tr>
          <th>NEW PASSWORD:</th>
          <td><input name="password" type="text" class="read" /></td>
          <th>CONFIRM PASSWORD:</th>
          <td><input name="password2" type="text" class="read" /></td>
          <td colspan="2"></td>
        </tr>
      </table>
      <input type="hidden" id="sqlflg" name="sqlflg"/>
      <P class="right"><input class="button" id="updatebutton" type="submit" value="" onclick="changeSqlFlg(2)"/></P>
      </form>
    </div><!-- edit -->
  </div><!-- contents -->

  <div id="footer">
  </div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>