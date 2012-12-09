<?php
require_once 'Encode.php';
$userid = htmlspecialchars($_POST['userid'], ENT_QUOTES, 'UTF-8');
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  $stt = $db->prepare('SELECT * FROM AM_MEMBER ME INNER JOIN AM_COM CO ON CO.BRA_CD = ME.BRA_CD WHERE ME.USER_ID = :userid');
  $stt->bindValue(':userid', $userid);
  $stt->execute();
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
 charset=utf-8" />
<title>MENU</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="../workschedule/js/headr.js"></script>
<link href="../workschedule/css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../workschedule/css/menustyle.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="wrapper">
	<div id="header">
		<?php if ($row = $stt->fetch()) { ?>
		<div id="headerinfo">
		<table id="info" align="center" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left"　colspan="2"><input id="menu" type="text"  readonly="readonly" value="MENU" /></td>
				<td align="right"><a class="oneline" href="login.php">LOGOUT</a></td>
			</tr>
			<tr>
				<td align="center" colspan="3">
					<input id="com-bra" type="text"  readonly="readonly" 
					  value="<?php print(e($row['COM_NM'])); print(e($row['BRA_NM'])); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right" colspan="3">
					<table id="userinfo">
						<tr><td><input id="userid" type="text"  readonly="readonly" value="<?php print($userid) ?>" /></td></tr>
						<tr>
							<td>
								<input id="username" type="text"  readonly="readonly" 
								  value="<?php print(e($row['LAST_NM'])); print(e($row['FIRST_NM'])); ?>" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		</div><!--headerinfo-->
		<div id="headermenu">
			<ul>
				<li><a class="twoline" href="personal.php">PERSONAL<br/>SCHEDULE</a><li/>
				<li><a class="twoline" href="work.php">WORK<br/>SCHEDULE</a><li/>
				<li><a class="oneline" href="member.php">MEMBER</a><li/>
				<li><a class="oneline" href="scheduling.php">SCHEDULING</a><li/>
				<li><a class="oneline" href="master.php">MASTER</a><li/>
			</ul>
		</div><!--headermenu-->
		<?php } ?>
	</div><!--header-->

	<div id="contents">
		
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>