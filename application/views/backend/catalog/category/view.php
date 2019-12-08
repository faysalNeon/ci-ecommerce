<div class="container-fluid">
    <div class="row pt-2">
        <div class="col-12">
            <nav class="nav navbar bg-dark">
                <li class="nav-item">
                    <a class="btn btn-info btn-sm" href="<?=base_url('server/categories')?>">
                        <i class="mdi mdi-clipboard-list-outline"></i> Back
                    </a>
                </li>
                <?php if($data):?>
                <li class="nav-item">
                    <button type="button" onClick='confirm(<?=$item->id?>)' class="btn btn-danger btn-sm">
                        <i class="mdi mdi-delete-outline"></i> Delete
                    </button>
                </li>
                <?php endif?>
            </nav>
        </div>
    </div>
    <form class="row pt-5" action="<?=$target_url?>" method='Post'>
        <?=$data?form_hidden('id', $item->id):null?>
        <div class="col-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input required id="name" class="form-control" type="text" name="name" value="<?=$data?$item->name:null?>">
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea id="details" class="form-control" name="details" rows="3"><?=$data?$item->details:null?></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="parent">Parent</label>
                    <select required id="parent" class="custom-select" name="parent">
                        <option value="0">No Parent</option>
                        <?php foreach ($list as $key => $sv): if($data):?>
                        <?php if($sv->id==$item->id) continue;?>
                        <option value="<?=$sv->id?>" <?=$sv->id==$item->parent?'selected':null?>><?=$sv->name?></option>
                        <?php else:?>
                        <option value="<?=$sv->id?>"><?=$sv->name?></option>
                        <?php endif; endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="order">order</label>
                    <input id="order" class="form-control" type="number" name="order" value="<?=$data?$item->order:0?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <select required id="status" class="custom-select" name="status">
                        <option value="0" <?=$data?$item->status==0?'selected':null:'selected'?> >Disable</option>               
                        <option value="1" <?=$data?$item->status==1?'selected':null:null?> >Enable</option>               
                    </select>
                </div>
            </div>
            <div class="form-row py-4">
                <div class="col-sm-8">
                    <div class="ml-4 py-2 custom-checkbox  mr-sm-2">
                        <input id="top" <?=$data?$item->top==1?'checked':null:null?>  class="custom-control-input" type="checkbox" name="top" value="<?=$data?$item->order:0?>">
                        <label for="top" class="custom-control-label">if check, This will show in top of the Main Menu</label>
                    </div>
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
		$('#deleteBox').find('#confDelete').attr('href', '<?=base_url('server/categories/remove/');?>'+$id); $('#deleteBox').modal('show');
    }
</script>
<?php endif?>