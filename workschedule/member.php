<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
 charset=utf-8" />
<title>MEMBER</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="../workschedule/js/headr.js"></script>
<link href="../workschedule/css/headerstyle.css" rel="stylesheet" type="text/css" />
<link href="../workschedule/css/memberstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="headerinfo">
		<table id="info" align="center" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left"　colspan="2"><input id="menu" type="text"  readonly="readonly" value="MEMBER" /></td>
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
		<table id="member" border="1">
			<tr>
				<th>NO</th>
				<th>ID</th>
				<th>NAME</th>
				<th>AOUTHORITY</th>
				<th>DELETE</th>
			</tr>
			<form action="member.php" method="POST">
			<tr>
				<td>1</td>
				<td>28025</td>
				<td>萩原　慎司</td>
				<td>MANAGER</td>
				<td><input type="submit" name="delete" value="DELETE"/></td>
			</tr>
			<tr>
				<td>2</td>
				<td>28026</td>
				<td>砂川　恒</td>
				<td>NORMAL</td>
				<td><input type="submit" name="delete" value="DELETE"/></td>
			</tr>
			</form>
		</table>
		</div><!--memberlist-->
	</div><!--contents-->

	<div id="footer">
	</div><!--footer-->
</div><!--wrapper-->
</body>

</html>