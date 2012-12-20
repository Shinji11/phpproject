<?php
$userid = $_POST['userid'];
$stt2 = $db->prepare('SELECT * FROM AM_MEMBER ME 
	                      INNER JOIN AM_COM CO
                              ON CO.COM_CD = ME.COM_CD  
	                             AND CO.BRA_CD = ME.BRA_CD 
	                           WHERE ME.USER_ID = :userid');
$stt2->bindValue(':userid', $userid);
$stt2->execute();
$row2 = $stt2->fetch();
?>