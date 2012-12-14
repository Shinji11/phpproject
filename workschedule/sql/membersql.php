 <?php
 $stt = $db->prepare("SELECT * FROM AM_MEMBER ME 
  	                      INNER JOIN AM_CD A001 
  	                              ON A001.GROUP_CD = 'A001'
  	                             AND A001.KEY_ITEM1 = ME.AUTHORITY_CD
  	                           WHERE ME.DEL_FLG = 0
  	                             AND ME.COM_CD = :comcd 
  	                             AND ME.BRA_CD = :bracd 
  	                        ORDER BY ME.USER_CD");
 ?>