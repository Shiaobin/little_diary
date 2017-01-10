<style type="text/css">
	#dis {
		display: none;
	}
</style>

<div id="dis">
	<!-- here message will be displayed -->
</div>

<form method="post" id="diary-PasswordForm" action="#">
	<table class="table table-bordered">
		<tr>
			<td>目前的密碼</td>
			<td><input type="password" name="cur_password" class="form-control" required /></td>
		</tr>
		<tr>
			<td>新的密碼</td>
			<td><input type="password" name="password" class="form-control" required></td>
		</tr>
		<tr>
			<td>再次確認密碼</td>
			<td><input type="password" name="password_confirm" class="form-control" required></td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"><span class="glyphicon glyphicon-wrench"></span>重新設定</button>
			</td>
		</tr>
	</table>
</form>
