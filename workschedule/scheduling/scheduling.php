<?php
require_once '../Encode.php';
session_start();
$rownum = 1;
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  $stt = $db->prepare('SELECT * FROM AM_MEMBER ME 
                          INNER JOIN AM_CD A001 
                                  ON A001.GROUP_CD = "A001"
                                 AND A001.KEY_ITEM1 = ME.AUTHORITY_CD
                               WHERE ME.COM_CD = :comcd 
                                 AND ME.BRA_CD = :bracd 
                            ORDER BY ME.USER_CD');
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();
  $stt2 = $db->prepare('SELECT * FROM WORK_SCHEDULE WS 
                          INNER JOIN AM_MEMBER ME 
                                  ON ME.USER_ID = WS.USER_ID
                               WHERE ME.COM_CD = :comcd 
                                 AND ME.BRA_CD = :bracd 
                            ORDER BY ME.USER_CD');
  $stt2->bindValue(':comcd', $_SESSION['comcd']);
  $stt2->bindValue(':bracd', $_SESSION['bracd']);
  $stt2->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
 charset=utf-8" />
<title>MEMBER</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="../js/headr.js"></script>
<script type="text/javascript" src="../js/scheduling.js"></script>
<link href="../css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/schedulingstyle.css" rel="stylesheet" type="text/css" />
</head>
<body onload="hidden()">
<div id="wrapper">
	<?php require("../header.php"); ?>
	<div id="contents">
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
				<?php while ($row = $stt2->fetch()) { 
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


		<div id="scheduling">
			<form method="POST" action="scheduling.php?title=SCHEDULING">
			<table id="table2" border="1">
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
				<tr id="clickbox">
					<td><select name="name" id="name">
						<option selected></option>
						<option value="489">萩原　慎司</option>
						<option value="216">吉田　成志</option>
					</select></td>
					<td></td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt6" class="bt" onclick="changeCheckbox('cb6', 'bt6')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb6" name="cb6" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt7" class="bt" onclick="changeCheckbox('cb7', 'bt7')">
						<input type="hidden" name="cb7" value="0">
						<input type="checkbox" id="cb7" name="cb7" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt8" class="bt" onclick="changeCheckbox('cb8', 'bt8')"/>
						<input type="hidden" name="cb8" value="0">
						<input type="checkbox" id="cb8" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt9" class="bt" onclick="changeCheckbox('cb9', 'bt9')"/>
						<input type="hidden" name="cb9" value="0"/>
						<input type="checkbox" id="cb9" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt10" class="bt" onclick="changeCheckbox('cb10', 'bt10')"/>
						<input type="hidden" name="cb10" value="0"/>
						<input type="checkbox" id="cb10" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt11" class="bt" onclick="changeCheckbox('cb11', 'bt11')"/>
						<input type="hidden" name="cb11" value="0"/>
						<input type="checkbox" id="cb11" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt12" class="bt" onclick="changeCheckbox('cb12', 'bt12')"/>
						<input type="hidden" name="cb12" value="0"/>
						<input type="checkbox" id="cb12" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt13" class="bt" onclick="changeCheckbox('cb13', 'bt13')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb13" value="1" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt14" class="bt" onclick="changeCheckbox('cb14', 'bt14')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb14" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt15" class="bt" onclick="changeCheckbox('cb15', 'bt15')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb15" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt16" class="bt" onclick="changeCheckbox('cb16', 'bt16')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb16" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt17" class="bt" onclick="changeCheckbox('cb17', 'bt17')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb17" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt18" class="bt" onclick="changeCheckbox('cb18', 'bt18')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb18" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt19" class="bt" onclick="changeCheckbox('cb19', 'bt19')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb19" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt20" class="bt" onclick="changeCheckbox('cb20', 'bt20')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb20" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt21" class="bt" onclick="changeCheckbox('cb21', 'bt21')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb21" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt22" class="bt" onclick="changeCheckbox('cb22', 'bt22')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb22" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt23" class="bt" onclick="changeCheckbox('cb23', 'bt23')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb23" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt0" class="bt" onclick="changeCheckbox('cb0', 'bt0')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb0" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt1" class="bt" onclick="changeCheckbox('cb1', 'bt1')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb1" class="checkbox" value="1"/>
					</td>
					<td class="clickbox" colspan="2">
						<input type="button" id="bt2" class="bt" onclick="changeCheckbox('cb2', 'bt2')"/>
						<input type="hidden" name="cb6" value="0"/>
						<input type="checkbox" id="cb2" class="checkbox" value="1"/>
					</td>
					<td></td>
				    </tr>
				<tr>
				</tr>
			</table>
			<p><input type="submit" value="REGISTER"/></p>
			</form>
		</div><!-- scheduling -->
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>