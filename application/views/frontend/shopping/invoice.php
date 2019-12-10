<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$title?></title>
  <link href="<?=base_url();?>assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .non-printable, .fancybox-outer{ display: none; }
      .printable{ display: block; }
    }
  </style>
</head>
<body class="bg-dark">
  <ul class="nav justify-content-between bg-secondary p-2 non-printable">
    <li class="nav-item">
      <a class="btn btn-success btn-sm" href="<?=base_url()?>">Back To Home</a>
    </li>
    <li class="nav-item">
      <a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="window.print()">Print</a>
    </li>
  </ul>
	<div class="container bg-light mt-5 printable">
    <div class="row text-center p-2">
      <div class="col-12">
        <h4><?=$title?></h4>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <table class="table table-bordered">
          <tr>
            <th>Name</th>
            <td>Customer</td>
          </tr>
          <tr>
            <th>Mobile</th>
            <td>123456789</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>one@customer.com</td>
          </tr>
        </table>
      </div>
      <div class="col-6">
        <table class="table table-bordered">
          <tr>
            <th>Address</th>
            <td>Dhaka</td>
          </tr>
          <tr>
            <th>City</th>
            <td>Dhaka</td>
          </tr>
          <tr>
            <th>Country</th>
            <td>Bangladesh</td>
          </tr>
        </table>
      </div>
    </div>
		<div class="row">
			<div class="col-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-left">Name</th>
							<th width="200">Code</th>
							<th width="200">Quantity</th>
							<th width="100" class="text-right">Unit Price</th>
							<th width="120" class="text-right">Sub Total</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($this->cart->contents() as $key => $item):?>
						<tr>
							<td class="text-left"><?=$item['name']?></td>
							<td><?=$item['product_id']?></td>
							<td><?=$item['qty']?></td>
							<td class="text-right">$<?=$this->cart->format_number($item['price'])?></td>
							<td class="text-right">$<?=$this->cart->format_number($item['subtotal'])?></td>
						</tr>
						<?php endforeach;?>
					</tbody>
					<tfooter>
						<tr>
							<th colspan="2"></th>
							<th colspan="2" class="text-right">Shipping Charge:</th>
							<th class="text-right">$0.00</th>
						</tr>
						<tr>
							<th colspan="2"></th>
							<th colspan="2" class="text-right">Total Price:</th>
							<th class="text-right">$<?=$this->cart->format_number($this->cart->total());?></th>
						</tr>
					</tfooter>
				</table>
			</div>
    </div>
	</div>
</body>
</html>
