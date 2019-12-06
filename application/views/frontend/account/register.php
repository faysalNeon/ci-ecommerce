<section class="area-auth" style="background-image:url(<?=base_url('assets/images/login.jpeg')?>)">
	<div class="container">
		<div class="row  py-5">
			<div class="col-md-8 mx-auto my-5">
				<div class="card shadow">
					<div class="card-body">
						<h3 class="text-center text-uppercase">Registration</h3>
						<form action="<?=base_url('account/processing')?>" method="POST">
							<div class="form-row">
								<div class="col-md-6 form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Enter Fullname" require>
								</div>
								<div class="form-group col-md-6">
									<label for="mobile">Mobile</label>
									<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" require>
								</div>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control"  name="email" id="email" placeholder="Enter Email" require>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" require>
							</div>
							<div class="form-group">
								<label for="passconf">Password Confirmation</label>
								<input type="passconf" class="form-control" name="passconf" id="passconf" placeholder="Password Confirmation" require>
							</div>
							<button type="submit" class="btn btn-block btn-warning">Register</button>
							<a href="<?=base_url('login')?>" class="btn btn-block btn-link">Already Have An Account</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>