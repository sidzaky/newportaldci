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