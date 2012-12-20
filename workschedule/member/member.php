<?php
require_once '../Encode.php';
session_start();
$title = "MEMBER";
$rownum = 1;
$sqlflg = $_POST['sqlflg'];
$messagelist = array();
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  if (!$sqlflg == "") {
  require("../common/checknewmember.php");
}

  if (count($messagelist) == 0) { 
    if ($sqlflg == 1) {
    require("../sql/insertmembersql.php");  
    } else if ($sqlflg == 2) {
    require("../sql/updatemembersql.php");  
    } else if ($sqlflg == 3) {
    require("../sql/deletemembersql.php");  
    }
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
  <div id="header">
    <?php require("../common/header.php"); ?>
  </div><!-- header -->

  <div id="contents">
    <div id="memberlist">
      <!--  メッセージリスト  -->
      <?php if (count($messagelist) > 0) { 
        foreach ($messagelist as $message) {
        ?>
        <ul class="message">
          <li><p class="message"><?php print($message); ?></p></li>
        </ul>
      <?php } }?>
      <p class="scheduletitle">MEMBER LIST</p>
      <table id="member" border="1">
        <tr>
          <th>NO</th>
          <th>ID</th>
          <th>NAME</th>
          <th>AOUTHORITY</th>
          <th>EDIT</th>
        </tr>
        <?php while ($row = $stt->fetch()) { 
          $lastnm = e($row['LAST_NM']);
          $firstnm = e($row['FIRST_NM']);
          $usernm = $lastnm."  ".$firstnm;
          ?>
        <form action="memberedit.php" method="POST">
        <tr>
          <td><?php print($rownum); ?></td>
          <td><input type="text" name="usercd" class="transparent" readonly="readonly" value="<?php print(e($row['USER_CD'])); ?>" /></td>
          <td>
            <input type="hidden" name="lastnm" value="<?php print($lastnm); ?>"/>
            <input type="hidden" name="firstnm" value="<?php print($firstnm); ?>"/>
            <input type="text" name="usernm" class="transparent" readonly="readonly" value="<?php print($usernm); ?>"/>
          </td>
          <td>
            <input type="hidden" name="authority" value="<?php print(e($row['AUTHORITY_CD'])); ?>" />
            <input type-"text" name="autoritynm" class="transparent" readonly="readonly" value="<?php print(e($row['CHAR_ITEM1'])); ?>"/>
          </td>
          <td><input type="submit" class="button" id="editbutton" value=""/></td>
        </tr>
        </form>
        <?php $rownum++; } ?>
      </table>
    </div><!-- memberlist -->

    <div id="newmember">
      <form method="POST" action="member.php">
      <table id="newmebertable">
        <tr><th class="registertitle" colspan="8">NEW MEMBER</th></tr>
        <tr>
          <th>BRANCH ID:</th>
          <td><input name="usercd" type="text" class="read" /></td>
          <th>LAST NAME:</th>
          <td><input name="lastnm" type="text" class="read" /></td>
          <th>FIRST NAME:</th>
          <td><input name="firstnm" type="text" class="read" /></td>
          <th>AUTHORITY:</th>
          <td>
            <select name="authority">
            <option value="3" selected>NORMAL</option>
            <option value="2">MANAGER</option>
            <option value="4">ABNORMAL</option>
            </select>
          </td>
        </tr>
      </table>
      <input type="hidden" id="sqlflg" name="sqlflg" value="1"/>
      <P class="center"><input class="button" id="registerbutton" type="submit" value="" onclick=""/></P>
      </form>
    </div><!-- newmember -->
  </div><!-- contents -->

  <div id="footer">
  </div><!-- footer -->
</div><!-- wrapper -->
</body>

</html>