 <?php
$stt2 = $db->prepare("SELECT * FROM WORK_SCHEDULE WS 
                         INNER JOIN AM_MEMBER ME
                                 ON ME.DEL_FLG = '0' 
                                AND ME.USER_ID = WS.USER_ID
                              WHERE WS.DEL_FLG = '0'
                                AND ME.COM_CD = :comcd 
                                AND ME.BRA_CD = :bracd 
                                AND WS.SCHEDULE_DATE = :scheduledate 
                           ORDER BY ME.USER_CD");
$stt2->bindValue(':comcd', $_SESSION['comcd']);
$stt2->bindValue(':bracd', $_SESSION['bracd']);
$stt2->bindValue(':scheduledate', $scheduledate);
$stt2->execute();
 ?>