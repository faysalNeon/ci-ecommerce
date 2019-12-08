<div class="container-fluid">
	<div class="row">
        <div class="col-12 text-center py-4">
        <?php foreach ($productList as $key => $item):?>
            <div class="card card-product">
                <img class="card-img-top" src="<?=$item->thumb?>" alt="<?=$item->name?>">
                <div class="card-body">
                    <b class="product-price"><?=$item->offer?> <del class="text-danger"><sup><?=$item->price?></sup></del></b>
                    <h5 class="card-title"><?=$item->name?></h5>
                </div>
                <div class="card-img-overlay">
                    <div class="card-action">
                        <a class="btn btn-details btn-sm btn-block btn-secondary text-uppercase" href="<?=base_url('product/'.$item->code)?>">View Details</a>
                        <button type="button" onClick="addCart(<?=$item->id?>)" class="mt-3 btn btn-cart btn-sm btn-block btn-warning text-uppercase">Add To Cart</button>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</div>
