<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?= $this->routerRoot ?>" class="brand"><i class="icon-leaf">進銷存系統</i></a>
			<div id="app-nav-top-bar" class="nav-collapse">
				<?php if ($this->isLogined ?? false) : ?>
				<ul class="nav">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">帳戶資料
							<b class="caret hidden-phone"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">修改帳密</a>
							</li>
							<!-- <li>
								<a href="#">個人訊息</a>
							</li> -->
							<li>
								<a href="#">權限列表</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">版型配置
							<b class="caret hidden-phone"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="demo-horizontal-nav.html">水平</a>
							</li>
							<li>
								<a href="demo-horizontal-fixed-nav.html">水平固定</a>
							</li>
							<li>
								<a href="demo-vertical-nav.html">垂直</a>
							</li>
							<li>
								<a href="demo-vertical-fixed-nav.html">垂直固定</a>
							</li>
						</ul>
					</li>

				</ul>
				<?php endif; ?>
				<ul class="nav pull-right">
					<?php if ($this->isLogined ?? false) : ?>
					<li>
						<a href="<?= $this->routerRoot ?>/auth/sign-out">登出</a>
					</li>
					<?php else : ?>
					<li>
						<a href="<?= $this->routerRoot ?>/auth/sign-up">註冊</a>
					</li>
					<li>
						<a href="<?= $this->routerRoot ?>/auth/sign-in">登入</a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
