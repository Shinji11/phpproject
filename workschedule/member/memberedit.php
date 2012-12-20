<?php
require_once '../Encode.php';
session_start();
$title = "MEMBER";

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
        <tr><th class="registertitle" colspan="8"><?php print($_POST['usernm']); ?></th></tr>
        <tr>
          <th>ID:</th>
          <td>
            <input name="editusercd" type="hidden" value="<?php print($_POST['usercd']); ?>"/>
            <input name="usercd" type="text" class="read" value="<?php print($_POST['usercd']); ?>"/>
          </td>
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
            <option value="2" selected>MANAGER</option>
            <?php } else { ?>
            <option value="3">NORMAL</option>
            <option value="2">MANAGER</option>
            <option value="4" selected>ABNORMAL</option>
            <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>NEW PASSWORD:</th>
          <td><input name="password" type="password" class="read" /></td>
          <th>CONFIRM PASSWORD:</th>
          <td><input name="password2" type="password" class="read" /></td>
          <td colspan="4"></td>
        </tr>
      </table>
      <input type="hidden" id="sqlflg" name="sqlflg"/>
      <p class="left"><input type="submit" id="returnbutton" class="button" value=""/></p>
      <P class="right"><input class="button" id="deletebutton" type="submit" value="" onclick="changeSqlFlg(3)"/></P>
      <P class="right"><input class="button" id="updatebutton" type="submit" value="" onclick="changeSqlFlg(2)"/></P>
      </form>
    </div><!-- edit -->
  </div><!-- contents -->

  <div id="footer">
  </div><!-- footer -->
</div><!-- wrapper -->
</body>
</html>