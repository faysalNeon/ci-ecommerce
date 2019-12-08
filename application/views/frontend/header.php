<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <base id="base_url" href="<?=base_url()?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ? $title : setting('store_name') ?></title>
  <link href="//fonts.gstatic.com" rel="dns-prefetch">
  <link rel="icon" type="image/x-icon" href="<?=base_url('assets/images/favicon.ico')?>">
	<link href="<?=base_url();?>assets/vendors/mdi/css/materialdesignicons.min.css" rel="stylesheet">
	<script src="<?=base_url();?>assets/vendors/jquery-3.4.1.min.js"></script>
	<link href="<?=base_url();?>assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
  <script src="<?=base_url();?>assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
	<link href="<?=base_url();?>assets/vendors/slick/slick.css" rel="stylesheet"/>
	<link href="<?=base_url();?>assets/vendors/slick/slick-theme.css" rel="stylesheet"/>
	<link href="<?=base_url();?>assets/styles/common.css" rel="stylesheet"/>
</head>
<body>
<header class="app-header sticky-top shadow-sm">
<nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#appMenu">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand text-uppercase text-info text-bold" href="<?=base_url();?>"><?=setting('store_name')?></a>
  <div class="mr-auto d-none d-lg-block">
    <ul class="navbar-nav text-uppercase">
      <?php foreach (get_category() as $pid => $parent): if($parent->top==0) continue; ?>
        <?php if(check_category($parent->id)==0):?>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('category-'.$parent->id);?>"><?=$parent->name?></a>
        </li>
        <?php else:?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown"><?=$parent->name?></a>
          <div class="dropdown-menu">
            <?php foreach (get_category($parent->id) as $cid => $children):?>
              <a class="dropdown-item" href="<?=base_url('category-'.$children->id);?>"><?=$children->name;?></a>
            <?php endforeach;?>
              <a class="dropdown-item" href="<?=base_url('category-'.$parent->id);?>">View All</a>
            </div>
          </li>
        <?php endif;?>
      <?php endforeach;?>
    </ul>
  </div>
  <div class="shortcut">
    <a class="btn btn-secondary" data-toggle="collapse" href="#appSearch" aria-controls="appSearch">
        <i class="mdi mdi-file-search"></i>
    </a>
    <div class="dropdown d-inline">
        <button type="button" class="btn btn-info" data-toggle="dropdown">
          <?php if (access()):?>
            <i class="mdi mdi-account"></i>
          <?php else:?>
            <i class="mdi mdi-login-variant"></i>
          <?php endif;?>
        </button>
        <div class="account-menu dropdown-menu">
          <div class="card shadow-2">
              <div class="card-body text-center">
              <?php if (access()):?>
                <img class="img-thumbnail mt-5" src="<?=user_data('photo')?user_data('photo'):base_url('assets/images/user.png')?>" alt="User" width="100" height="100">
                <h3 class="name mt-3"><?=user_data('name')?></h3>
                <h6 class="email mt-3"><?=user_data('mobile')?></h6>
                <h6 class="email my-3"><?=user_data('email')?></h6>
                <div class="d-block my-2">
                    <a href="<?=base_url('account')?>" class="btn btn-sm rounded-circle btn-info">
                        <i class="mdi mdi-home"></i>
                    </a>
                    <a href="<?=base_url('orders')?>" class="btn btn-sm rounded-circle btn-info">
                        <i class="mdi mdi-cart-arrow-up"></i>
                    </a>
                    <a href="<?=base_url('payments')?>" class="btn btn-sm rounded-circle btn-info">
                        <i class="mdi mdi-cogs"></i>
                    </a>
                    <a href="<?=base_url('settings')?>" class="btn btn-sm rounded-circle btn-info">
                        <i class="mdi mdi-cogs"></i>
                    </a>
                </div>
                <a href="<?=base_url('logout');?>" class="btn btn-block btn-danger"> Logout </a>
                <?php else:?>
                  <a href="<?=base_url('login');?>" class="btn btn-block btn-outline-secondary"> Login </a>
                  <a href="<?=base_url('register');?>" class="btn btn-block btn-outline-secondary"> Register </a>
                <?php endif;?>
              </div>
          </div>
        </div>
    </div>
    <div class="dropdown d-inline">
        <button type="button" class="btn btn-warning" data-toggle="dropdown">
            <i class="mdi mdi-cart"></i>
            <span class="badge badge-pill badge-dark" id="cartCount"><?=count($this->cart->contents())?></span>
        </button>
        <div class="cart-menu dropdown-menu">
          <div class="card shadow-2">
            <ul id="listCart" class="list-group list-group-flush" style="max-height:60vh; overflow-y:auto">
              <li class="list-group-item mt-2 py-4 px-2"><h6 class="text-center">Your shopping cart is empty!</h6></li>
            </ul>
            <div class="cart-footer p-1 d-block">
                <a href="<?=base_url('cart')?>" class="btn btn-sm btn-info">view cart</a>
                <a href="<?=base_url('checkout')?>" class="btn btn-sm btn-warning float-right">checkout</a>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>
<form class="p-1 collapse" id="appSearch" action="<?=base_url('products/search')?>" method="POST">
    <div class="input-group">
        <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button type="submit" class="input-group-text"><i class="mdi mdi-sync"></i></button>
        </div>
    </div>
</form>
<aside class="collapse navbar-collapse collapsed navbar-toggler text-uppercase" id="appMenu">
  <?php foreach (get_category() as $pid => $parent): if($parent->top==0) continue; ?>
  <?php if(check_category($parent->id)==0):?>
  <a href="<?=base_url('category-'.$parent->id);?>" class="nav-link"><?=$parent->name?></a>
  <?php else:?>
  <a href="javascript:void(0);" role="button" class="nav-link" data-toggle="collapse" data-target="#child<?=$pid?>"><?=$parent->name?></a> 
  <div id="child<?=$pid?>" class="collapse" data-parent="#appMenu">
    <?php foreach (get_category($parent->id) as $cid => $children):?>
      <a class="dropdown-item" href="<?=base_url('category-'.$children->id);?>"><?=$children->name;?></a>
    <?php endforeach;?>
      <a  href="<?=base_url('category-'.$parent->id);?>" class="dropdown-item">View All</a>
  </div>
  <?php endif;?>
  <?php endforeach;?>
</aside>
</header>
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
  <script>$(function(){ $('.toast').toast('show') })</script>
<?php $this->session->unset_userdata('alert'); endif;?>
<main class="app-body">