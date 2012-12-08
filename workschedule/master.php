<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
 charset=utf-8" />
<title>MEMBER</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="../workschedule/js/headr.js"></script>
<link href="../workschedule/css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../workschedule/css/masterstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="headerinfo">
		<table id="info" align="center" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left"　colspan="2"><input id="menu" type="text"  readonly="readonly" value="MEMBER" tabindex="-1"/></td>
				<td align="right"><a class="oneline" href="login.php">LOGOUT</a></td>
			</tr>
			<tr>
				<td align="center" colspan="3"><input id="com-bra" type="text"  readonly="readonly" value="GUSTO調布上石原店" /></td>
			</tr>
			<tr>
				<td align="right" colspan="3">
					<table id="userinfo">
						<tr><td><input id="userid" type="text"  readonly="readonly" value="GT296928025" /></td></tr>
						<tr><td><input id="username" type="text"  readonly="readonly" value="萩原　慎司" /></td></tr>
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
	</div><!--header-->


	<div id="contents">
		<div id="memberlist">
		<form action="member.php" method="POST">
		<table id="member" >
			<tr>
				<th colspan="8">会社-支店登録</th>
			</tr>
			<tr>
				<th>会社コード:</th>
				<td><input id="comcd" type="text"></td>
				<th>会社名:</th>
				<td><input id="comnm" type="text"></td>
				<th>支店コード:</th>
				<td><input id="bracd" type="text"></td>
				<th>支店名:</th>
				<td><input id="branm" type="text"></td>
			</tr>
			<tr>
				<th colspan="8">管理者登録</th>
			</tr>
				<th>社員番号:</th>
				<td><input id="comid" type="text"></td>
				<th>姓:</th>
				<td><input id="lastnm" type="text"></td>
				<th>名:</th>
				<td><input id="firstnm" type="text"></td>
				<th>性:</th>
				<td><select id="sex" name-"sex">
					<?php
					$sexes = array('男','女');
					foreach ($sexes as $sex) {
						if ($sex == '男') { 
							print('<option value="1" selected >'.$sex.'</option>');
						} elseif ($sex == '女') { 
							print('<option value="2" >'.$sex.'</option>');
						}
					}
					?>
					</select>
					<input id="administor" type="hidden" value="1">
				</td>
			<tr>
		</table>
		<input id="register" type="submit">
		</form>
		</div><!--memberlist-->
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>