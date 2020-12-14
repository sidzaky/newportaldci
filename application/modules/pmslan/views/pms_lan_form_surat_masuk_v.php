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
		<select class="form-control"  onchange="clrt();" id="asset_dc">
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
	<button class="btn btn-success waves-effect waves-light btn-sm" onclick="formact();" type="button"><i class="fa fa-plus"></i> Tambah</button>
		<table id="table-pmslan" class="table-striped table-bordered" width="100%">
			<thead>
				<tr>
					<th style="width:2%" rowspan="2">No</th>
					<th colspan="6"><p align="center">koordinat 1</p></th>
					<th colspan="6"><p align="center">Koordinat 2</p></th>
					<th rowspan="2">Label</th>
					<th rowspan="2">Action</th>
				</tr>
				<tr>
					<th>ROOM</th>
					<th>KOOR</th>
					<th>RU</th>
					<th>PORT</th>
					<th>TYPE</th>
					<th>KETERANGAN</th>
					<th>ROOM</th>
					<th>KOOR</th>
					<th>RU</th> 
					<th>PORT</th>
					<th>TYPE</th>
					<th>KETERANGAN</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group required" >
		<button style="float:right;" class="btn btn-primary waves-effect waves-light btn-sm" onclick="submitdata()" type="button"><i class="fa fa-check"></i> Submit </button>
	</div>	
</div>

<div class="modal " id="modal-table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="$('#modal').hide();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title">Form PML LAN</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<!--------------------- KOORDINAT KEDUA ------------------>
					<div class="col-sm-12" align="center">
							<h4 class="modal-title">KOORDINAT 1</h4>
					</div>
					</br></br>
					<div class="col-sm-3">
							<label class="control-label">Ruangan 1</label>
							<div id="room1"></div>
					</div>
					<div class="col-sm-2">
							<label class="control-label">Koordinat</label>
							<input type="text" id="fkoora" class="form-control fform required" value="" required>
					</div>
					<div class="col-sm-2">
							<label class="control-label">RU</label>
							<input type="text" id="fua" class="form-control fform required" value="" required>
					</div>
					<div class="col-sm-2">
							<label class="control-label">Port</label>
							<input type="text" id="fporta" class="form-control fform required" value="" required>
					</div>
					<div class="col-sm-3">
							<label class="control-label">Tipe</label>
							<input type="text" id="ftipea" class="form-control fform required" value="" required>
					</div>
					<div class="col-sm-12">
							<label class="control-label">Keterangan</label>
							<input type="text" id="fketa" class="form-control fform required" value="" required>
					</div>
					</br></br>
						<!--------------------- KOORDINAT KEDUA ------------------>
					<div class="col-sm-12" align="center">
							<h4 class="modal-title">KOORDINAT 2</h4>
					</div>
					</br></br>
					<div class="col-sm-3">
							<label class="control-label">Room</label>
							<div id="room2"></div>
					</div>
					<div class="col-sm-2">
							<label class="control-label">Koordinat</label>
							<input type="text" id="fkoorb" class="form-control fform required" value="" required>
					</div>
					<div class="col-sm-2">
							<label class="control-label">RU</label>
							<input type="text" id="fub" class="form-control fform required" value="" required>
					</div>
					<div class="col-sm-2">
							<label class="control-label">Port</label>
							<input type="text" id="fportb" class="form-control fform required" value="" required>
					</div>
					<div class="col-sm-3">
							<label class="control-label">Tipe</label>
							<input type="text" id="ftipeb" class="form-control fform required" value="" required>
					</div>
					<div class="col-sm-12">
							<label class="control-label">Keterangan</label>
							<input type="text" id="fketb" class="form-control fform required" value="" required>
					</div>
				</div>					
			</div>
			<div class="modal-footer d-flex justify-content-center">
        		<button class="btn btn-default" onclick="formsubmitact();"> Submit</button>
      		</div>
		</div>
	</div>
</div>





