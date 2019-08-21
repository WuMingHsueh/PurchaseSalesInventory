<form id="form-signup" class="form-horizontal" action="<?= $this->routerRoot ?>/auth/sign-in" method="post">
	<input type="hidden" name="_token" value="<?= $this->escape($this->_token); ?>">
	<div class="container">

		<div class="alert alert-block alert-info">
			<p>
				註冊功能畫面，本站目前開放註冊但保留關閉註冊權利
			</p>
		</div>
		<div class="row">
			<div id="acct-password-row" class="span16">
				<fieldset>
					<legend>Account Password</legend><br>
					<div class="control-group ">
						<label class="control-label">Account</label>
						<div class="controls">
							<input id="current-pass-control" name="password" class="span4" type="password" value="" autocomplete="false">

						</div>
					</div>
					<div class="control-group ">
						<label class="control-label">Password</label>
						<div class="controls">
							<input id="new-pass-control" name="newPassword" class="span4" type="password" value="" autocomplete="false">

						</div>
					</div>
					<div class="control-group ">
						<label class="control-label">Verify Password</label>
						<div class="controls">
							<input id="new-pass-verify-control" name="newPasswordVerification" class="span4" type="password" value="" autocomplete="false">
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<footer id="submit-actions" class="form-actions">
			<button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM">Save</button>
			<button type="submit" class="btn" name="action" value="CANCEL">Cancel</button>
		</footer>
	</div>
</form>
