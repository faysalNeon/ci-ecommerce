<div class="container-fluid">
    <div class="row pt-2">
        <div class="col-12">
            <nav class="nav navbar bg-dark">
                <li class="nav-item">
                    <a class="btn btn-info btn-sm" href="<?=base_url('server/products')?>">
                        <i class="mdi mdi-clipboard-list-outline"></i> Back
                    </a>
                </li>
                <?php if($data):?>
                <li class="nav-item">
                    <button type="button" onClick='confirm(<?=$item->product_id?>)' class="btn btn-danger btn-sm">
                        <i class="mdi mdi-delete-outline"></i> Delete
                    </button>
                </li>
                <?php endif?>
            </nav>
        </div>
    </div>
    <form class="row pt-5" action="<?=$target_url?>" method='Post'>
        <?=$data?form_hidden('id', $item->product_id):null?>
        <div class="col-auto " style="width:310px">
            <div class="card mx-auto">
                <div class="card-body" data-croppie>
                    <img  data-thumb id="thumbManage" class="card-img-top" src="assets/images/product-01.jpg" alt="">
                </div>
                <input type="file" id="productsThumb" style="display: none">
                <input type="hidden" name="" id="">
                <div class="card-footer p-1">
                    <div>
                        <button type="button" data-cancel class="btn btn-sm btn-warning d-none">cancel</button>
                        <button type="button" data-save class="float-right btn btn-sm btn-success d-none">save</button>
                        <button type="button" data-edit class="float-right btn btn-sm btn-success btn-block">edit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-group">
                <label for="name">Name</label>
                <input required id="name" class="form-control" type="text" name="name" value="<?=$data?$item->product_name:null?>">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input required id="name" class="form-control" type="text" name="name" value="<?=$data?$item->product_name:null?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="parent">Category</label>
                    <select required id="parent" class="custom-select" name="parent">
                        <option value="0">No Parent</option>
                        <?php foreach ($list as $key => $sv): if($data):?>
                        <?php if($sv->id==$item->id) continue;?>
                        <option value="<?=$sv->id?>" <?=$sv->id==$item->category_id?'selected':null?>><?=$sv->name?></option>
                        <?php else:?>
                        <option value="<?=$sv->id?>"><?=$sv->name?></option>
                        <?php endif; endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="order">order</label>
                    <input id="order" class="form-control" type="number" name="order" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <select required id="status" class="custom-select" name="status">
                        <option value="0" <?=$data?$item->product_status==0?'selected':null:'selected'?> >Disable</option>               
                        <option value="1" <?=$data?$item->product_status==1?'selected':null:null?> >Enable</option>               
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="details">Details</label>
                <textarea id="details" class="form-control" name="details" rows="3"><?=$data?$item->product_details:null?></textarea>
            </div>
            <div class="form-group">
                <label for="rEditor">overview</label>
                <textarea id="rEditor" class="editor form-control" name="overview" rows="10"><?=$data?$item->product_overview:null?></textarea>
            </div>
            <div class="form-row py-4">
                <div class="col-sm-8">
                            
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-block btn-info">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php if($data):?>
<div id="deleteBox" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content text-center">
			<div class="modal-body">
				<h3 class="text-uppercase">Confirm Delete</h3>
				<p class="text-capitalize">Also you can disable this instead of delete</p>
				<div class="row mt-2 text-uppercase">
					<div class="col-6">
						<a href="" id="confDelete" class="btn btn-danger btn-sm btn-block">Delete</a>
					</div>
					<div class="col-6">
						<button type="button" data-dismiss="modal" class="btn btn-success btn-sm btn-block">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function confirm($id) {
        
            return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
                (c^crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c/4).toString(16)
            );
    

            
            // $('#deleteBox').find('#confDelete').attr('href', '<?=base_url('server/products/remove/');?>'+$id); $('#deleteBox').modal('show');
        }
        console.log(uuidv4());
</script>
<?php endif?>