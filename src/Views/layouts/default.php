<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>進銷存系統-<?= $this->escape($this->title ?? "作品展示") ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="layout" content="main" />

	<script type="text/javascript" src="http://www.google.com/jsapi"></script>

	<script src="<?= $this->assetPath ?>js/jquery/jquery-1.8.2.min.js" type="text/javascript"></script>
	<link href="<?= $this->assetPath ?>css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
	<link rel="shortcut icon" type="image/x-icon" href="<?= $this->assetPath ?>favicon.ico">
	<style>
		#body-content {
			padding-top: 40px;
		}
	</style>
</head>

<body>
	<?= $this->partial($this->topNavbarPath ?? $this->componentsPath . "topNavbar.php") ?>
	<div id="body-container">
		<div id="body-content">

			<div class="body-nav body-nav-vertical body-nav-fixed">
				<div class="container">
					<ul>
						<li>
							<a href="#">
								<i class="icon-dashboard icon-large"></i> 商品
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-calendar icon-large"></i> 廠商
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-map-marker icon-large"></i> 客戶
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-tasks icon-large"></i> 進貨
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-cogs icon-large"></i> 出貨
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-list-alt icon-large"></i> 報表
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-group icon-large"></i> 員工
							</a>
						</li>
					</ul>
				</div>
			</div>


			<section class="nav nav-page">
				<div class="container">
					<div class="row">
						<?= $this->partial($this->navPath ?? $this->componentsPath . "pageNavs/homeNav.php") ?>
					</div>
				</div>
			</section>
			<section class="page container">
				<?= $this->yieldView(); ?>
			</section>
		</div>
	</div>
	<?= $this->partial($this->footerPath ?? $this->componentsPath . "footer.php") ?>

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
	<script type="text/javascript">
		$(function() {
			$('#sample-table').tablesorter();
			$('#datepicker').datepicker();
			$(".chosen").chosen();
		});
	</script>

</body>

</html>