<script>

	var ct=0;
	function clrt(){
		for (var i=0;i<ct;i++){
			$('#tr_'+i).remove();
		}
		ct=0;
	}

	function formsubmitact(i=null){
		if (i!=null){

		}
		var label=$('#frooma').val()+`.`+$('#fkoora').val()+`.`+$('#fua').val()+`.`+$('#fporta').val()+` - `+$('#froomb').val()+`.`+$('#fkoorb').val()+`.`+$('#fub').val()+`.`+$('#fportb').val();
		$("#table-pmslan").find('tbody').append(`<tr id='tr_`+ct+`'><td>`+ (ct+1) +`</td>
													<td id="troom_`+ct+`">`+$('#frooma').val()+`<input type="hidden" class="form-control required" id="rooma_`+ct+`" value="`+$('#frooma').val()+`" placeholder="required" required></td>
													<td id="tkoordinata_`+ct+`" >`+$('#fkoora').val()+`<input type="hidden" class="form-control required" id="koordinata_`+ct+`" value="`+$('#fkoora').val()+`" placeholder="required" required></td>
													<td id="tua_`+ct+`">`+$('#fua').val()+`<input type="hidden" class="form-control required" id="ua_`+ct+`" value="`+$('#fua').val()+`" placeholder="required" required></td>
													<td id="tporta_`+ct+`">`+$('#fporta').val()+`<input type="hidden" class="form-control required" id="porta_`+ct+`" value="`+$('#fporta').val()+`" placeholder="required" required></td>
													<td id="tkonektora_`+ct+`">`+$('#ftipea').val()+`<input type="hidden" class="form-control required" id="konektora_`+ct+`" value="`+$('#ftipea').val()+`" placeholder="required" required></td>
													<td id="tketa_`+ct+`">`+$('#fketa').val()+`<input type="hidden" class="form-control required" id="keterangana_`+ct+`" value="`+$('#fketa').val()+`" placeholder="required" required></td>
													<td id="troomb_`+ct+`">`+$('#froomb').val()+`<input type="hidden" class="form-control required" id="roomb_`+ct+`" value="`+$('#froomb').val()+`" placeholder="required" required></td>
													<td id="tkoordinatb_`+ct+`">`+$('#fkoorb').val()+`<input type="hidden" class="form-control required" id="koordinatb_`+ct+`" value="`+$('#fkoorb').val()+`" placeholder="required" required></td>
													<td id="tub_`+ct+`">`+$('#fub').val()+`<input type="hidden" class="form-control required" id="ub_`+ct+`" value="`+$('#fub').val()+`" placeholder="required" required></td>
													<td id="tportb_`+ct+`">`+$('#fportb').val()+`<input type="hidden" class="form-control required" id="portb_`+ct+`" value="`+$('#fportb').val()+`" placeholder="required" required></td>
													<td id="tkonektorb_`+ct+`">`+$('#ftipeb').val()+`<input type="hidden" class="form-control required" id="konektorb_`+ct+`" value="`+$('#ftipeb').val()+`" placeholder="required" required></td>
													<td id="tketb_`+ct+`">`+$('#fketb').val()+`<input type="hidden" class="form-control required" id="keteranganb_`+ct+`" value="`+$('#fketb').val()+`" placeholder="required" required></td>
													<td id="label_`+ct+`">`+ label +`</td>
													<td>
														<button class="btn btn-warning waves-effect waves-light btn-sm" onclick="formact('`+ ct +`');" type="button"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></button>
														<button class="btn btn-danger waves-effect waves-light btn-sm" onclick="minform('`+ ct +`');" type="button"><i class="fa fa-close" aria-hidden="true"></i></button>
													</td>
												</tr>`);
		ct++;
		$('#modal-table').modal('hide');
	}



	function formact(z=null) {
		$('#modal-table').modal('show');

		if (z!=null){
			$("#fkoora").val($("#koordinata_"+z).val());
			$("#fua").val($("#ua_"+z).val());
			$("#fporta").val($("#porta_"+z).val());
			$("#ftipea").val($("#konektora_"+z).val());
			$("#fketa").val($("#keterangana_"+z).val());

			$("#fkoorb").val($("#koordinatb_"+z).val());
			$("#fub").val($("#ub_"+z).val());
			$("#fportb").val($("#portb_"+z).val());
			$("#ftipeb").val($("#konektorb_"+z).val());
			$("#fketb").val($("#keteranganb_"+z).val());
		}
		else $(".fform").val("");

		var room1=`<select class="form-control" id="frooma">`;
		var	room2=`<select class="form-control" id="froomb">`;
		var address="./pmslan/get_room";
		var data1={'asset_dc' : $('#asset_dc').val()};
		var room = sendajaxreturn(data1,address,'json');
		for (var i=0;i<room.length;i++){
			room1 +='<option value="'+room[i].kode +'" '+ ( z != null ? ( $('#rooma_'+z).val() == room[i].kode ? 'selected' : '') : '' )+'> '+room[i].keterangan+'</option>';
			room2 +='<option value="'+room[i].kode +'" '+ ( z != null ? ( $('#roomb_'+z).val() == room[i].kode ? 'selected' : '') : '' )+'> '+room[i].keterangan+'</option>';
		}
		room1 +='</select>';
		room2 +='</select>';
		document.getElementById("room1").innerHTML=room1;	
		document.getElementById("room2").innerHTML=room2;
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
		if (confirm('apakah anda yakin??')){
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
}
</script>