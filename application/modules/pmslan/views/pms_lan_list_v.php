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
				<button class="btn btn-success waves-effect waves-light btn-sm" onclick="getform()" type="button"><i class="fa fa-plus"></i> Tambah Data</button>
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
						<div class="col-sm-12">
							<label for="thedata" class="col-sm-12 control-label">
								<h3 align="center">Data PMS LAN</h3>
							</label>
						</div>
						<div class="form-group required">
							<label class="control-label">Nomor Surat / Link Confluence</label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="nomor_surat_masuk" value="" placeholder="required" required>
						</div> 
						<div class="form-group required">
							<label class="control-label">Tanggal Masuk</label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="tanggal_surat_masuk" value="" placeholder="required" required>
						</div>  
						<div class="form-group required">
							<label class="control-label">Kebutuhan Tarikan</label>
							<textarea type="text" pattern="[a-zA-Z]" class="form-control dform required" id="keterangan_surat_masuk" value="" placeholder="required" required></textarea>
						</div>    
						<div class="form-group required">
							<label class="control-label">Divisi</label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="divisi" value="" placeholder="required" required>
						</div>   
						<div class="form-group required">
							<label class="control-label">Bidang</label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="bidang" value="" placeholder="required" required>
						</div>   
						<div class="form-group required">
							<label class="control-label">Bagian</label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="bagian" value="" placeholder="required" required>
						</div> 
						<div class="form-group required">
							<label class="control-label">Nomor SIK / WO </label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="nomor_SIK" value="" placeholder="required" required>
						</div> 
						<div class="form-group required">
							<label class="control-label">Tanggal SIK / WO </label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="tanggal_SIK" value="" placeholder="required" required>
						</div> 
						<div class="form-group required">
							<label class="control-label">Kategori SIK / WO </label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="kategori" value="" placeholder="required" required>
						</div> 
						<div class="form-group required">
							<label class="control-label">SLA SIK / WO </label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="SLA" value="" placeholder="required" required>
						</div> 
						<div class="form-group required">
							<label class="control-label">rekanan SIK</label>
							<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="rekanan_SIK" value="" placeholder="required" required>
						</div> 
				</div>
				<div id="mod-content-right" class="col-md-8">
					<div class="form-group required">
							<table>
								<thead>
									<tr>
										<th colspan="2">No</th>
										<th colspan="2">Kebutuhan</th>
										<th rowspan="5">koordinat 1</th>
										<th rowspan="5">Koordinat 2</th>
										<th colspan="2">Label</th>
										<th colspan="2">Keterangan</th>
									</tr>
									<tr>
										<th>Ruangan1</th>
										<th>koor1</th>
										<th>RU1</th>
										<th>Port1</th>
										<th>konektor</th>
										<th>Ruangan 2</th>
										<th>Koor2</th>
										<th>RU2</th> 
										<th>Port2</th>
										<th>Konektor</th>
									</tr>
								</thead>
								<tbody>



								</tbody>
							</table>
							</div> 
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function getform(){
		$("#modal").show();


	}

</script>
