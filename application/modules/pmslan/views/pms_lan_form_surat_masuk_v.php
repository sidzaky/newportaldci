
<?php 

	foreach ($unit_kerja as $row){
		$echolistunit_kerja.=' <option value="'.$row['unit_kerja'].'">';
	}
	if ($surat[0]['status_SIK']!=null) $disabled="disabled";
	$id_pms_lan		= ($surat[0]['id_pms_lan']!=null ? '  <input type="hidden" id="id_pms_lan" id="id_pms_lan" value="'.$surat[0]['id_pms_lan'].'">' : '' );
	$document_sik 	= ($surat[0]['document_SIK']!=null ? '  <input type="hidden" id="document_SIK_ex"  value="'.$surat[0]['document_SIK'].'">' : '' );
	$status_sik		= ($surat[0]['status_SIK']!=null ? ' <input type="hidden" id="status_SIK" value="'.$surat[0]['status_SIK'].'"> <input type="hidden" id="update_status_SIK" value="'.$surat[0]['update_status_SIK'].'"><input type="hidden" id="user_set_status_SIK" value="'.$surat[0]['user_set_status_SIK'].'">' : '');
	

	echo '<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" id="form" action="" novalidate>';
	echo $id_pms_lan;
	echo $document_sik;
	echo $status_sik;
	echo '	
			<div class="form-group required">
				<label class="control-label"><i>Nomor Surat Masuk</i> <span class="required">*</span></label>
				<input  type="text" value="'.$surat[0]['nomor_surat_masuk'].'"  id="nomor_surat_masuk" name="nomor_surat_masuk">
			</div>';

		?>				
	<script>
	
		$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
	
	
		$('form').on('submit', function(e){
				e.preventDefault();
		});
		
		function formact() {
			 var count=$('#tarikan').children().last().attr('id');
			 count =count.split("_");
			 var newid=parseInt(count[1])+1;
			 $("#tarikan").append('<div id="tarikan_'+newid+'" name="tarikan_'+newid+'" class="formtarikan"><div class="col-md-2 col-sm-2 col-xs-12"><select id="jenis_tarikan_'+newid+'" name="jenis_tarikan_'+newid+'" class="form-control col-md-7 col-xs-12"><option value="Kabel Data">Kabel Data</option><option value="Kabel Power">Kabel Power</option><option value="Power Ekstension">Power Ekstension</option><option value="Patch Cord">Patch Cord</option><option value="PDU">PDU</option><option value="Connector Power">Connector Power</option><option value="Fiber Optic">Fiber Optic</option><option value="CCTV">CCTV</option><option value="Telepon">Telepon</option><option value="Lain lain">Lain lain</option></select></div><div class="col-md-2 col-sm-2 col-xs-12"><input type="number" id="jumlah_tarikan_'+newid+'" name="jumlah_tarikan_'+newid+'" class="form-control col-md-7 col-xs-12" placeholder=""></div><div class="col-md-2 col-sm-2 col-xs-12"><input type="text" id="titik_pertama_tarikan_'+newid+'" name="titik_pertama_tarikan_'+newid+'" class="form-control col-md-7 col-xs-12" placeholder=""></div><div class="col-md-2 col-sm-2 col-xs-12"><input type="text" id="titik_kedua_tarikan_'+newid+'" name="titik_kedua_tarikan_'+newid+'" class="form-control col-md-7 col-xs-12" placeholder=""></div><div class="col-md-3 col-sm-3 col-xs-12"><input type="text" id="keterangan_'+newid+'" name="keterangan_'+newid+'" class="form-control col-md-7 col-xs-12" placeholder=""></div><div class="col-md-1 col-sm-1 col-xs-12"><button onclick="minform('+newid+')" type="button" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button></div></div>');			
			}
			
		function minform(id) {
				$('#tarikan_'+id).remove();
			}
			
			
		function input_suratmasuk(){	
						var data1 = { 
							'id_pms_lan'  : $('#id_pms_lan').val(),
							'nomor_surat_masuk'  : $('#nomor_surat_masuk').val(),
							'tanggal_surat_masuk' : $('#tanggal_surat_masuk').val(),
							'keterangan_surat_masuk' : $('#keterangan_surat_masuk').val(),
							'unit_kerja' : $('#unit_kerja').val(),
							'nomor_SIK' : $('#nomor_SIK').val(),
							'kategori' : $('#kategori').val(),
							'tanggal_SIK' : $('#tanggal_SIK').val(),
							'SLA' : $('#SLA').val(),
							'rekanan_SIK' : $('#rekanan_SIK').val(),
							'user_BAST' : $('#user_BAST').val(),
							'vendor_BAST' : $('#vendor_BAST').val(),
							'tanggal_BAST' : $('#tanggal_BAST').val(),
							'nomor_ijin_anggaran' : $('#nomor_ijin_anggaran').val(),
							'tanggal_ijin_anggaran' : $('#tanggal_ijin_anggaran').val(),
							'keterangan_ijin_anggaran' : $('#keterangan_ijin_anggaran').val(),
							'nomor_SPK' : $('#nomor_SPK').val(),
							'tanggal_SPK' : $('#tanggal_SPK').val(),
							'document_SIK' : $('#document_SIK_ex').val(),
							'status_SIK' : $('#status_SIK').val(),
							'update_status_SIK' : $('#update_status_SIK').val(),
							'user_set_status_SIK' : $('#user_set_status_SIK').val(),
						};
						var data2={
							'jenis_tarikan' : [],
							'jumlah_tarikan' : [],
							'titik_pertama_tarikan' : [],
							'titik_kedua_tarikan' : [],
							'keterangan' : [],
						}
						
						var count=$('#tarikan').children().last().attr('id');
						count =count.split("_");
						for (var i=1;i<=count[1];i++){
							data2['jenis_tarikan'].push($('#jenis_tarikan_'+i).val());
							data2['jumlah_tarikan'].push($('#jumlah_tarikan_'+i).val());
							data2['titik_pertama_tarikan'].push($('#titik_pertama_tarikan_'+i).val());
							data2['titik_kedua_tarikan'].push($('#titik_kedua_tarikan_'+i).val());
							data2['keterangan'].push($('#keterangan_'+i).val());
						}
						
						var data={
							'surat' : data1,
							'tarikan' : data2
						}
						
					$.ajax({ 
							type:"POST",
						    url: "<?php echo base_url()?>pmslan/input_request_tarikan",
						    data: data,
						    success:function(msg){
							    $('.x_content').html(msg);
								$('.modal').modal('hide');
								alert('Input Sukses');
							}
					});
				
			}			
	</script>