<div class="col-md-12">
	<label for="thedata" class="col-sm-12 control-label">
		<h3 align="center">Data PMS LAN</h3>
	</label>
</div>
<div class="col-md-12">
	<input type="hidden" pattern="[a-zA-Z]" class="form-control dform required" id="id_pms_lan" value="" placeholder="required" required>
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
	<button class="btn btn-success waves-effect waves-light btn-sm" onclick="formact()" type="button"><i class="fa fa-plus"></i> Tambah</button>
		<table id="table-pmslan" class="table-striped table-bordered" width="100%">
			<thead>
				<tr>
					<th style="width:2%" rowspan="2">No</th>
					<th colspan="5" align="center">koordinat 1</th>
					<th colspan="5" align="center">Koordinat 2</th>
					<th rowspan="2">Label</th>
					<th rowspan="2">Keterangan</th>
					<th style="width: 2%" rowspan="2">Action</th>
				</tr>
				<tr>
					<th style="width: 17%">ROOM</th>
					<th style="width: 5%">KOOR</th>
					<th style="width: 5%">RU</th>
					<th style="width: 6%">PORT</th>
					<th style="width: 5%">TYPE</th>
					<th style="width: 17%">ROOM</th>
					<th style="width: 5%">KOOR</th>
					<th style="width: 5%">RU</th> 
					<th style="width: 6%">PORT</th>
					<th style="width: 5%">TYPE</th>
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
		
		var room1=`<select onchange="setlabel('`+ ct +`');" class="form-control" id="rooma_`+ct+`">`;
		var	room2=`<select onchange="setlabel('`+ ct +`');" class="form-control" id="roomb_`+ct+`">`;
		var address="./pmslan/get_room";
		var data1={'asset_dc' : $('#asset_dc').val()};
		var room = sendajaxreturn(data1,address,'json');
		for (var i=0;i<room.length;i++){
			room1 +='<option value="'+room[i].kode +'"> '+room[i].keterangan+'</option>';
			room2 +='<option value="'+room[i].kode +'"> '+room[i].keterangan+'</option>';
		}
		room1 +='</select>';
		room2 +='</select>';
		$("#table-pmslan").find('tbody').append(`<tr id='tr_`+ct+`'><td>`+ (ct+1) +`</td>
													<td id="troom_`+ct+`">`+room1+`</td>
													<td id="tkoordinata_`+ct+`" ><input onchange="setlabel('`+ct+`');" type="text" class="form-control required" id="koordinata_`+ct+`" value="" placeholder="required" required></td>
													<td id="tua_`+ct+`"><input onchange="setlabel('`+ct+`');" type="text" class="form-control required" id="ua_`+ct+`" value="" placeholder="required" required></td>
													<td id="tporta_`+ct+`"><input onchange="setlabel('`+ct+`');" type="text" class="form-control required" id="porta_`+ct+`" value="" placeholder="required" required></td>
													<td id="tkonektora_`+ct+`"><input onchange="setlabel('`+ct+`');" type="text" class="form-control required" id="konektora_`+ct+`" value="" placeholder="required" required></td>
													<td id="troomb_`+ct+`">`+room2+`</td>
													<td id="tkoordinatb_`+ct+`"><input onchange="setlabel('`+ct+`');" type="text" class="form-control required" id="koordinatb_`+ct+`" value="" placeholder="required" required></td>
													<td id="tub_`+ct+`"><input onchange="setlabel('`+ct+`');" type="text" class="form-control required" id="ub_`+ct+`" value="" placeholder="required" required></td>
													<td id="tportb_`+ct+`"><input onchange="setlabel('`+ct+`');" type="text" class="form-control required" id="portb_`+ct+`" value="" placeholder="required" required></td>
													<td id="tkonektorb_`+ct+`"><input onchange="setlabel('`+ct+`');" type="text" class="form-control required" id="konektorb_`+ct+`" value="" placeholder="required" required></td>
													<td id="label_`+ct+`"></td>
													<td><input type="text" class="form-control required" id="keterangan_`+ct+`" value="" placeholder="required" required></td>
													<td><button class="btn btn-warning waves-effect waves-light btn-sm" onclick="minform('`+ ct +`');" type="button"><i class="fa fa-close"></i></button></td></tr>`);
		setlabel(ct);
		ct++;
	}
	
	
		
	function minform(id) {
			$('#tr_'+id).remove();
		}

	function setlabel(i=null){
		var kabela=$("#rooma_"+i).val() + '.' + $("#koordinata_"+i).val() + '.' + $("#ua_"+i).val() + '.' + $("#porta_"+i).val();
		var kabelb=$("#roomb_"+i).val() + '.' + $("#koordinatb_"+i).val() + '.' + $("#ub_"+i).val() + '.' + $("#portb_"+i).val();
		document.getElementById("label_"+i).innerHTML = kabela + ' - ' + kabelb ; 
	}

	function submitdata(){
		var data1={
					'id_pms_lan'  : $('#id_pms_lan').val(),
					'nomor_surat_masuk'  : $('#nomor_surat_masuk').val(),
					// 'tanggal_surat_masuk' : $('#tanggal_surat_masuk').val(),
					// 'keterangan_surat_masuk' : $('#keterangan_surat_masuk').val(),
					// 'unit_kerja' : $('#unit_kerja').val(),
					// 'nomor_SIK' : $('#nomor_SIK').val(),
					// 'kategori' : $('#kategori').val(),
					// 'tanggal_SIK' : $('#tanggal_SIK').val(),
					// 'SLA' : $('#SLA').val(),
					// 'rekanan_SIK' : $('#rekanan_SIK').val(),
		}

		var data2={
							'rooma' : [],
							'roomb' : [],
							'koordinata' : [],
							'koordinatb' : [],
							'ua' : [],
							'ub' : [],
							'porta' : [],
							'portb' : [],
							'konektora' : [],
							'konektorb' : [],
						}

		for (var i=0;i<ct;i++){
							data2['rooma'].push($('#rooma_'+i).val());
							data2['roomb'].push($('#roomb_'+i).val());
							data2['koordinata'].push($('#koordinata_'+i).val());
							data2['koordinatb'].push($('#koordinatb_'+i).val());
							data2['ua'].push($('#ua_'+i).val());
							data2['ub'].push($('#ub_'+i).val());
							data2['porta'].push($('#porta_'+i).val());
							data2['portb'].push($('#portb_'+i).val());
							data2['konektora'].push($('#konektora_'+i).val());
							data2['konektorb'].push($('#konektorb_'+i).val());
		}
		var data={
							'surat' : data1,
							'tarikan' : data2
						}

		$.ajax({ 
			type:"POST",
			url: "./pmslan/input_request_tarikan",
			data: data,
			success:function(msg){
				$('.result').html(msg);
				alert('Input Sukses');
			}
	});
}
</script>