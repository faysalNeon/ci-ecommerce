<section>
	<div class="container">
		<div class="row p-3 text-center">
			<div class="col-12">
				<h3>Product Check Out</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<form class="accordion" id="checkoutGroup" action="<?=base_url('complete')?>" method="POST">
					<article class="card">
						<div class="card-header">
							<h6 class="m-0"><b class='text-uppercase'>Step 1:-</b> Checkout Options</h6>
						</div>
						<div id="checkoutOptions" class="collapse show" data-parent="#checkoutGroup">
							<div class="card-body">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-secondary active">
										<input type="radio" name="options" id="option1" checked> login to account
									</label>
									<label class="btn btn-secondary">
										<input type="radio" name="options" id="option2"> new account
									</label>
								</div>
							</div>
							<div class="p-0 m-2  d-flex justify-content-between">
								<div></div>
								<button type="button" class="float-right btn btn-secondary" data-toggle="collapse" data-target="#billingDetails">continue</buttona>
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
						<div id="billingDetails" class="collapse" data-parent="#checkoutGroup">
							<div class="card-body">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="inputEmail4">Email</label>
										<input type="email" class="form-control" id="inputEmail4">
									</div>
									<div class="form-group col-md-6">
										<label for="inputPassword4">Password</label>
										<input type="password" class="form-control" id="inputPassword4">
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress">Address</label>
									<input type="text" class="form-control" id="inputAddress" placeholder="">
								</div>
								<div class="form-group">
									<label for="inputAddress2">Address 2</label>
									<input type="text" class="form-control" id="inputAddress2" placeholder="">
								</div>
								<div class="form-row">
									<div class="form-group col-md-5">
										<label for="inputCity">City</label>
										<input type="text" class="form-control" id="inputCity">
									</div>
									<div class="form-group col-md-5">
										<label for="inputState">State</label>
										<select id="inputState" class="form-control">
											<option selected>Choose</option>
											<option></option>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label for="inputZip">Zip</label>
										<input type="text" class="form-control" id="inputZip">
									</div>
								</div>
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck">
										<label class="form-check-label" for="gridCheck">
											I have read and agree to the Privacy Policy
										</label>
									</div>
								</div>
							</div>
							<div class="p-0 m-2  d-flex justify-content-between">
								<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#checkoutOptions">back</buttona>
								<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#deliveryDetails">continue</buttona>
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
						<div id="deliveryDetails" class="collapse" data-parent="#checkoutGroup">
							<div class="card-body">
								<small class="mb-1">Please select the preferred payment method to use on this order.</small>
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="delivery-method" id="delivery-method-1" value="option1" checked>
										<label class="form-check-label" for="delivery-method-1"> Free Shipping </label>
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress">Add Comments About Your Order</label>
									<textarea class="form-control" name="" id="" rows="5"></textarea>
								</div>
							</div>
							<div class="p-0 m-2  d-flex justify-content-between">
								<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#billingDetails">back</buttona>
								<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#paymentMethod">continue</buttona>
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
						<div id="paymentMethod" class="collapse" data-parent="#checkoutGroup">
							<div class="card-body">
								<small class="mb-1">Please select the preferred payment method to use on this order.</small>
								<div class="form-group">
									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="payment-method" id="payment-method-1" value="option1" checked>
											<label class="form-check-label" for="payment-method-1"> Cash On Delivery </label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress">Add Comments About Your Order</label>
									<textarea class="form-control" name="" id="" rows="5"></textarea>
								</div>
							</div>
							<div class="p-0 m-2  d-flex justify-content-between">
								<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#deliveryDetails">back</buttona>
								<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#confirmOrder">continue</buttona>
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
						<div id="confirmOrder" class="collapse" data-parent="#checkoutGroup">
							<div class="card-body">
								<div class="table-responsive table-sm text-center">
									<table class="table table-bordered" style="min-width:1000px">
										<thead>
											<tr>
												<th class="text-left">Name</th>
												<th width="200">Quantity</th>
												<th width="100">Unit Price</th>
												<th width="120">Total Price</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-left">product Name</td>
												<td>2</td>
												<td>5000</td>
												<td>5000</td>
											</tr>
											<tr  class="table-warning">
												<td colspan="5"></td>
											</tr>
											<tr>
												<td colspan="1"></td>
												<td colspan="2" class="text-right">Total Price:</td>
												<td>5000</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="p-0 m-2  d-flex justify-content-between">
									<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#paymentMethod">back</buttona>
									<button type="submit" class="btn btn-secondary">Confirm Order</buttona>
								</div>
							</div>
						</div>
					</article>
				</form>
			</div>
		</div>
	</div>
</section>
