<?php
require_once '../Encode.php';
session_start();
$title = "WORK SCHEDULE";
$rownum = 1;
$scheduledate = $_POST['scheduledate'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  require("../sql/workschedulesql.php");
  $stt2->bindValue(':comcd', $_SESSION['comcd']);
  $stt2->bindValue(':bracd', $_SESSION['bracd']);
  $stt2->bindValue(':scheduledate', $scheduledate);
  $stt2->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>WORK SCHEDULE</title>
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
<script type="text/javascript" src="../js/common.js"></script>
</head>
<body>
  <div id="wrapper">
    <?php require("../common/header.php"); ?>
    <div id="contents">
      <div class="calender-code">
        <form action="javascript:void(0);">
        <input id="calendar_hm3" name="calendar_hm3" readonly="readonly" type="text" value="<?php print($scheduledate); ?>"/>
        <input type="button" id="calendar_hm3_icon" />
        <script type="text/javascript" id="cal-script3">
            InputCalendar.createOnLoaded('calendar_hm3',
                          {alignTo: 'calendar_hm3_icon',
                            format: 'yyyy/mm/dd',
                            enableHourMinute: false,
                            lang: 'ja',
                            triggers: ['calendar_hm3_icon']});
        </script>
        </form>
        <form method="POST" action="work.php"/>
          <input type="hidden" id="scheduledate" name="scheduledate"/><br/>
          <input type="submit" value="WORK SCHEDULE" onClick="changeDate()"/>
        </form>
      </div><!-- calender-code -->
      
      <?php if(!($scheduledate == "")) { 
                $counter = 0;
      ?>
      <div id="workschedule">
      <p id="scheduledate" ><?php print(date_ja($scheduledate)); ?></p>
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
        <?php while ($row = $stt2->fetch()) { 
            $lastnm = e($row['LAST_NM']);
            $firstnm = e($row['FIRST_NM']);
            $toptag = $lastnm."  ".$firstnm;

            require("../common/scheduledata.php");
         $counter++; } 
         if ($counter == 0) {
          ?>
          <tr><td colspan="44"><p>--まだデータは存在しません--</p></td></tr>
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
    <?php } ?>
      <div>
      </div><!-- footer -->
    </div><!-- contents -->
  </div><!-- wrapper -->
</body>
</html>