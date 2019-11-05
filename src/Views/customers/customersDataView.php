<form action="" method="post" class="form-horizontal">
	<div class="row">
		<div class="span8">
			<div class="box">
				<div class="box-content">
					<div class="btn-group-box" align="center">
						<button type="button" class="btn" onclick="location.href='<?= $this->routerRoot ?>/page/customers/data?customerOrder=<?= 0 ?>'" <?= ($this->currentCustomerOrder != 0) ? '' : 'disabled' ?>>
							<i class="icon-upload icon-large"></i>
							<br>第一筆
						</button>
						<button type="button" class="btn" onclick="location.href='<?= $this->routerRoot ?>/page/customers/data?customerOrder=<?= ($this->currentCustomerOrder - 1) ?>'" <?= ($this->currentCustomerOrder != 0) ? '' : 'disabled' ?>>
							<i class="icon-chevron-left icon-large"></i>
							<br>上一筆
						</button>
						<button type="button" class="btn" onclick="location.href='<?= $this->routerRoot ?>/page/customers/data?customerOrder=<?= ($this->currentCustomerOrder + 1) ?>'" <?= ($this->currentCustomerOrder != $this->customerTotal) ? '' : 'disabled' ?>>
							<i class="icon-chevron-right icon-large"></i>
							<br>下一筆
						</button>
						<button type="button" class="btn" onclick="location.href='<?= $this->routerRoot ?>/page/customers/data?customerOrder=<?= $this->customerTotal ?>'" <?= ($this->currentCustomerOrder != $this->customerTotal) ? '' : 'disabled' ?>>
							<i class="icon-download icon-large"></i>
							<br>最後一筆
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="span8">
			<div class="box">
				<div class="box-content">
					<div class="btn-group-box" align="center">
						<button type="button" class="btn"><i class="icon-plus-sign icon-large"></i><br>新增</button>
						<button type="button" class="btn"><i class="icon-edit icon-large"></i><br>儲存</button>
						<button type="reset" class="btn"><i class="icon-remove-sign icon-large"></i><br>取消</button>
						<button type="button" class="btn"><i class="icon-minus-sign icon-large"></i><br>刪除</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span16">
			<div class="box">
				<div class="box-content box-table">
					<table class="table table-hover tablesorter">
						<thead>
							<tr>
								<th>選取</th>
								<th>CustomerID</th>
								<th>CompanyName</th>
								<th>Contact</th>
								<th>Phone</th>
								<th>Fax</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($this->customers)) : ?>
								<?php foreach ($this->customers as $order => $customer) : ?>
									<tr id="<?= $customer->CustomersId ?>">
										<td>
											<a href="<?= $this->routerRoot ?>/page/customers/data?customerOrder=<?= $order ?>" class="btn btn-small btn-warning">
												select : <?= $order ?>
											</a>
										</td>
										<td><?= $customer->ID; ?></td>
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
		<div class="span12">
			<div class="box">
				<div class="box-content">
					<fieldset>
						<div class="control-group">
							<label for="" class="control-label">客戶名稱</label>
							<div class="controls"><input type="text" name="ID" value="<?= $this->customer->ID ?>" placeholder="客戶名稱" class="span4"></div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">公司名稱</label>
							<div class="controls"><input type="text" name="CompanyName" value="<?= $this->customer->CompanyName ?>" placeholder="公司名稱" class="span6"></div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">連絡人</label>
							<div class="controls"><input type="text" name="Contact" value="<?= $this->customer->Contact ?>" placeholder="連絡人" class="span4"></div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">電話</label>
							<div class="controls"><input type="text" name="Phone" value="<?= $this->customer->Phone ?>" placeholder="電話" class="span4"></div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">傳真</label>
							<div class="controls"><input type="text" name="Fax" value="<?= $this->customer->Fax ?>" placeholder="傳真" class="span4"></div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">地址</label>
							<div class="controls"><input type="text" name="Address" value="<?= $this->customer->Address ?>" placeholder="地址" class="span9"></div>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
</form>
<div class="span4">
	<div class="box">
		<div class="box-header">
			<h5>ListChanged</h5>
		</div>
		<div class="box-content">
			<select name="listChanged" multiple>
				<?php foreach ($this->listChanged as $item) : ?>
					<option value="<?= $item ?>"><?= $item ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
</div>
</div>
<div class="row">
	<div class="span5">
		<form class="form-search" action="" method="post">
			<div class="box">

				<div class="box-header">
					<h5>記錄尋找</h5>
				</div>
				<div class="box-content">
					<div class="control-group">
						<label for="" class="control-label">欄位</label>
						<select name="item-search" id="">
							<option value="">CustomerID</option>
							<option value="">CompanyName</option>
						</select>
					</div>
					<div class="control-group">
						<label for="" class="control-label">值</label>
						<input type="text" name="search-value" placeholder="">
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-info pull-right">尋找</button>
				</div>

			</div>
		</form>
	</div>
	<div class="span5">
		<form action="" method="post" class="form-inline">
			<div class="box">
				<div class="box-header">
					<h5>
						記錄排序
					</h5>
				</div>
				<div class="box-content">
					<div class="control-group">
						<label for="">欄位</label>
						<select name="item-sort" id="">
							<option value="">CustomerID</option>
							<option value="">CompanyName</option>
						</select>
					</div>

					<label for="" class="radio inline"><input type="radio" name="sort-value" value="asc" checked>升冪</label>
					<label for="" class="radio inline"><input type="radio" name="sort-value" value="desc">降冪</label>

				</div>
				<div class="box-footer">
					<button type="reset" class="btn btn-success">移除排序</button>
					<button type="submit" class="btn btn-primary pull-right">排序</button>
				</div>
			</div>
		</form>
	</div>
	<div class="span6">
		<form action="" method="post" class="form-search">
			<div class="box">
				<div class="box-header">
					<h5>
						記錄篩選
					</h5>
				</div>
				<div class="box-content">
					<div class="control-group">
						<input type="text" name="filter-value" placeholder="CustomerID != 'A'">
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" class="btn btn-success">移除篩選</button>
					<button type="submit" class="btn btn-primary pull-right">篩選</button>
				</div>
			</div>
		</form>
	</div>
</div>
