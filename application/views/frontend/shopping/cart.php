<section>
	<div class="container">
		<div class="row py-4">
			<div class="col-12 text-center">
				<h3>Shopping Cart</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="table-responsive text-center">
					<table class="table table-bordered" style="min-width:1000px">
						<thead>
							<tr class="table-primary">
								<th width="80">Image</th>
								<th width="150">Product Code</th>
								<th class="text-left">Name</th>
								<th width="100">Unit Price</th>
								<th width="200">Quantity</th>
								<th width="120">Total Price</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($this->cart->contents())<1):?>
							<tr class="table-danger">
								<td colspan="6"><b>Empty Cart</b></td>
							</tr>
							<?php else: foreach ($this->cart->contents() as $key => $item):?>
							<tr>
								<td><img src="<?=$item['thumb']?>" alt="<?=$item['name']?>" height="50"></td>
								<td><?=$item['product_id']?></td>
								<td class="text-left"><?=$item['name']?></td>
								<td><output name="unit-price">$ <?=$this->cart->format_number($item['price'])?></output></td>
								<td>
									<div class="input-group manage-qty">
										<input type="number" name="qty-<?=$item['rowid']?>" class="form-control input-qty" value="<?=$item['qty']?>" min="1" max="500">
										<div class="input-group-append">
											<button type="button" onClick="manageCart('<?=$item['rowid']?>', false)" title="Update Item" class="btn btn-info" > 
												<i class="mdi mdi-sync"></i> 
											</button>
											<button type="button" onClick="manageCart('<?=$item['rowid']?>')" title="Delete Item" class="btn btn-danger"> 
												<i class="mdi mdi-delete-outline"></i> 
											</button>
										</div>
									</div>
								</td>
								<td><output name="total-price">$ <?=$this->cart->format_number($item['subtotal'])?></output></td>
							</tr>
							<?php endforeach; endif?>
						</tbody>
						<?php if(count($this->cart->contents())>0):?>
						<tfooter>
							<tr class="table-success">
								<th colspan="3"></th>
								<th colspan="2" class="text-right">Total Price:</th>
								<th>$<?= $this->cart->format_number($this->cart->total()); ?></th>
							</tr>
						</tfooter>
						<?php endif?>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-6 text-right">
				<a href="<?=base_url()?>" class="btn btn-info">Continue Shopping</a>
				<?php if(count($this->cart->contents())>0):?>
				<a href="<?=base_url('checkout')?>" class="btn btn-success">Checkout</a>
				<?php endif?>
			</div>
		</div>
	</div>
</section>