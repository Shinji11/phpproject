<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;
	 charset=utf-8" />
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<p id="title" align="center">Work&nbspSchedule&nbspMangement</p>
		</div><!-- header -->
		<div id-"contents">			
			<form method="POST" action="menu.php">
			<div id="loginform">
			<table id="logininfo">
				<tr>
					<th><label>UserId</label></th>
				</tr>
				<tr>
					<td><input type="text" id="userid" name="userid" size="20" maxlength="30" value="GT296928025"/></td>
				</tr>
				<tr>
					<th><label>PassWord</label></th>
				</tr>
				<tr>
					<td><input type="password" id="password" name="password" size="20" maxlength="30"/></td>
				</tr>
				<tr>
					<td><input type="submit" value="LOGIN"/></td>
				</tr>
			</table>
			</div>
			</form>
			<br/><br/>
			<a href="menu.php" class="login">LOGIN</a><br/>
			<a href="schedule_record.php" class="login">データベース</a>
			
			
		</div><!-- contents -->
		<div id="footer">
		</div><!-- footer -->
	</div><!-- contents -->
</body>
</html>

