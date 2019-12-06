<section class="area-auth" style="background-image:url(<?=base_url('assets/images/login.jpeg')?>)">
	<div class="container">
		<div class="row py-5">
			<div class="col-sm-8 col-md-6  mx-auto my-5">
				<div class="card shadow">
					<div class="card-body">
						<h3 class="text-center text-uppercase"> login </h3>
						<form action='<?=base_url('account/checking')?>' method="POST">
							<div class="form-group">
								<label for="email"> Email address </label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" require>
							</div>
							<div class="form-group">
								<label for="password"> Password </label>
								<input type="password" class="form-control" id="password"  name="password" placeholder="Password" require>
							</div>
							<button type="submit" class="btn btn-block btn-info"> Submit </button>
							<a href="<?=base_url('register')?>" class="btn btn-block btn-link">Don't Have an Account ?</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>