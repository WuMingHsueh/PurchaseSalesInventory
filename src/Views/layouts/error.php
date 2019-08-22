<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>進銷存系統-錯誤</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="layout" content="main" />

	<script type="text/javascript" src="http://www.google.com/jsapi"></script>

	<script src="<?= $this->assetPath ?>js/jquery/jquery-1.8.2.min.js" type="text/javascript"></script>
	<link href="<?= $this->assetPath ?>css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
	<link rel="shortcut icon" type="image/x-icon" href="<?= $this->assetPath ?>favicon.ico">
	<style>
	</style>
</head>

<body>
	<?= $this->partial($this->topNavbarPath ?? ($this->componentsPath . "topNavbar.php")) ?>
	<div id="body-container">
		<div id="body-content">
			<div class='container'>
				<div class="signin-row row">
					<div class="span16">
						<div class="well well-small well-shadow">
							<legend class="lead">錯誤訊息欄 - error code: <?= $this->code ?? 200 ?></legend>
							<div class="alert alert-block alert-danger">
								<?= $this->message ?> <br>
							</div>
							<?= $this->yieldView() ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?= $this->partial($this->footerPath ?? $this->componentsPath . "footer.php") ?>

		<script type="text/javascript">
			$(function() {
				document.forms['loginForm'].elements['j_username'].focus();
				$('body').addClass('pattern pattern-sandstone');
				$("[rel=tooltip]").tooltip();
			});
		</script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-transition.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-alert.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-modal.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-dropdown.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-scrollspy.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-tab.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-tooltip.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-popover.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-button.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-collapse.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-carousel.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-typeahead.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-affix.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/bootstrap/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/jquery/jquery-tablesorter.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/jquery/jquery-chosen.js" type="text/javascript"></script>
		<script src="<?= $this->assetPath ?>js/jquery/virtual-tour.js" type="text/javascript"></script>


</body>

</html>
