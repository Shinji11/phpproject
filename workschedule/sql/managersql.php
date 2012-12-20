 <?php
 $stt = $db->prepare("SELECT * FROM AM_MEMBER ME 
  	                      INNER JOIN AM_COM CO
  	                              ON CO.DEL_FLG = '0'
  	                             AND CO.BRA_CD = ME.BRA_CD
  	                           WHERE ME.DEL_FLG = '0'
  	                             AND ME.AUTHORITY_CD = '2'
  	                        ORDER BY CO.COM_NM");
 $stt->execute();
 ?>