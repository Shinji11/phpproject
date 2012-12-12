<?php
require_once '../Encode.php';
session_start();
$title = "MEMBER";
$rownum = 1;
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
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
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
      <?php while ($row = $stt->fetch()) { ?>
      <form action="member.php" method="POST">
      <tr>
        <td><?php print($rownum); ?></td>
        <td><?php print(e($row['USER_CD'])); ?></td>
        <td><?php print(e($row['LAST_NM'])); ?>&nbsp&nbsp<?php print(e($row['FIRST_NM'])); ?></td>
        <td><?php print(e($row['CHAR_ITEM1'])); ?></td>
        <td><input type="submit" name="EDIT" value="EDIT"/></td>
        <td><input type="submit" name="delete" value="DELETE"/></td>
      </tr>
      <?php $rownum++; } ?>
      </form>
    </table>
    </div><!--memberlist-->

    <div id="newmember">
      <p class="scheduletitle">NEW MEMBER</p>
      <form method="POST" action="member.php">
      <table id="newmebertable">
        <tr>
          <th>ID:</th>
          <td><input type="text"/></td>
          <th>LAST NAME:</th>
          <td><input type="text"/></td>
          <th>FIRST NAME:</th>
          <td><input type="text"/></td>
          <th>AUTHORITY:</th>
          <td>
            <select>
            <option value="3" selected>NORMAL</option>
            <option value="2">MANAGER</option>
            <option value="4">ABNORMAL</option>
            </select>
          </td>
        </tr>
      </table>
      <input type="submit" value="REGISTER"/>
      </form>
    </div><!-- newmember -->

  </div><!--contents-->

  <div id="footer">
  </div><!--footer-->
</div><!--wrapper-->
</body>

</html>