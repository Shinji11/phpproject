<?php
require_once '../Encode.php';
session_start();
$title = "SETTING";
$rownum = 1;
$sqlflg = $_POST['sqlflg'];
$messagelist = array();
if ($sqlflg == 2) {
  try {
    $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
    require("../common/checksetting.php");
    
if (count($messagelist) == 0) { 
  if($sqlflg == 2) {
    require("../sql/updatemembersql.php");
    $_SESSION['usercd'] =  $usercd;
    $_SESSION['userid'] =  $adduserid;
    $_SESSION['lastnm'] =  $lastnm;
    $_SESSION['firstnm'] =  $firstnm;
    $_SESSION['username'] =  $lastnm."  ".$firstnm;
  }
}
  } catch(PDOException $e) {
    die('エラーメッセージ：'.$e->getMessage());
  }
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
      <!--  メッセージリスト  -->
    <?php if (count($messagelist) > 0) { 
      foreach ($messagelist as $message) {
      ?>
      <ul class="message">
        <li><p class="message"><?php print($message); ?></p></li>
      </ul>
    <?php } } else {?>

      <form method="POST" action="setting.php">
      <table id="newmebertable">
        <tr>
          <th>ID:</th>
          <td>
            <input name="editusercd" type="hidden" value="<?php print($_SESSION['usercd']); ?>"/>
            <input name="usercd" type="text" class="read" readonly="readonly" value="<?php print($_SESSION['usercd']); ?>"/>
          </td>
          <th>LAST NAME:</th>
          <td><input name="lastnm" type="text" class="read" value="<?php print($_SESSION['lastnm']); ?>" /></td>
          <th>FIRST NAME:</th>
          <td><input name="firstnm" type="text" class="read" value="<?php print($_SESSION['firstnm']); ?>" /></td>
        </tr>
        <tr>
          <th>NEW PASSWORD:</th>
          <td><input name="password" type="password" class="read" /></td>
          <th>CONFIRM PASSWORD:</th>
          <td><input name="password2" type="password" class="read" /></td>
          <td colspan="2"></td>
        </tr>
      </table>
      <input type="hidden" name="authority" value="3"/>
      <input type="hidden" id="sqlflg" name="sqlflg" value="2"/>
      <P class="right"><input class="button" id="updatebutton" type="submit" value=""/></P>
      </form>
      <?php } ?>
    </div><!-- edit -->
  </div><!-- contents -->

  <div id="footer">
  </div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>