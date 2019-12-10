<div class="container-fluid">
	<div class="row p-2">
		<div class="col-12">
		<div class="card">
        <div class="card-header">
            <h4 class="card-title text-uppercase m-0"><?=$title?></h4>
        </div>
		<div class="card-body">
			<table id="tableSlider" class="table table-data table-bordered table-sm">
				<thead>
					<tr>
						<th class="pb-2 clean" width="55">Picture</th>
						<th class="pb-2" width="100" >Code</th>
						<th class="pb-2">Product Name</th>
						<th class="pb-2">Product Category</th>
						<th class="pb-2">Feature Product</th>
						<th class="p-1 clean"><a href="<?=base_url('server/products/new')?>" class="btn btn-primary btn-sm btn-block">Add New</a></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($product_list as $key => $data):?>
				<tr class="<?=$data->product_status==0?'table-danger':''?>">
					<td class="text-center"><img src="<?=$data->product_thumb?>" alt="<?=$data->product_name?>" height="50"></td>
					<td><?=$data->product_code?></td>
					<td><?=$data->product_name?></td>
					<td><?=$data->category_name?></td>
					<td> <?=empty($this->pm->features($data->product_id)->product_id)?></td>
					<td class="tools text-center" width="100">
						<div class="btn-group">
							<button type="button" onClick="status(<?=$data->product_id?>)" class="btn btn-info btn-sm">
								<i class="mdi mdi-eye-outline"></i>
							</button>
							<a href="<?=base_url('server/products/edit/'.$data->product_id)?>" class="btn btn-warning btn-sm">
								<i class="mdi mdi-playlist-edit"></i>
							</a>
						</div>
					</td>
				</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
		</div>
		</div>
	</div>
</div>
<script>
	function status(id){ $.ajax({url:'<?=base_url('server/products/status/')?>'+id,method:"POST"}); location.reload();}
</script>
