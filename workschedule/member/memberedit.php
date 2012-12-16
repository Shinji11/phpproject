<?php
require_once '../Encode.php';
session_start();
$title = "MEMBER";
$rownum = 1;
$sqlflg = $_POST['sqlflg'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  if ($sqlflg == 1) {
  require("../sql/insertmembersql.php");  
  } 
  require("../sql/membersql.php");
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();
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
      <p class="scheduletitle"><?php print($_POST['usernm']); ?></p>
      <form method="POST" action="member.php">
      <table id="newmebertable">
        <tr>
          <th>ID:</th>
          <td><input name="usercd" type="text" class="read" value="<?php print($_POST['usercd']); ?>"/></td>
          <th>LAST NAME:</th>
          <td><input name="lastnm" type="text" class="read" value="<?php print($_POST['lastnm']); ?>" /></td>
          <th>FIRST NAME:</th>
          <td><input name="firstnm" type="text" class="read" value="<?php print($_POST['firstnm']); ?>" /></td>
          <th>AUTHORITY:</th>
          <td>
            <select name="authority">
            <?php if ($_POST['authority'] == 3) {?>
            <option value="3" selected>NORMAL</option>
            <option value="2">MANAGER</option>
            <option value="4">ABNORMAL</option>
            <?php } else if ($_POST['authority'] == 2) { ?>
            <option value="3">NORMAL</option>
            <option value="2" selected>MANAGER</option>
            <option value="4">ABNORMAL</option>
            <?php } else { ?>
            <option value="3">NORMAL</option>
            <option value="2">MANAGER</option>
            <option value="4" selected>ABNORMAL</option>
            <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>PASSWORD:</th>
          <td><input name="password" type="text" class="read" /></td>
          <th>CONFIRM PASSWORD:</th>
          <td><input name="password2" type="text" class="read" /></td>
          <td colspan="4"></td>
        </tr>
      </table>
      <input type="hidden" id="sqlflg" name="sqlflg" value="1"/>
      <P class="center"><input class="button" id="updatebutton" type="submit" value="" onclick=""/></P>
      </form>
    </div><!-- edit -->
  </div><!-- contents -->

  <div id="footer">
  </div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>