<section>
	<div class="container">
		<div class="row py-4">
			<div class="col-12 text-center">
				<h2 class='text-uppercase'><?=$title?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<nav class="nav nav-pills nav-fill p-1 bg-secondary">
					<li class="nav-item p-1">
						<a class="btn btn-block btn-sm btn-dark" href="<?=base_url()?>">Back To Store</a>
					</li>
					<li class="nav-item p-1">
						<a class="btn btn-block btn-sm btn-info" href="<?=base_url('account')?>">Profile</a>
					</li>
				</nav>
			</div>
		</div>
		<div class="modal fade" id="logo_manage_modal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body"><div id="logo_manage"></div></div>
					<div class="modal-footer p-1">
						<button type="button" id="set_logo" class="btn btn-sm btn-warning mr-auto">Set Logo</button>
						<button type="button" id="cancel_crop" class="btn btn-sm btn-danger " data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-md-4 text-center">
				<div style="width:290px;overflow:hidden;position:relative">
					<img class="m-2 img-thumbnail" id='preview_photo' src="<?=user_data('photo')?>" alt="<?=user_data('name')?>" width="280">
					<input type="hidden" id="get_logo_data" name="photo"/>
					<label style="position:absolute;right:10px;bottom:8px">
						<input type="file" id="item_logo" class="d-none"/>
						<i class="btn btn-info mdi mdi-image-edit-outline"></i>
					</label>
				</div>
				<link rel="stylesheet" href="<?=base_url()?>assets/vendors/Croppie/croppie.css">
				<script src="<?=base_url()?>assets/vendors/Croppie/croppie.js"></script>
    			<script>
					var $photoUploadCrop, $logo_temp_filename, $raw_logo, $height=280, $width=280;
					function logo_read_file(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
								$('#logo_manage').addClass('ready');
								$('#logo_manage_modal').modal('show');
								$raw_logo = e.target.result;
							}
							reader.readAsDataURL(input.files[0]);
						}
					}
					$photoUploadCrop = $('#logo_manage').croppie({viewport:{ width:$width, height:$height}, boundary:{ width: $width+10, height:$height+10 }, enableExif: true }); 
					$('#logo_manage_modal').on('shown.bs.modal', function(){ $photoUploadCrop.croppie('bind', { url: $raw_logo }).then(function(){ console.log('logo bind complete'); }); });
					$('#item_logo').on('change', function () { $('#cancel_crop').data('id', $(this).data('id')); logo_read_file(this);});
					$('#set_logo').on('click', function (ev) {
						$photoUploadCrop.croppie('result', { type: 'canvas', format: 'png', size: 'viewport' }).then(function (resp){
							$.ajax({
								url:'<?=base_url('account/update/photo')?>',
								type:'POST',
								data:{photo:resp},
								success:function(res){
									if(res){
										$('#preview_photo').attr('src', resp);
										$('#logo_manage_modal').modal('hide');
									}else{
										location.reload();
									}
								},
								error:function(error) {
									location.reload();
								}
							})
						});
					});
				</script>
			</div>
			<div class="col-md-8">
				<div class="table-responsive-md p-2">
					<table class="table table-bordered table-striped">
						<thead>
							<tr><th colspan="3">My Information</th></tr>
						</thead>
						<tbody>
							<tr>
								<th width='180'>Name:</th>
								<td data-name="<?=base_url('account/update/name')?>"><?=user_data('name')?></td>
								<td class="py-0 px-1" width="20">
									<button id="btnEdit" class="d-block m-0 btn btn-sm btn-warning">edit</button>
									<button id="btnSave" class="d-none m-0 btn btn-sm btn-success">save</button>
								</td>
							</tr>
							<tr>
								<th>Mobile:</th>
								<td colspan="2"><?=user_data('mobile')?></td>
							</tr>
							<tr>
								<th>Email:</th>
								<td colspan="2"><?=user_data('email')?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script>
		$(document).ready(function()  {
			var area = $('[data-editable]');
			var inputName = $('[data-name]');
			var btnSave = $('#btnSave');
			var btnEdit = $('#btnEdit');
			btnEdit.click(function() {
				btnEdit.toggleClass('d-none d-block');
				btnSave.toggleClass('d-block d-none');
				inputName.attr('contentEditable','true');
				inputName.focus();
			})
			btnSave.click(function() {
				$.ajax({
					type:'POST',
					url:inputName.data('name'),
					data:{name:inputName.text()},
					success:function(res){
						btnSave.toggleClass('d-none d-block');
						btnEdit.toggleClass('d-block d-none');
						inputName.removeAttr('contentEditable');
					},
					error:function(error){
						console.log(error);
					}
				})
			})
		})
		</script>
		<div class="row">
			<div class="col-12">
				<div class="table-responsive-md p-2">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width='180'>
									<?php if(isset($address)):?>
										<button type="button" class="btn btn-sm btn-block btn-warning" onClick="address(<?=$address->id?>)">Update Now</button>
									<?php else:?>
										<button type="button" class="btn btn-sm btn-block btn-info" onClick="address()" >Add Now</button>
									<?php endif?>
								</th>
								<th class="text-center">My Address</th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($address)):?>
								<tr>
									<th >Address:</th>
									<td><?=$address->address?></td>
								</tr>
								<tr>
									<th>City:</th>
									<td><?=$address->city?></td>
								</tr>
								<tr>
									<th>Country:</th>
									<td><?=$address->country?></td>
								</tr>
								<tr>
									<th>Zip:</th>
									<td><?=$address->zip?></td>
								</tr>
							<?php else:?>
								<tr>
									<th colspan="2" class="text-center">Address is Empty</th>
								</tr>
							<?php endif?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteConfirmDialog">Delete My Account</button>
			</div>
		</div>
	</div>
