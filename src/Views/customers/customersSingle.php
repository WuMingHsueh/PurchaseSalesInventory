<div class="row">
	<div class="span16">
		<div class="box">
			<div class="box-header">
				<h5>逐個查詢</h5>
			</div>
			<div class="box-content">
				<div class="btn-group-box" align="center">
					<button type="button" class="btn" onclick="location.href='<?= $this->routerRoot ?>/page/customers/single?customerOrder=<?= 0 ?>'" <?= ($this->currentCustomerOrder != 0) ? '' : 'disabled' ?>>
						<i class="icon-upload icon-large"></i>
						<br>第一筆
					</button>
					<button type="button" class="btn" onclick="location.href='<?= $this->routerRoot ?>/page/customers/single?customerOrder=<?= ($this->currentCustomerOrder - 1) ?>'" <?= ($this->currentCustomerOrder != 0) ? '' : 'disabled' ?>>
						<i class="icon-chevron-left icon-large"></i>
						<br>上一筆
					</button>
					<button type="button" class="btn" onclick="location.href='<?= $this->routerRoot ?>/page/customers/single?customerOrder=<?= ($this->currentCustomerOrder + 1) ?>'" <?= ($this->currentCustomerOrder != $this->customerTotal) ? '' : 'disabled' ?>>
						<i class="icon-chevron-right icon-large"></i>
						<br>下一筆
					</button>
					<button type="button" class="btn" onclick="location.href='<?= $this->routerRoot ?>/page/customers/single?customerOrder=<?= $this->customerTotal ?>'" <?= ($this->currentCustomerOrder != $this->customerTotal) ? '' : 'disabled' ?>>
						<i class="icon-download icon-large"></i>
						<br>最後一筆
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="span16">
		<div class="box">
			<div class="box-header">
				<h5>顧客資訊</h5>
			</div>
			<div class="box-content box-list collapse in">
				<ul>
					<li>
						<div>
							<a href="#" class="news-item-title">
								客戶編號
							</a>
							<p class="news-item-preview">
								<?php print_r($this->customer['id']) ?>
							</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#" class="news-item-title">
								公司名稱
							</a>
							<p class="news-item-preview">
								<?= $this->customer->CompanyName ?>
							</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#" class="news-item-title">
								連絡人
							</a>
							<p class="news-item-preview">
								<?= $this->customer->JoinMan ?>
							</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#" class="news-item-title">
								電話
							</a>
							<p class="news-item-preview">
								<?= $this->customer->Tel1 ?>
							</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#" class="news-item-title">
								傳真
							</a>
							<p class="news-item-preview">
								<?= $this->customer->Fax ?>
							</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#" class="news-item-title">
								地址
							</a>
							<p class="news-item-preview">
								<?= $this->customer->CompanyAddress ?>
							</p>
						</div>
					</li>
				</ul>

			</div>
		</div>
	</div>
	<div class="span8">
		<div class="box">
			<div class="box-header">
				<i class="icon-user icon-large"></i>
				<h5>出貨列表 - <?= $this->customer->CompanyName ?></h5>
			</div>
			<div class="box-content box-table">
				<table class="table table-hover tablesorter">
					<thead>
						<tr>
							<th>DeliveryID</th>
							<th>DeliveryDate</th>
							<th>CustomerID</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($this->deliverys)) : ?>
							<?php foreach ($this->deliverys as $delivery) : ?>
								<tr id="<?= $delivery->DeliveryID ?>">
									<td><?= $delivery->DeliveryID; ?></td>
									<td><?= $delivery->DeliveryDate; ?></td>
									<td><?= $delivery->CustomerID; ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
