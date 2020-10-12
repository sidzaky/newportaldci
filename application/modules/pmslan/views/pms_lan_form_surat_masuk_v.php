<div class="col-md-12">
	<label for="thedata" class="col-sm-12 control-label">
		<h3 align="center">Data PMS LAN</h3>
	</label>
</div>
<div class="col-md-12">
	<div class="form-group col-sm-4 required">
		<label class="control-label">Nomor Surat / Link Confluence</label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="nomor_surat_masuk" value="" placeholder="required" required>
	</div> 
	<div class="form-group col-sm-4 required">
		<label class="control-label">Tanggal Masuk</label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="tanggal_surat_masuk" value="" placeholder="required" required>
	</div>  
	<div class="form-group col-sm-4 required">
		<label class="control-label">Site</label>
		<select class="form-control"  id="asset_dc">
			<?php 
				foreach ($asset_dc as $row){
					echo "<option value='".$row['id_asset_dc']."'> ".$row['nama_dc']." </option>";
				}
			?>
		</select>
	</div> 
	<div class="form-group col-sm-4 required">
		<label class="control-label">Divisi</label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="divisi" value="" placeholder="required" required>
	</div>   
	<div class="form-group col-sm-4 required">
		<label class="control-label">Bidang</label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="bidang" value="" placeholder="required" required>
	</div>   
	<div class="form-group col-sm-4 required">
		<label class="control-label">Bagian</label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="bagian" value="" placeholder="required" required>
	</div> 
	<div class="form-group col-sm-12 required">
		<label class="control-label">Kebutuhan Tarikan</label>
		<textarea type="text" pattern="[a-zA-Z]" class="form-control dform required" id="keterangan_surat_masuk" value="" placeholder="required" required></textarea>
	</div>    
	
	<div class="form-group col-sm-4 required">
		<label class="control-label">Nomor SIK / WO </label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="nomor_SIK" value="" placeholder="required" required>
	</div> 
	<div class="form-group col-sm-4 required">
		<label class="control-label">Tanggal SIK / WO </label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="tanggal_SIK" value="" placeholder="required" required>
	</div> 
	<div class="form-group col-sm-4 required">
		<label class="control-label">Kategori SIK / WO </label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="kategori" value="" placeholder="required" required>
	</div> 
	<div class="form-group col-sm-4 required">
		<label class="control-label">SLA SIK / WO </label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="SLA" value="" placeholder="required" required>
	</div> 
	<div class="form-group col-sm-4 required">
		<label class="control-label">rekanan SIK</label>
		<input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="rekanan_SIK" value="" placeholder="required" required>
	</div> 
	
</div>
<div class="col-md-12">
	<label for="thedata" class="col-sm-12 control-label">
		<h3 align="center">Detil Tarikan</h3>
	</label>
</div>
<div class="col-md-12">
	<div class="form-group required">
		<table id="table-pmslan" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th colspan="5" align="center">koordinat 1</th>
					<th colspan="5" align="center">Koordinat 2</th>
					<th rowspan="2">Label</th>
					<th rowspan="2">Keterangan</th>
					<th rowspan="2">Action </br><button class="btn btn-success waves-effect waves-light btn-sm" onclick="formact()" type="button"><i class="fa fa-plus"></i> Tambah</button></th>
				</tr>
				<tr>
					<th>Room1</th>
					<th>koor1</th>
					<th>RU1</th>
					<th>Port1</th>
					<th>Type1</th>
					<th>Room2</th>
					<th>Koor2</th>
					<th>RU2</th> 
					<th>Port2</th>
					<th>Type2</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

<script>
	var ct=0;

	function formact() {
		var room1='<select id="room1_'+ct+'">';
		var	room2='<select id="room2_'+ct+'">';
		var address="./pmslan/get_room";
		var data1={'asset_dc' : $('#asset_dc').val()};
		var room = sendajaxreturn(data1,address,'json');
		for (var i=0;i<room.length;i++){
			room1 +='<option value="'+room[i].kode +'"> '+room[i]['keterangan']+'</option>';
			room2 +='<option value="'+room[i]['kode'] +'"> '+room[i]['keterangan']+'</option>';
		}
		room1 +='</select>';
		room2 +='</select>';
		$("#table-pmslan").find('tbody').append(`<tr id='tr_`+ct+`'><td>`+ (ct+1) +`</td>
													<td>`+room1+`</td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="koordinata_`+ct+`" value="" placeholder="required" required></td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="ua_`+ct+`" value="" placeholder="required" required></td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="porta_`+ct+`" value="" placeholder="required" required></td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="konektora_`+ct+`" value="" placeholder="required" required></td>
													<td>`+room2+`</td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="koordinatb_`+ct+`" value="" placeholder="required" required></td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="ub_`+ct+`" value="" placeholder="required" required></td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="portb_`+ct+`" value="" placeholder="required" required></td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="konektorb_`+ct+`" value="" placeholder="required" required></td>
													<td></td>
													<td><input type="text" pattern="[a-zA-Z]" class="form-control required" id="keterangan_`+ct+`" value="" placeholder="required" required></td>
													<td><button class="btn btn-warning waves-effect waves-light btn-sm" onclick="minform('`+ ct +`');" type="button"><i class="fa fa-close"></i></button></td></tr>`);
		ct++;
		}
	
	
		
	function minform(id) {
			$('#tr_'+id).remove();
		}

</script>