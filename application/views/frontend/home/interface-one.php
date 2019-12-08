<section class='area-home'>
    <div class="home-slider">
        <?php foreach ($this->hm->slider() as $key => $item): if($item->status===0) continue;?>
        <div class="item">
            <img src="<?=$item->thumb?>" alt="" class="fluid" style="width:100vw">
            <div class="content">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 text-light">
                            <h6 class="subtitle"><?=$item->subtitle?></h6>
                            <h3 class="title"><?=$item->title?></h3>
                            <a href="<?=$item->link;?>" class="btn btn-warning px-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>
<section class="area-banner">
    <div class="container">
        <div class="row py-4 mb-4">
            <?php foreach ($this->hm->banner() as $key => $item):?>
            <div class="col-md-4 mt-4">
                <div class="card card-banner text-center">
                    <img class="card-img-top" src="<?=$item->thumb?>" alt="<?=$item->title?>">
                    <div class="card-img-overlay">
                        <h4 class="card-title"><?=$item->title?></h4>
                        <div class="btn-card">
                            <a href="<?=$item->link?>" class="btn btn-block btn-sm btn-warning"><?=$item->link_text?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<section class="area-feature">
    <div class="container">
        <div class="row py-4">
            <article class="col-12">
                <h3 class="pb-3 text-center text-uppercase">Feature Products</h3>
                <div class="feature-slider">
                    <?php foreach ($this->hm->feature() as $key => $item):?>
                    <div class="item p-1">
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
                    </div>
                    <?php endforeach;?>
                </div>
            </article>
        </div>
    </div>
</section>
<section class="area-new">
    <div class="container">
        <div class="row py-4">
            <article class="col-12">
                <h3 class="pb-3 text-center text-uppercase">New Collection</h3>
                <div class="feature-slider">
                <?php foreach ($this->hm->recent() as $key => $item):?>
                    <div class="item p-1">
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
                    </div>
                <?php endforeach;?>
                </div>
            </article>
        </div>
    </div>
</section>
<section class="area-step">  
    <div class="container">
        <div class="row text-center text-secondary">
            <div class="col-md-6 col-lg-3 mb-2">
                <div class="card">
                    <i class="text-warning mdi mdi-truck-fast" style="font-size:50px"></i>
                    <h5 class="text-uppercase">free shipping</h5>
                    <p class='dsc'>Suffered Alteration in Some Form</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-2">
                <div class="card">
                    <i class="text-warning mdi mdi-truck-check" style="font-size:50px"></i>
                    <h5 class="text-uppercase">cach on delivery</h5>
                    <p class='dsc'>The Internet Tend To Repeat</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-2">
                <div class="card">
                    <i class="text-warning mdi mdi-coin-outline" style="font-size:50px"></i>
                    <h5 class="text-uppercase">45 days return</h5>
                    <p class='dsc'>Making it Look Like Readable</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-2">
                <div class="card">
                    <i class="text-warning mdi mdi-clock-check-outline" style="font-size:50px"></i>
                    <h5 class="text-uppercase">opening all week</h5>
                    <p class='dsc'>8AM - 10PM</p>
                </div>
            </div>
        </div>
    </div>
</section>