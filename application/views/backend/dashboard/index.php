<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 p-1">
            <div class="card">
                <div class="card-body text-center">
                    <h2> <span class="badge badge-info"><?=$this->hm->total_product(false);?></span></h2>
                    <h5 class="card-title text-uppercase">Total Active Product</h5>
                </div>
                <div class="card-footer p-1">
                    <a href="<?=base_url('server/products')?>" class="btn btn-block btn-info">Manage Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-1">
            <div class="card">
                <div class="card-body text-center">
                    <h2> <span class="badge badge-info"><?=$this->hm->total_order(false);?></span></h2>
                    <h5 class="card-title text-uppercase">Total Complete Orders</h5>
                </div>
                <div class="card-footer p-1">
                    <a href="<?=base_url('server/orders')?>" class="btn btn-block btn-info">Manage Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-1">
            <div class="card">
                <div class="card-body text-center">
                    <h2> <span class="badge badge-info"><?=$this->hm->total_customer(false);?></span></h2>
                    <h5 class="card-title text-uppercase">Total Active Customer</h5>
                </div>
                <div class="card-footer p-1">
                    <a href="<?=base_url('server/customers')?>" class="btn btn-block btn-info">Manage Customers</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 p-1">
            <div class="card">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
</section>