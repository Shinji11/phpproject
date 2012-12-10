<html>
<div id="header">
	<?php if ($row = $stt->fetch()) {
		$com = $row['COM_NM'];
		$bra = $row['BRA_NM'];
		$combra = $com.$bra;
		$lastnm = $row['LAST_NM'];
		$firstnm = $row['FIRST_NM'];
		$username = $lastnm."  ".$firstnm;
		$_SESSION['comcd'] = $row['COM_CD'];
		$_SESSION['bracd'] = $row['BRA_CD'];
		$_SESSION['combra'] = $combra;
		$_SESSION['authority'] = $row['AUTHORITY_CD'];
		$_SESSION['userid'] = $userid;
		$_SESSION['username'] = $username;
	?>
	<div id="headerinfo">
	<table id="info" align="center" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="left"　colspan="2"><input id="title" type="text"  readonly="readonly" value="MENU" /></td>
			<td align="right"><a id="logout" class="oneline" href="login.php">LOGOUT</a></td>
		</tr>
		<tr>
			<td align="center" colspan="3">
				<input id="com-bra" type="text"  readonly="readonly" 
				  value="<?php print($combra); ?>" />
			</td>
		</tr>
		<tr>
			<td align="right" colspan="3">
				<table id="userinfo">
					<tr><td><input id="userid" type="text"  readonly="readonly" value="<?php print($userid); ?>" /></td></tr>
					<tr>
						<td>
							<input id="username" type="text"  readonly="readonly" 
							  value="<?php print($username); ?>" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</div><!--headerinfo-->
	<div id="nav">
		<ul id="navlist">
			<li><a class="twoline" href="personal/personal.php?title=PERSONAL SCHEDULE">PERSONAL<br/>SCHEDULE</a><li/>
			<li><a class="twoline" href="work/work.php?title=WORK SCHEDULE">WORK<br/>SCHEDULE</a><li/>
			<?php if ($row['AUTHORITY_CD'] == 1
						|| $row['AUTHORITY_CD'] == 2) { ?>
				<li><a class="oneline" href="member/member.php?title=MEMBER">MEMBER</a><li/>
				<li><a class="oneline" href="scheduling/scheduling.php?title=SCHEDULING">SCHEDULING</a><li/>
			<?php } else { ?>
				<li><a class="oneline"></a><li/>
				<li><a class="oneline"></a><li/>
			<?php } if ($row['AUTHORITY_CD'] == 1) { ?>
				<li><a class="oneline" href="master/master.php?title=MASTER">MASTER</a><li/>
			<?php } else { ?>
				<li><a class="oneline"></a><li/>
			<?php } ?>
		</ul>
	</div><!--headermenu-->
	<?php } ?>
</div><!--header-->
</html>