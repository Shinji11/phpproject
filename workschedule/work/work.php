<?php
require_once '../Encode.php';
session_start();
$rownum = 1;
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  $stt = $db->prepare('SELECT * FROM WORK_SCHEDULE WS 
                          INNER JOIN AM_MEMBER ME 
                                  ON ME.USER_ID = WS.USER_ID
                               WHERE ME.COM_CD = :comcd 
                                 AND ME.BRA_CD = :bracd 
                            ORDER BY ME.USER_CD');
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
print($_GET['scheduledate']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link id="calendar_style" href="../protocalendar/stylesheets/simple.css" media="screen" rel="Stylesheet" type="text/css" />
<link href="../css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/workstyle.css" rel="stylesheet" type="text/css" />
<script src="../protocalendar/lib/prototype.js" type="text/javascript"></script>
<script src="../protocalendar/lib/effects.js" type="text/javascript"></script>
<script src="../protocalendar/javascripts/protocalendar.js" type="text/javascript"></script>
<script src="../protocalendar/javascripts/lang_ja.js" type="text/javascript"></script>
<script src="../protocalendar/javascripts/lang_zh-cn.js" type="text/javascript"></script>
<script src="../protocalendar/javascripts/lang_zh-tw.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/headr.js"></script>
<script type="text/javascript" src="../js/work.js"></script>
</head>
<body>
  <div id="wrapper">
    <?php require("../header.php"); ?>
    <div id="contents">
      <div class="calender-code">
        <form action="javascript:void(0);">
        <input id="calendar_hm3" name="calendar_hm3" type="text"/>
        <input type="button" value="CALENDER" id="calendar_hm3_icon" />
        <script type="text/javascript" id="cal-script3">
            InputCalendar.createOnLoaded('calendar_hm3',
                          {alignTo: 'calendar_hm3_icon',
                            format: 'yyyy/mm/dd',
                            enableHourMinute: false,
                            lang: 'ja',
                            triggers: ['calendar_hm3_icon']});
        </script>
        </form>
        <form method="POST" action="work.php?title=WORK SCHEDULE"/>
          <input type="hidden" id="scheduledate" name="scheduledate"/>
          <input type="submit" value="WORK SCHEDULE" onClick="changeDate()"/>
        </form>
      </div><!-- calender-code -->
      
      <div id="workschedule">
      <table id="table">
        <tr>
          <th></th>
          <?php for ($num = 6; $num < 24; $num++) { ?>
          <th colspan="2"><?php print($num); ?></th>
          <?php } 
              for ($num = 0; $num < 4; $num++) {
          ?>
          <th colspan="2"><?php print($num); ?></th>
          <?php } ?>          
        </tr>
        <?php while ($row = $stt->fetch()) { 
            $lastnm = e($row['LAST_NM']);
            $firstnm = e($row['FIRST_NM']);
            $usernm = $lastnm."  ".$firstnm;
            ?>
        <tr >
          <td><input type="text" id="name" value="<?php print($usernm);?> "></td>
          <td></td>
          <td class="color<?php print(e($row['SIX']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['SEVEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['EIGHT']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['NINE']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['TEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['ELEVEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['TWELVE']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['THIRTEEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['FOURTEEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['FIFTEEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['SIXTEEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['SEVENTEEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['EIGHTEEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['NINETEEN']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['TWENTY']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['TWENTY_ONE']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['TWENTY_TWO']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['TWENTY_THREE']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['ZERO']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['ONE']))?>" colspan="2"></td>
          <td class="color<?php print(e($row['TWO']))?>" colspan="2"></td>
        </tr>
        <?php } ?>
        <tr>
          <th></th>
          <?php for ($num = 6; $num < 24; $num++) { ?>
          <th colspan="2"><?php print($num); ?></th>
          <?php } 
              for ($num = 0; $num < 4; $num++) {
          ?>
          <th colspan="2"><?php print($num); ?></th>
          <?php } ?>          
        </tr>
      </table>
    </div><!-- workschedule -->
      <div>
      </div><!-- footer -->
    </div><!-- contents -->
  </div><!-- wrapper -->
</body>
</html>