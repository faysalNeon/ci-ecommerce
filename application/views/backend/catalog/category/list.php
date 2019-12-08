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
						<th class="pb-2">Name</th>
						<th class="pb-2">Parent</th>
						<th class="pb-2" width="50">Top</th>
						<th class="pb-2" width="50">order</th>
						<th class="clean p-1"><a href="<?=base_url('server/categories/new')?>" class="btn btn-primary btn-sm btn-block">Add New</a></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($cat_list as $key => $data):?>
				<tr class="<?=$data->status==0?'table-danger':''?>">
					<td><?=$data->name?></td>
					<td><?=cat_parent($data->parent)?></td>
					<td class="text-center"><?=$data->top?'yes':'no'?></td>
					<td class="text-center"><?=$data->order?></td>
					<td class="tools text-center" width="100">
						<div class="btn-group">
							<button type="button" onClick="status(<?=$data->id?>)" class="btn btn-info btn-sm">
								<i class="mdi <?=$data->status==0?'mdi-eye-outline':'mdi-eye-off-outline'?>"></i>
							</button>
							<a href="<?=base_url('server/categories/edit/'.$data->id)?>" class="btn btn-warning btn-sm">
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
	function status(id){ $.ajax({url:'<?=base_url('server/categories/status/')?>'+id, method:"POST"}); location.reload();}
</script>
