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
						<th class="pb-2">Title</th>
						<th class="pb-2" width="200">link</th>
						<th class="p-1 clean"><a href="<?=base_url('server/products/new')?>" class="btn btn-primary btn-sm btn-block">Add New</a></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($this->hm->banner(true) as $key => $data):?>
				<tr class="<?=$data->status==0?'table-danger':''?>">
					<td class="text-center"><img src="<?=$data->thumb?>" alt="<?=$data->title?>" height="50"></td>
					<td><?=$data->title?></td>
					<td><a href="<?=$data->link_text?>" terget="_blank" class="btn btn-llink"><?=$data->link_text?></a></td>
					<td class="tools text-center" width="100">
						<div class="btn-group">
							<button type="button" onClick="status(<?=$data->id?>)" class="btn btn-info btn-sm">
								<i class="mdi mdi-eye-outline"></i>
							</button>
							<a href="<?=base_url('server/products/edit/'.$data->id)?>" class="btn btn-warning btn-sm">
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
	function status(id){ $.ajax({url:'<?=base_url('server/settings/banner/update/')?>'+id, method:"POST"}); location.reload();}
</script>
