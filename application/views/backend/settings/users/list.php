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
						<th class="pb-2 clean" width="55">Photo</th>
						<th class="pb-2">Name</th>
						<th class="pb-2">Mobile</th>
						<th class="pb-2">Email</th>
						<th class="pb-2" width="20">Role</th>
						<!-- <th class="p-1 clean"><a href="<?=base_url('server/products/new')?>" class="btn btn-primary btn-sm btn-block">Add New</a></th> -->
					</tr>
				</thead>
				<tbody>
				<?php foreach ($this->hm->users() as $key => $data):?>
				<tr class="<?=$data->status==0?'table-danger':''?>">
					<td class="text-center"><img src="<?=$data->photo?>" alt="<?=$data->name?>" height="50"></td>
					<td><?=$data->name?></td>
					<td><?=$data->mobile?></td>
					<td><?=$data->email?></td>
					<td><?=role($data->role)?></td>
					<!-- <td class="tools text-center" width="100">
						<div class="btn-group">
							<button type="button" onClick="status(<?=$data->id?>)" class="btn btn-info btn-sm">
								<i class="mdi mdi-eye-outline"></i>
							</button>
							<a href="<?=base_url('server/products/edit/'.$data->id)?>" class="btn btn-warning btn-sm">
								<i class="mdi mdi-playlist-edit"></i>
							</a>
						</div>
					</td> -->
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
	function status(id){ $.ajax({url:'<?=base_url('server/settings/slider/update/')?>'+id, method:"POST"}); location.reload();}
</script>
