<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			PMS LAN
		</h1>
	</section>
    <section class="content">
		<div class="box box-solid">
			<div id="result" class="box-body">
				<div class="container-fluid control-box">
				<script></script>
				<button class="btn btn-success waves-effect waves-light btn-sm" data-toggle="offcanvas" onclick="getform()" type="button"><i class="fa fa-plus"></i> Tambah Data</button>
				</div>

				<script>
					$(document).ready(function() {
						$('#table-pmslan').DataTable({
							"processing": true,
							"serverSide": true,
							"deferRender": true,
							"ajax": {
								"url": "./pmslan/get_pmslan",
								"type": "POST"
							},

						});
					});
				</script>

				<div class="table-responsive">
					<table id="table-pmslan" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kebutuhan</th>
								<th>Request By</th>
								<th>SIK</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					<table>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- Modal -->
<style>
	.modal-body {
		width : 100%;
		max-height: calc(100vh - 200px);
		overflow-y: auto;
	}

	.btn-file {
		position: relative;
		overflow: hidden;
	}

	.btn-file input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		min-width: 100%;
		min-height: 100%;
		font-size: 100px;
		text-align: right;
		filter: alpha(opacity=0);
		opacity: 0;
		outline: none;
		background: white;
		cursor: inherit;
		display: block;
	}

	.img-upload {
		width: 100%;
	}
</style>

<div class="modal " id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="$('#modal').hide();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title">Form Pertanyaan</h5>
			</div>
			<div class="modal-body">
				<div id="mod-content-left" class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function getform(i=null){	
		$.ajax({ 
							type:"POST",
						    url: "<?php echo base_url()?>pmslan/input_request_tarikan",
						    success:function(msg){
							    $('#result').html(msg);
							}
					});
	}

</script>
