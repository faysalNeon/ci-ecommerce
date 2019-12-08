<section class="product-details">
    <div class="container">
        <div class="row py-4">
            <div class="col-6">
                <img class="img-fluid img-thumbnail border border-warning rounded-sm shadow" src="<?=$sd->product_thumb?>" alt="<?=$sd->product_name?>">
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <h6 class="m-3"><b>Code: </b><span class="badge badge-info"><?=$sd->product_code?></span></h6>
                        <h3 class="my-4"> <b>Name: </b> <?=$sd->product_name?></h3>
                        <p class="m-3"> <b>Category: </b> <?=$sd->category_name?></p>
                        <p class="m-3"><?=$sd->product_details?></p>
                        <div class="p-5">
                            <b>Offer Price:</b> <?=$sd->product_offer?> 
                            <br>
                            <b class="text-danger">Price:
                                <s><?=$sd->product_price?></s>
                            </b> 
                        </div>
                    </div>
                    <div class="col-12">
                        <form class="row" action="<?=base_url('cart/add_load')?>" method="POST">
                            <div class="col-5">
                                <input type="hidden" name="id" value="<?=$sd->product_id?>">
                                <input type="number" name="qty" class="form-control" value="1" min="1" max="500">
                            </div>
                            <div class="col-7">
                                <button type="submit" class="btn btn-block btn-warning"> Add To Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="area-overview">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                    </li>
                </ul>
                <div class="tab-content pt-4">
                    <div class="tab-pane container active" id="overview"><?=$sd->product_overview?> </div>
                </div>
            </div>
        </div>
    </div>
</section>