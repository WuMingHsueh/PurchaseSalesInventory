<div class="row">
	<div class="span16">
		<div id="customers-list" class="box">
			<div class="box-header">
				<i class="icon-user icon-large"></i>
				<h5>顧客列表</h5>
			</div>
			<div class="box-content box-table">
				<table class="table table-hover tablesorter">
					<thead>
						<tr>
							<th>Delivery</th>
							<th>CustomersId</th>
							<th>CompanyName</th>
							<th>Contact</th>
							<th>Phone</th>
							<th>Fax</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($this->customers)) : ?>
							<?php foreach ($this->customers as $customer) : ?>
								<tr id="<?= $customer->CustomersId ?>">
									<td>
										<a href="<?= $this->routerRoot ?>/page/customers/list?customerID=<?= $customer->CustomersId ?>" class="btn btn-small btn-info">
											delivery
										</a>
									</td>
									<td><?= $customer->CustomersId; ?></td>
									<td><?= $customer->CompanyName; ?></td>
									<td><?= $customer->Contact; ?></td>
									<td><?= $customer->Phone; ?></td>
									<td><?= $customer->Fax; ?></td>
									<td><?= $customer->Address; ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="span7">
		<div class="box" id="delivery-list">
			<div class="box-header">
				<i class="icon-user icon-large"></i>
				<h5>出貨列表 - <?= $this->customer ?></h5>
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
