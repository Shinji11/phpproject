<?php
require_once '../Encode.php';
session_start();
$title = "WORK SCHEDULE";
$rownum = 1;
$scheduledate = $_POST['scheduledate'];
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  require("../sql/workschedulesql.php");
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>WORK SCHEDULE</title>
<?php require("../common/head.php"); ?>
<link href="../css/workstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="wrapper">
    <div id="header">
    <?php require("../common/header.php"); ?>
    </div><!-- header -->

    <div id="contents">
      <div class="calender-code">
        <form action="javascript:void(0);">
        <input id="calendar_hm3" name="calendar_hm3" readonly="readonly" type="text" value="<?php
           if ($scheduledate == "") {
            print(date("Y/m/d"));
            } else {
            print($scheduledate);
            } ?>"/>
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
          <input type="submit" class="button" id="entrybutton" value="" onClick="changeDate()"/>
        </form>
      </div><!-- calender-code -->
      
      <?php if (!($scheduledate == "")) { 
                $counter = 0;
      ?>
      <div id="workschedule">
        <p class="scheduletitle" ><?php print(date_ja($scheduledate)); ?></p>
        <?php if ($row = $stt2->fetch()) { 
            require("../sql/workschedulesql.php");
        ?>
        <table id="workscheduletable">
          <tr>
            <th>[NAME]</th>
            <th>[h]</th>
            <?php for ($num = 6; $num < 24; $num++) { ?>
            <th colspan="2"><?php print($num); ?></th>
            <?php } 
                for ($num = 0; $num < 3; $num++) {
            ?>
            <th colspan="2"><?php print($num); ?></th>
            <?php } ?>          
          </tr>
          <?php while ($row = $stt2->fetch()) { 
                $lastnm = e($row['LAST_NM']);
                $firstnm = e($row['FIRST_NM']);
                $toptag = $lastnm."  ".$firstnm;
                $usercd = e($row['USER_CD']);
                $usercdlist[$counter] =  $usercd;
                $namelist[$counter] = $toptag;
                $sumhours = $sumhours + e($row['HOURS']);
            require("../common/workscheduledata.php");
           } ?>
          <tr>
            <th></th>
            <th>計:<?php print($sumhours); ?></th>
            <?php for ($num = 6; $num < 24; $num++) { ?>
            <th colspan="2"><?php print($num); ?></th>
            <?php } 
                for ($num = 0; $num < 3; $num++) {
            ?>
            <th colspan="2"><?php print($num); ?></th>
            <?php } ?>          
          </tr>
        </table>
        <?php } else { ?>
        <p class="scheduletitle">--まだデータは存在しません--</p>
        <?php } ?>
      </div><!-- workschedule -->

    <?php } ?>
    </div><!-- contents -->

    <div id="footer">
    </div><!-- footer -->
  </div><!-- wrapper -->
</body>
</html>