</section>

<form id="deleteConfirmDialog" class="modal fade " action="<?=base_url('account/deactive')?>" method="POST">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content bg-danger">
			<div class="modal-body text-center pt-5">
				<h6 class="text-light text-uppercase">Before Delete</h6>	
				<h4 class="text-dark text-uppercase">Just One More Step</h4>	
			</div>
			<div class="modal-footer p-1">
				<button type="submit" class="text-uppercase btn btn-sm btn-outline-light mr-auto">
					<b class='align-text-bottom mr-1'>Delete</b><i class="mdi mdi-delete-outline"></i>
				</button>
				<button type="button" class="text-uppercase btn btn-sm btn-outline-dark" data-dismiss="modal">
					<i class="mdi mdi-cog-counterclockwise mr-1"></i><b class='align-text-bottom'>Cancel</b>
				</button>
			</div>
		</div>
	</div>
</form>

<form id="AddressForm" class="modal fade" action="" method="POST">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-group">
					<label for="inputAddress">Address</label>
					<input type="text" class="form-control" id="inputAddress" name="address" value="<?=$address?$address->address:null?>">
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<label for="inputCity">City</label>
						<input type="text" class="form-control" id="inputCity" name="city" require value="<?=$address?$address->city:null?>">
					</div>
					<div class="form-group col-md-5">
						<label for="inputCountry">Country</label>
						<select id="inputCountry" class="form-control" name="country" require>
							<option selected>Chose One</option>
							<?php foreach ($this->hm->country_list() as $key => $value):?>
								<?php if($address?$address->country:null):?>
									<option value="<?=$value->name;?>" selected><?=$value->name;?></option>
								<?php else:?>
									<option value="<?=$value->name;?>"><?=$value->name;?></option>
								<?php endif?>
							<?php endforeach?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="inputZip">Zip</label>
						<input type="text" class="form-control" id="inputZip" name="zip" value="<?=$address?$address->zip:null?>">
					</div>
				</div>
			</div>
			<div class="modal-footer p-1">
				<button type="submit" class="text-uppercase btn btn-sm btn-info mr-auto">
					<b class='align-text-bottom mr-1'>Submit</b>
				</button>
				<button type="button" class="text-uppercase btn btn-sm btn-secondary" data-dismiss="modal">
					<b class='align-text-bottom'>Cancel</b>
				</button>
			</div>
		</div>
	</div>
</form>
<script>
function address($id){
	$modal=$("#AddressForm");
	if($id){
		$modal.attr('action','<?=base_url('account/address/')?>'+$id);
	}else{
		$modal.attr('action','<?=base_url('account/address')?>');
	}
	$modal.modal('show');
}
</script>