<section>
	<div class="container">
		<div class="row p-3 text-center">
			<div class="col-12">
				<h3>Product Check Out</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<section class="accordion" id="checkoutGroup">
					<article class="card">
						<div class="card-header">
							<h6 class="m-0"><b class='text-uppercase'>Step 1:-</b>Account Details</h6>
						</div>
						<div id="step_1" class="collapse <?=step(1)?>" data-parent="#checkoutGroup">
							<div class="card-body">
								<?php if (access()):?>
								<div class="text-center">
									<h3>Hello! Dear <b><?=user_data('name')?></b></h3>
									<p>You have successfully completed step one</p>
									<button type="button" class="btn btn-secondary" onClick="next(2)">continue</buttona>
								</div>
								<?php else:?>
								<ul class="nav nav-tabs justify-content-center">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tabLogin">Already Have Account</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tabRegister">I Don't Have Account</a>
									</li>
								</ul>
								<div class="tab-content pt-4">
									<form  class="tab-pane container active" id="tabLogin" action='<?=base_url('account/checking')?>' method="POST">
										<div class="form-group">
											<label for="inputLoginEmail"> Email address </label>
											<input type="email" class="form-control" id="inputLoginEmail" name="email" placeholder="Enter email" require>
										</div>
										<div class="form-group">
											<label for="inputLoginPassword"> Password </label>
											<input type="password" class="form-control" id="inputLoginPassword"  name="password" placeholder="Password" require>
										</div>
										<div class="p-0 m-2  d-flex justify-content-end">
											<button type="submit" class="float-right btn btn-secondary">continue</buttona>
										</div>
									</form>
									<form class="tab-pane container fade" id="tabRegister" action="<?=base_url('account/processing')?>" method="POST">
										<div class="form-row">
											<div class="col-md-6 form-group">
												<label for="inputRegisterName">Name</label>
												<input type="text" class="form-control" name="name" id="inputRegisterName" placeholder="Enter Fullname" require>
											</div>
											<div class="form-group col-md-6">
												<label for="inputRegisterMobile">Mobile</label>
												<input type="text" class="form-control" name="mobile" id="inputRegisterMobile" placeholder="Enter Mobile" require>
											</div>
										</div>
										<div class="form-group">
											<label for="inputRegisterEmail">Email</label>
											<input type="email" class="form-control"  name="email" id="inputRegisterEmail" placeholder="Enter Email" require>
										</div>
										<div class="form-group">
											<label for="inputRegisterPassword">Password</label>
											<input type="password" class="form-control" name="password" id="inputRegisterPassword" placeholder="Enter Password" require>
										</div>
										<div class="form-group">
											<label for="inputRegisterPassconf">Password Confirmation</label>
											<input type="passconf" class="form-control" name="passconf" id="inputRegisterPassconf" placeholder="Password Confirmation" require>
										</div>
										<div class="p-0 m-2  d-flex justify-content-end">
											<button type="submit" class="float-right btn btn-secondary">continue</buttona>
										</div>
									</form>
								</div>
								<?php endif?>
							</div>
						</div>
					</article>
					<article class="card">
						<div class="card-header">
							<h6 class="m-0">
								<b class='text-uppercase'>Step 2:-</b>
								<span>Billing Details</span>
								<i class="float-right mdi mdi-lock-outline"></i>
							</h6>
						</div>
						<div id="step_2" class="collapse <?=step(2)?>" data-parent="#checkoutGroup">
							<div class="card-body">
								<div class="form-group">
									<label for="inputAddress">Address</label>
									<input type="text" class="form-control" id="inputAddress" name="address">
								</div>
								<div class="form-row">
									<div class="form-group col-md-5">
										<label for="inputCity">City</label>
										<input type="text" class="form-control" id="inputCity" name="city" require>
									</div>
									<div class="form-group col-md-5">
										<label for="inputCountry">Country</label>
										<select id="inputCountry" class="form-control" name="country" require>
											<option selected>Chose One</option>
											<option value="Bangladesh">Bangladesh</option>
											<option value="Australia">Australia</option>
											<option value="United State">United State</option>
											<option value="United Kingdom">United Kingdom</option>
											<option value="United arab emirates">United Arab Emirates</option>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label for="inputZip">Zip</label>
										<input type="text" class="form-control" id="inputZip" name="zip">
									</div>
								</div>
								<div class="form-group">
									<div class="ml-4 custom-checkbox">
										<input class="custom-control-input" type="checkbox" id="gridCheck">
										<label class="custom-control-label" for="gridCheck">
											I have read and agree to the Privacy Policy
										</label>
									</div>
								</div>
							</div>
							<div class="p-0 m-2  d-flex justify-content-between">
								<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#step_1">back</buttona>
								<button type="button" class="btn btn-secondary" onClick="next(3)">continue</buttona>
							</div>
						</div>
					</article>
					<article class="card">
						<div class="card-header">
							<h6 class="m-0">
								<b class='text-uppercase'>Step 3:-</b>
								<span>Delivery Details</span>
								<i class="float-right mdi mdi-lock-outline"></i>
							</h6>
						</div>
						<div id="step_3" class="collapse <?=step(3)?>" data-parent="#checkoutGroup">
							<div class="card-body">
								<small class="mb-1">Please select the preferred payment method to use on this
									order.</small>
								<div class="form-group">
									<?php foreach ($this->hm->shipping_methods() as $key => $method):?>
									<div class="form-check">
										<input <?=$key==0?'checked':null?> class="form-check-input" type="radio"
											name="shipping_method_id" id="shipping-<?=$method->id?>"
											value="<?=$method->id?>">
										<label class="form-check-label" for="shipping-<?=$method->id?>">
											<?=$method->name?> <span class="badge badge-info">$ <?=$method->charge?>
											</span> </label>
									</div>
									<?php endforeach?>
								</div>
								<div class="form-group">
									<label for="inputAddress">Add Comments About Your Order</label>
									<textarea class="form-control" name="" id="" rows="5"></textarea>
								</div>
							</div>
							<div class="p-0 m-2  d-flex justify-content-between">
								<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#step_1">back</buttona>
								<button type="button" class="btn btn-secondary" onClick="next(4)">continue</buttona>
							</div>
						</div>
					</article>
					<article class="card">
						<div class="card-header">
							<h6 class="m-0">
								<b class='text-uppercase'>Step 4:-</b>
								<span>Payment Method</span>
								<i class="float-right mdi mdi-lock-outline"></i>
							</h6>
						</div>
						<div id="step_4" class="collapse <?=step(4)?>" data-parent="#checkoutGroup">
							<div class="card-body">
								<small class="mb-1">Please select the preferred payment method to use on this
									order.</small>
								<div class="form-group">
									<div class="form-group">
										<?php foreach ($this->hm->payment_methods() as $key => $method):?>
										<div class="form-check">
											<input <?=$key==0?'checked':null?> class="form-check-input" type="radio"
												name="payment_method_id" id="payment-<?=$method->id?>"
												value="<?=$method->id?>">
											<label class="form-check-label" for="payment-<?=$method->id?>">
												<?=$method->name?> </label>
										</div>
										<?php endforeach?>
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress">Add Comments About Your Order</label>
									<textarea class="form-control" name="" id="" rows="5"></textarea>
								</div>
							</div>
							<div class="p-0 m-2  d-flex justify-content-between">
								<button type="button" class="btn btn-secondary" data-toggle="collapse"
									data-target="#step_2">back</buttona>
									<button type="button" class="btn btn-secondary" onClick="next(4)">continue</buttona>
							</div>
						</div>
					</article>
					<article class="card">
						<div class="card-header">
							<h6 class="m-0">
								<b class='text-uppercase'>Step 5:-</b>
								<span>Confirm Order</span>
								<i class="float-right mdi mdi-lock-outline"></i>
							</h6>
						</div>
						<div id="step_5" class="collapse <?=step(5)?>" data-parent="#checkoutGroup">
							<div class="card-body">
								<h6 class="my-2">Customer Information</h6>
								<div class="table-responsive table-sm text-center">
									<table class="table table-bordered" style="min-width:1000px">
										<thead>
											<tr>
												<th class="text-left">Name</th>
												<th width="200">Code</th>
												<th width="200">Quantity</th>
												<th width="100">Unit Price</th>
												<th width="120">Sub Total</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($this->cart->contents() as $key => $item):?>
											<tr>
												<td class="text-left"><?=$item['name']?></td>
												<td><?=$item['product_id']?></td>
												<td><?=$item['qty']?></td>
												<td>$<?=$this->cart->format_number($item['price'])?></td>
												<td>$<?=$this->cart->format_number($item['subtotal'])?></td>
											</tr>
											<?php endforeach;?>

											<tr class="table-warning">
												<td colspan="6"></td>
											</tr>
											<tr>
												<td colspan="2"></td>
												<td colspan="2" class="text-right">Total Price:</td>
												<td>$<?=$this->cart->format_number($this->cart->total());?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<h6 class="my-2">Shipping Information</h6>
								<div class="table-responsive table-sm text-center">
									<table class="table table-bordered" style="min-width:1000px">
										<thead>
											<tr>
												<th class="text-left">Name</th>
												<th width="200">Code</th>
												<th width="200">Quantity</th>
												<th width="100">Unit Price</th>
												<th width="120">Sub Total</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($this->cart->contents() as $key => $item):?>
											<tr>
												<td class="text-left"><?=$item['name']?></td>
												<td><?=$item['product_id']?></td>
												<td><?=$item['qty']?></td>
												<td>$<?=$this->cart->format_number($item['price'])?></td>
												<td>$<?=$this->cart->format_number($item['subtotal'])?></td>
											</tr>
											<?php endforeach;?>

											<tr class="table-warning">
												<td colspan="6"></td>
											</tr>
											<tr>
												<td colspan="2"></td>
												<td colspan="2" class="text-right">Total Price:</td>
												<td>$<?=$this->cart->format_number($this->cart->total());?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<h6 class="my-2">Shipping Information</h6>
								<div class="table-responsive table-sm text-center">
									<table class="table table-bordered" style="min-width:1000px">
										<thead>
											<tr>
												<th class="text-left">Name</th>
												<th width="200">Code</th>
												<th width="200">Quantity</th>
												<th width="100">Unit Price</th>
												<th width="120">Sub Total</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($this->cart->contents() as $key => $item):?>
											<tr>
												<td class="text-left"><?=$item['name']?></td>
												<td><?=$item['product_id']?></td>
												<td><?=$item['qty']?></td>
												<td>$<?=$this->cart->format_number($item['price'])?></td>
												<td>$<?=$this->cart->format_number($item['subtotal'])?></td>
											</tr>
											<?php endforeach;?>

											<tr class="table-warning">
												<td colspan="6"></td>
											</tr>
											<tr>
												<td colspan="2"></td>
												<td colspan="2" class="text-right">Total Price:</td>
												<td>$<?=$this->cart->format_number($this->cart->total());?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="p-0 m-2  d-flex justify-content-between">
									<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#step_4">back</buttona>
									<button type="submit" class="btn btn-secondary">Confirm Order</buttona>
								</div>
							</div>
						</div>
					</article>
				</section>
			</div>
		</div>
	</div>
</section>
<script>
	function next($id){
		$.ajax({ 
			url : '<?=base_url('cart/step/')?>'+$id,
			type : "POST",
			success:function(step){
				
				console.log(step);
			}
		})
	}
$(function(){
	$('form').submit(function(e){
		e.preventDefault();
		var $formData = $(this).serialize(), $url = $(this).attr('action');
		$.ajax({ url : $url, type : "POST", data : $formData, success : function(res) { location.reload();}});
	});
})
</script>
