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
		<div id="scheduling">
			<table id="table" border="1">
				<tr>
					<th></th>
					<th colspan="2">6</th>
					<th colspan="2">7</th>
					<th colspan="2">8</th>
					<th colspan="2">9</th>
					<th colspan="2">10</th>
					<th colspan="2">11</th>
					<th colspan="2">12</th>
					<th colspan="2">13</th>
					<th colspan="2">14</th>
					<th colspan="2">15</th>
					<th colspan="2">16</th>
					<th colspan="2">17</th>
					<th colspan="2">18</th>
					<th colspan="2">19</th>
					<th colspan="2">20</th>
					<th colspan="2">21</th>
					<th colspan="2">22</th>
					<th colspan="2">23</th>
					<th colspan="2">0</th>
					<th colspan="2">1</th>
					<th colspan="2">2</th>
					<th colspan="2">3</th>					
				</tr>
				<tr id="clickbox">
					<td><select name="name">
						<option selected></option>
						<option value="489">萩原　慎司</option>
						<option value="216">吉田　成志</option>
					</select></td>
					<td></td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(6)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(7)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(8)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(9)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(10)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(11)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(12)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(13)"><img src="../images/clear.gif"></a>
						<input type="checkbox" id="thirty" class="checkbox">
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(14)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(15)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(16)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(17)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(18)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(19)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(20)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(21)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(22)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(23)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(0)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(1)"><img src="../images/clear.gif"></a>
					</td>
					<td class="clickbox" colspan="2">
						<a href="scheduling.php" onclick="changeCheckbox(2)"><img src="../images/clear.gif"></a>
					</td>
					<td></td>
				    </tr>
				<tr>
				</tr>
			</table>
		</div><!-- scheduling -->
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>