</main>
<footer class='app-footer py-5 shadow-sm'>
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <p class='credit'> © <?=date('Y')?> All Rights Reserved in <?=setting('store_name')?></p>
            </div>
        </div>
    </div>
</footer>
<?php if (access()):?>
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
<?php endif;?> 
<script src="<?=base_url()?>assets/vendors/slick/slick.js"></script>
<script src="<?=base_url()?>assets/scripts/common.js"></script>
</body>
</html>