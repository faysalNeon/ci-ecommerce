<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title?$title:setting('store_name')?></title>
	<link href="//fonts.gstatic.com" rel="dns-prefetch">
	<link href="<?=base_url();?>assets/vendors/mdi/css/materialdesignicons.min.css" rel="stylesheet" >
	<script src="<?=base_url();?>assets/vendors/jquery-3.4.1.min.js"></script>
	<link href="<?=base_url();?>assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
	<script src="<?=base_url();?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
	<link href="<?=base_url();?>assets/vendors/datatables/datatables.min.css" rel="stylesheet"/>
	<link href="<?=base_url();?>assets/styles/server.css" rel="stylesheet"/>
</head>
<body>
<div id="appRoot">
<aside class="app-sidebar">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="<?=base_url()?>"> Project Server </a>
	</nav>
	<ul class="sidebar-menu">
		<li>
			<a href="<?=base_url('server')?>">
				<i class="mdi mdi-desktop-mac-dashboard"></i>
				<span class='mtxt'> Dashboard </span>
			</a>
		</li>
		<li class="header"> Catalog </li>
		<li class="treeview">
			<a href="javascript:void(0)"><i class="mdi mdi-ballot"></i><span class="mtxt"> Product </span></a>
			<ul class="treeview-menu" style="display: none;">
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-package-down"></i> <span class='mtxt'> New Product </span></a></li>
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-clipboard-text-outline"></i> <span class='mtxt'> List Product </span></a></li>
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-codepen"></i><span class='mtxt'> Feature Product </span></a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="javascript:void(0)">
				<i class="mdi mdi-folder-open-outline"></i>
				<span class='mtxt'> Category </span>
			</a>
			<ul class="treeview-menu" style="display: none;">
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-folder-text-outline"></i> <span class='mtxt'> New Category </span> </a></li>
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-folder-plus-outline"></i> <span class='mtxt'> List Category </span> </a></li>
			</ul>
		</li>
		<li class="header"> Customer & Order </li>
		<li><a href="<?=base_url('server')?>"><i class="mdi mdi-account-group"></i><span class='mtxt'> List Customer </span> </a></li>
		<li><a href="<?=base_url('server')?>"><i class="mdi mdi-clipboard-list"></i><span class='mtxt'> Manage Order </span> </a></li>
		<li class="treeview">
			<a href="javascript:void(0)">
				<i class="mdi mdi-gift-outline"></i><span class="mtxt"> Cupon </span>
			</a>
			<ul class="treeview-menu" style="display: none;">
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-package-down"></i><span class='mtxt'> New Cupon </span> </a></li>
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-package-variant-closed"></i><span class='mtxt'> List Cupon </span> </a></li>
			</ul>
		</li>
		<li><a href="<?=base_url('server')?>"><i class="mdi mdi-cash-usd-outline"></i><span class='mtxt'> Manage Payment </span></a></li>
		<li class="header"> Settings </li>
		<li class="treeview">
			<a href="javascript:void(0)">
				<i class="mdi mdi-file-outline"></i><span class="mtxt"> Appearance </span>
			</a>
			<ul class="treeview-menu" style="display: none;">
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-monitor-multiple"></i><span class='mtxt'> Slider List </span></a></li>
				<li><a href="<?=base_url('server')?>"><i class="mdi mdi-file-replace"></i><span class='mtxt'> List Page </span></a></li>
			</ul>
		</li>
		<li><a href="<?=base_url('server')?>"><i class="mdi mdi-account-details"></i> <span class='mtxt'> Users </span></a></li>
		<li><a href="<?=base_url('server')?>"><i class="mdi mdi-settings"></i> <span class='mtxt'> Options </span></a></li>
	</ul>
</aside>
<header class="app-header">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="brand">
			<a class="navbar-brand text-uppercase" href="<?=base_url('server')?>"> Project Server </a>
		</div>
		<button type="button" onClick="toggleSidebar()" class="btn btn-outline-info">
			<i class="mdi mdi-menu"></i>
		</button>
		<div class="menu ml-auto">
			<div class="dropdown">
				<button type="button" class="btn btn-sm btn-outline-info mr-1" data-toggle="dropdown">
					<i class="mdi mdi-account-circle-outline"></i>
				</button>
				<div class="dropdown-menu">
					<div class="card shadow-2">
						<div class="card-body text-center pt-5">
							<img src="https://placeholder.pics/svg/100/237BD5/FFFFFF-237BD5" class="mb-2 rounded-circle" alt="User Profile" width="100" height="100"> 
							<h4 class="name">Faysal Neon</h4>
							<p class="email">faysal.neon@gmail.com</p>
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
<main class="app-body">


