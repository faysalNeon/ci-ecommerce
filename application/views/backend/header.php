<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base id="server_url" href="<?=base_url('server')?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title?$title:setting('store_name')?></title>
	<link href="//fonts.gstatic.com" rel="dns-prefetch">
	<link rel="icon" type="image/x-icon" href="<?=base_url('assets/images/favicon.ico')?>">
	<link href="<?=base_url();?>assets/vendors/mdi/css/materialdesignicons.min.css" rel="stylesheet" >
	<script src="<?=base_url();?>assets/vendors/jquery-3.4.1.min.js"></script>
	<script src="<?=base_url();?>assets/vendors/Croppie/croppie.min.js"></script>
	<script src="<?=base_url();?>assets/vendors/wysihtml5/wysihtml5.min.js"></script>
	<link href="<?=base_url();?>assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
	<script src="<?=base_url();?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
	<link href="<?=base_url();?>assets/vendors/wysihtml5/wysihtml5.min.css" rel="stylesheet"/>
	<link href="<?=base_url();?>assets/vendors/datatables/datatables.css" rel="stylesheet"/>
	<link href="<?=base_url();?>assets/vendors/Croppie/croppie.css" rel="stylesheet"/>
	<link href="<?=base_url();?>assets/styles/server.css" rel="stylesheet"/>
</head>
<body>
<div id="appRoot">
<aside class="app-sidebar <?=menu_toggle('active')?>">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="<?=base_url()?>"> <?=setting('store_name')?>  </a>
	</nav>
	<ul class="sidebar-menu">
		<li>
			<a href="<?=base_url('server')?>">
				<i class="mdi mdi-desktop-mac-dashboard"></i>
				<span class='mtxt'> Dashboard </span>
			</a>
		</li>
		<li class="header"> Catalog </li>
		<li><a href="<?=base_url('server/categories')?>"><i class="mdi mdi-folder-plus-outline"></i> <span class='mtxt'> Categories </span> </a></li>
		<li><a href="<?=base_url('server/products')?>"><i class="mdi mdi-clipboard-text-outline"></i> <span class='mtxt'> Products </span></a></li>
		<li class="header"> Customer & Order </li>
		<li><a href="<?=base_url('server/customers')?>"><i class="mdi mdi-account-group"></i><span class='mtxt'> Customers </span> </a></li>
		<li><a href="<?=base_url('server/orders')?>"><i class="mdi mdi-clipboard-list"></i><span class='mtxt'> Manage Order </span> </a></li>
		<li class="header"> Settings </li>
		<li class="treeview">
			<a href="javascript:void(0)">
				<i class="mdi mdi-file-outline"></i><span class="mtxt"> Appearance </span>
			</a>
			<ul class="treeview-menu" style="display: none;">
				<li><a href="<?=base_url('server/settings/sliders')?>"><i class="mdi mdi-monitor-multiple"></i><span class='mtxt'> Sliders </span></a></li>
				<li><a href="<?=base_url('server/settings/banners')?>"><i class="mdi mdi-monitor-multiple"></i><span class='mtxt'> Banners </span></a></li>
			</ul>
		</li>
		<li><a href="<?=base_url('profile')?>"><i class="mdi mdi-account-details"></i> <span class='mtxt'> Users </span></a></li>
		<li><a href="<?=base_url('server/settings')?>"><i class="mdi mdi-settings"></i> <span class='mtxt'> Options </span></a></li>
	</ul>
</aside>
<header class="app-header">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="brand">
			<a class="navbar-brand text-uppercase" href="<?=base_url('server')?>"><?=setting('store_name')?> </a>
		</div>
		<button type="button" onClick="toggleSidebar()" class="btn btn-outline-info">
			<i class="mdi mdi-menu"></i>
		</button>
		<a href="<?=base_url()?>" target="_blank" class="ml-auto  btn-sm mr-1 btn btn-outline-info">
			<i class="mdi mdi-home"></i>
		</a>
		<div class="menu ">
			<div class="dropdown">
				<button type="button" class="btn btn-sm btn-outline-info mx-1" data-toggle="dropdown">
					<i class="mdi mdi-account-circle-outline"></i>
				</button>
				<div class="dropdown-menu">
					<div class="card shadow-2">
						<div class="card-body text-center pt-5">
							<img src="<?=user_data('photo')?>" class="mb-2 rounded-circle" alt="User Profile" width="100" height="100"> 
							<h4 class="name"><?=user_data('name')?></h4>
							<p class="mobile"><?=user_data('mobile')?></p>
							<p class="email"><?=user_data('email')?></p>
							<a href="<?=base_url('profile')?>" class="btn btn-profile btn-outline-secondary"> Manage Your Account </a>
						</div>
					</div>
				</div>
			</div>
			<button type="button" class="btn btn-sm btn-outline-danger mr-1" data-toggle="modal" data-target="#exitConfirm">
				<i class="mdi mdi-location-exit"></i>
			</button>
		</div>
	</nav>
</header>
<form class="modal fade" id="exitConfirm">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center pt-5">
       	<h6 class="text-danger text-uppercase">Before Shutdown</h6>	
       	<h4 class="text-info text-uppercase">Just One More Step</h4>	
      </div>
      <div class="modal-footer p-1">
		<a href="<?=base_url('logout');?>" class="text-uppercase btn btn-sm btn-outline-danger mr-auto">
			<b class='align-text-bottom mr-1'>Leave</b><i class="mdi mdi-logout-variant"></i>
		</a>
		<button type="button" class="text-uppercase btn btn-sm btn-outline-info" data-dismiss="modal">
			<i class="mdi mdi-cog-counterclockwise mr-1"></i><b class='align-text-bottom'>Cancel</b>
		</button>
      </div>
    </div>
  </div>
</form>
<?php $alert=$this->session->flashdata('alert'); if(isset($alert)):?>
  <div style="top:80px; right:20px; position:fixed; z-index:1000000; min-width:280px">
    <div class="toast ml-auto bg-<?=$alert['status']?>" role="alert" data-delay="1000" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto text-primary"><?=$alert['title']?></strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body"><?=$alert['details']?></div>
    </div>
  </div>
  <script>$(function(){$('.toast').toast('show')})</script>
<?php $this->session->unset_userdata('alert'); endif;?>
<script>
function toggleSidebar(){
	if($('aside.app-sidebar').hasClass('active')){
	  $('aside.app-sidebar').removeClass('active');
	  $('main.app-body').removeClass('active');
	  $('footer.app-footer').removeClass('active');
	}else{
		$('aside.app-sidebar').addClass('active');
		$('main.app-body').addClass('active');
		$('footer.app-footer').addClass('active');
	}
	$.ajax({url:'<?=base_url('server/settings/menu_toggle')?>', method:'POST'})
}
</script>
<main class="app-body <?=menu_toggle('active')?>">


