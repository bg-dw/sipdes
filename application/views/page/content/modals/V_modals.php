<?php if($this->session->flashdata('info')){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			swal("Berhasil!", "<?php echo $this->session->flashdata('info');?>", "success");
		});
	</script>
<?php }elseif($this->session->flashdata('warning')){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			swal("Warning!", "<?php echo $this->session->flashdata('warning');?>", "warning");
		});
	</script>
<?php }elseif($this->session->flashdata('hapus')){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			swal("Berhasil!", "<?php echo $this->session->flashdata('hapus');?>", "success");
		});
	</script>
<?php }elseif($this->session->flashdata('update')){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			swal("Berhasil!", "<?php echo $this->session->flashdata('update');?>", "success");
		});
	</script>
<?php }?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;" id="logout_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="mySmallModalLabel">Keluar Dari SIPDES?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="card-body little-profile text-center">
                <div class="row button-group text-center">
                    <button data-dismiss="modal" class="m-t-10 waves-effect waves-dark btn btn-danger btn-md btn-rounded" style="min-width: 122px;">Tidak</button>
                    <button onclick="location.href='<?php echo base_url();?>index.php/login/logout'" class="m-t-10 waves-effect waves-dark btn btn-success btn-md btn-rounded" style="min-width: 122px;">Ya</button>
                </div>
                </div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

