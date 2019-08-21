<legend>請登入帳號</legend>
<form action='<?= $this->routerRoot ?>/auth/sign-in' method='POST' id='loginForm' class='form-signin' autocomplete='off'>
	<div class="form-inner">
		<input type="hidden" name="_token" value="<?= $this->escape($this->_token); ?>">
		<div class="input-prepend">

			<span class="add-on" rel="tooltip" title="Username or E-Mail Address" data-placement="top"><i class="icon-envelope"></i></span>
			<input type='text' class='span4' id='username' name="username" placeholder="帳號 or E-mail" />
		</div>

		<div class="input-prepend">

			<span class="add-on"><i class="icon-key"></i></span>
			<input type='password' class='span4' id='password' name="password" placeholder="密碼" />
		</div>
		<label class="checkbox" for='remember_me'>記得我
			<input type='checkbox' id='remember_me' />
		</label>
	</div>
	<footer class="signin-actions">
		<input class="btn btn-primary" type='submit' id="submit" value='登入' />
	</footer>
</form>
