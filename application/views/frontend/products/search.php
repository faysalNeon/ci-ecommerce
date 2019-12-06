<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" id="instantSearch" class="form-control" placeholder="" value="<?=$searchData?>">
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-12 py-4">
            <section id="searchData" class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class='card-body'>
                            <h6 class='text-danger'> No Data Found against this keyword. please search again </h6>
                        </div>
                    </div>
                </div>
             </section>
        </div>
    </div>
</div>
<script>
function searchFactory(){
    var display=$('#searchData');
    var inputData=$('#instantSearch').val();
    var dataUrl='<?=base_url()?>/products/search';
    if(inputData.length>0){
        $.ajax({
            url: dataUrl,
            cache: false,    
            method: "POST",
            dataType: 'json',
            data: { search : inputData},
            success: function(result) {
                if(result.length>0){
                    display.html('');
                    result.forEach(el => {
                    $('#searchData').append(`<div class="col-md-6">
                        <div class="card my-2">
                            <div class='card-body'>
                                <img class="float-left mr-2" src="${el.product_thumb}" alt="${el.product_name}" width="120">
                                <div>
                                    <h6><b>Category: </b>${el.cat_name}</h6>
                                    <h4><b>Product: </b>${el.product_name}</h4>
                                    <b class="badge badge-info">${el.product_code}</b> | 
                                    <b class="badge badge-success">${el.product_price}</b> | 
                                    <s class="badge badge-danger">${el.product_old_price}</s>
                                    <p>${el.product_details}</p>
                                </div>
                            </div>
                            <div class="card-footer p-1">
                                <a href="<?=base_url('product')?>/${el.product_code}" class="btn btn-sm btn-info btn-block"> View Details </a>
                            </div>
                        </div>
                    </div>`);
                    });
                }else{
                    display.html(`<div class="col-md-12">
                        <div class="card">
                            <div class='card-body'>
                                <h6 class='text-danger'> No Data Found against this keyword. please search again </h6>
                            </div>
                        </div>
                    </div>`);
                }
            },
            error(e){
                console.log(e);
            }
        });
    }else{
        display.html(`<div class="col-md-12">
            <div class="card">
                <div class='card-body'>
                    <h6 class='text-danger'> No Data Found against this keyword. please search again </h6>
                </div>
            </div>
        </div>`);
    }
} 
$(function(){
    searchFactory();
    $('#instantSearch').on('keyup',function(){
        searchFactory();
    })
})
</script>