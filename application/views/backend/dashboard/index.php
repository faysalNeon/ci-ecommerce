<section>
<script src="<?=base_url()?>assets/vendors/chart/canvas.min.js"></script>
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
                <div class="chart">
                    <script>
                        window.addEventListener('load',function MonthlyAdmission(){
                        var MAD = new CanvasJS.Chart("MonthlyAdmission",{
                            animationEnabled: true,
                            title:{ text: 'Monthly Sells Summary');?>" },
                            axisX: { valueFormatString: "MMM" },
                            axisY: { title: "total", includeZero: false },
                            legend:{ cursor: "pointer", fontSize: 16, itemclick: toggleDataSeries },
                            toolTip:{shared: true},
                            data: [{
                            name: "totla",
                            type: "spline",
                            yValueFormatString:"#",
                            showInLegend: true,
                            dataPoints:[
                                { x: new Date(<?=date('Y', strtotime('-1 year'));?>,12,1), y:12 },
                                { x: new Date(<?=date('Y');?>,01,1), y: 01  },
                                { x: new Date(<?=date('Y');?>,02,1), y: 02 },
                                { x: new Date(<?=date('Y');?>,03,1), y: 03 },
                                { x: new Date(<?=date('Y');?>,04,1), y: 04 },
                                { x: new Date(<?=date('Y');?>,05,1), y: 05 },
                                { x: new Date(<?=date('Y');?>,06,1), y: 06 },
                                { x: new Date(<?=date('Y');?>,07,1), y: 07 },
                                { x: new Date(<?=date('Y');?>,08,1), y: 08 },
                                { x: new Date(<?=date('Y');?>,09,1), y: 09 },
                                { x: new Date(<?=date('Y');?>,10,1), y: 10 },
                                { x: new Date(<?=date('Y');?>,11,1), y: 11 },
                            ]
                        }); MAD.render();
                    });
                    function toggleDataSeries(e){
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                        }else{
                        e.dataSeries.visible = true;
                        } MAD.render();
                    }
                    </script>
                    <div id="MonthlyAdmission" style="min-height: 350px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>