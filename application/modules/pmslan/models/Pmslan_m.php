<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pmslan_m extends CI_Model 
{

	/////////////////////////new PMS LAN module //////////////////

	var $column_search_pmslan = array(	'keterangan_surat_masuk',
										'nomor_SIK',
										'unit_kerja',
										'nomor_surat_masuk'
);
	var $order_pmslan = array('timestamp' => 'desc');

	public function get_listpmslan($status = null, $appr = 0)
	{
		$sql  = $this->get_tablepmslan($status, $appr);
		$sql .= "  LIMIT " . ($_POST['start'] != 0 ? $_POST['start'] . ', ' : '') . " " . ($_POST['length'] != 0 ? $_POST['length'] : '200');
		return $this->db->query($sql);
	}

	
	public function get_tablepmslan($status = null, $appr = 0)
	{
		$i = 0;
		$sql = "select * from pms_lan ";
		
		// if ($appr=1) $sql .= " approve ====="; //buat filter status approve

		if ($_POST['search']['value'] != "") $sql .= " where ";
		foreach ($this->column_search_pmslan as $item) // looping awal
		{
			if ($_POST['search']['value'] != "") // jika datatable mengirimkan pencarian dengan metode POST
			{
				if ($i === 0) // looping awal
				{
					$sql .= ' (' . $item . ' LIKE "%' . $_POST['search']['value'] . '%" ESCAPE "!" ';
				} else {
					$sql .= ' OR ' . $item . ' LIKE "%' . $_POST['search']['value'] . '%" ESCAPE "!" ';
				}
				if (count($this->column_search_pmslan) - 1 == $i)
					$sql .= " ) ";
			}
			$i++;
		}
		return $sql;
	}

	public function count_pmslan()
	{
		$sql  = $this->get_tablepmslan();
		return  $this->db->query($sql)->num_rows();
	}

	////////////////////////////////////////////////////////////////////
	
	public function select_all(){
		$sql="SELECT a.*, b.USERNAME from pms_lan a
			  left join user b on b.ID =a.user_set_status_SIK
			";
		$sql.="  order by a.status_SIK asc, a.tanggal_sik desc";
		return $this->db->query($sql)->result_array(); 	
	}
	
	public function input_request_tarikan_m(){
		$message="update new PMSlan Request";
		if ($_POST['surat']['id_pms_lan']==""){
			$_POST['surat']['id_pms_lan']=substr($this->uuid->v4(),(rand(2, 4)*(-1)))."PMSin".substr($this->uuid->v4(),(rand(4, 5)*(-1)));
			$message="input new PMSlan Request";
		}
		
		$_POST['surat']['user_input']=$this->session->userdata('user_id');
		$this->db->insert('pms_lan', $_POST['surat']);
		echo count($_POST['tarikan']['rooma']);
		for ($i=0;$i<count($_POST['tarikan']['rooma']);$i++){
			
			if ($_POST['tarikan']['rooma'][$i]!='' )
				{	
					$idreq=substr($this->uuid->v4(),(rand(2, 4)*(-1)))."PMSreq".substr($this->uuid->v4(),(rand(4, 6)*(-1)));
					$sql="insert into 
							pms_lan_request  (
									id_pms_lan_request,
									id_pms_lan,
									ruangana,
									ruanganb,
									koordinata,
									koordinatb,
									ua,
									ub,
									porta,
									portb,
									konektora,
									konektorb,
									keterangana,
									keteranganb
								)
					
							values (
									'".$idreq."',
									'".$_POST['surat']['id_pms_lan']."',
									'".$_POST['tarikan']['rooma'][$i]."',
									'".$_POST['tarikan']['roomb'][$i]."',
									'".$_POST['tarikan']['koordinata'][$i]."',
									'".$_POST['tarikan']['koordinatb'][$i]."',
									'".$_POST['tarikan']['ua'][$i]."',
									'".$_POST['tarikan']['ub'][$i]."',
									'".$_POST['tarikan']['porta'][$i]."',
									'".$_POST['tarikan']['portb'][$i]."',
									'".$_POST['tarikan']['konektora'][$i]."',
									'".$_POST['tarikan']['konektorb'][$i]."',
									'".$_POST['tarikan']['keterangana'][$i]."',
									'".$_POST['tarikan']['keteranganb'][$i]."'
									)";								  
					$this->db->query($sql); 
				}		
		}
		
		// // if ($_POST['surat']['status_SIK']==null){
		// // 	$idnotif=substr($this->uuid->v4(),(rand(3, 4)*(-1)))."not".substr($this->uuid->v4(),-5);
		// // 	$sql="insert into user_notif values('".$idnotif."',
		// // 										'21',
		// // 										'<span>
		// // 										 <span>Request Tarikan</span>
		// // 										 <span class=\"time\">".$_POST['surat']['unit_kerja']."</span>
		// // 										 </span>
		// // 										 <span class=\"message\">".$_POST['surat']['keterangan_surat_masuk']."</span>',
		// // 										 '".time()."',
		// // 										 '0')";
		// // 	$this->db->query($sql); 
		// // }
	
		
		// $message .="with ip pmslan = ".$_POST['surat']['id_pms_lan'];
	
		// $this->activity_m->writelog('pmslan',$message);
	}
	
	public function update_by_case_m(){
		$sql="update pms_lan set status_by_case='true', 
								 user_set_status_by_case='".$this->session->userdata('user_id')."'
			  where id_pms_lan='".$_POST['id_pms_lan']."'";
		$this->db->query($sql);
	}
	
	public function dokument_sik(){
		$this->db->insert('pms_lan', $dokument);
	}
	
	public function update_request_tarikan_m($i){
		$sql="delete from pms_lan_request where id_pms_lan='".$_POST['surat']['id_pms_lan'].$_POST['id_pms_lan']."'";
		$this->db->query($sql);
		$sql="delete from pms_lan where id_pms_lan='".$_POST['surat']['id_pms_lan'].$_POST['id_pms_lan']."'";
		$this->db->query($sql); 
		if ($i!="justdel"){
			$this->input_request_tarikan_m();
		}
	}
	
	public function get_unitkerja(){
		$sql="select DISTINCT(unit_kerja) from pms_lan";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_tarikan_m($id){
		$sql="select * from pms_lan_request where id_pms_lan='".$id."'";
		return $this->db->query($sql)->result();
	}
	
	public function upload_document_m($data){
		$sql="update pms_lan set document_".$_POST['type']."='".$data['document']."' where id_pms_lan='".$data['id_pms_lan']."'";
		$this->db->query($sql);
		$message='upload new document_'.$_POST['type'].' with id pmslan='.$data['id_pms_lan'];
		$this->activity_m->writelog('pmslan',$message);
	}
	
	public function update_status_SIK_m(){
		$sql="update pms_lan set status_SIK='".$_POST['status_SIK']."',
								 update_status_SIK='".time()."',
								 user_set_status_SIK='".$this->session->userdata('user_id')."'
			  where id_pms_lan = '".$_POST['id_pms_lan']."'";
		$this->db->query($sql);
		$message='update status SIK to '.$_POST['status_SIK'].' id pmslan='.$_POST['id_pms_lan'];
		$this->activity_m->writelog('pmslan',$message);
	}
	
	public function get_jeniskabel_m(){
		$sql="select * from pms_lan_jenis_kabel where active=1";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_jeniskonektor_m(){
		$sql="select * from pms_lan_jenis_konektor where active=1";
		return $this->db->query($sql)->result_array();
	}
	
	
	/////////////////////////////////////////////report summary///////////////////////////////////////////////////
	
	public function summary(){

		$sql="SELECT COUNT(CASE WHEN status_SIK = '' THEN 1 ELSE NULL END) AS On_progress, 
					 COUNT(CASE WHEN status_SIK = 'Done' THEN 1 ELSE NULL END) AS Done, 
					 COUNT(CASE WHEN status_SIK = 'Cancel' THEN 1 ELSE NULL END) AS Cancel, 
					 COUNT(*) AS Total FROM pms_lan
					 WHERE tanggal_surat_masuk BETWEEN '".date("Y-m-d" , (strtotime($_POST['date1'])))."' AND '".date("Y-m-d" , strtotime($_POST['date2']))."';
					 ";	
		return $this->db->query($sql)->result_array();
	}
	
	public function tarikan_summary(){
		
		$sql="select DISTINCT(a.jenis_pms_lan) as jenis_pms_lan, sum(a.jumlah_pms_lan) as jumlah_pms_lan from pms_lan_request a
			  left join pms_lan b on b.id_pms_lan=a.id_pms_lan
			  where b.tanggal_surat_masuk BETWEEN '".date("Y-m-d" , strtotime($_POST['date1']))."'  and  '".date("Y-m-d" , strtotime($_POST['date2']))."'
			  group by a.jenis_pms_lan
		";
		return $this->db->query($sql)->result();
	}
	
	public function tarikan_done_time(){
		$sql="select *, floor((update_status_SIK-(unix_timestamp(tanggal_SIK)))/(60*60*24)) as day 
			  from pms_lan 
			  where tanggal_surat_masuk BETWEEN '".date("Y-m-d" , strtotime($_POST['date1']))."' and '".date("Y-m-d" , strtotime($_POST['date2']))."'
			  and status_SIK='Done'";
		if ($_POST['where']!=null){
			$sql .= " and floor((update_status_SIK-(unix_timestamp(tanggal_SIK)))/(60*60*24)) = '".$_POST['where']."'";
		}	 
			$sql .= " order by day asc";
			
		return $this->db->query($sql);
	}
	
	
	
	public function dettarikan_m(){
		$sql="select a.*, b.keterangan_surat_masuk, b.unit_kerja, b.nomor_SIK, b.tanggal_SIK from pms_lan_request a
			  left join pms_lan b on a.id_pms_lan=b.id_pms_lan 
			  where jenis_pms_lan='".$_POST['where']."' and 
			  b.tanggal_surat_masuk BETWEEN '".date("Y-m-d" , strtotime($_POST['date1']))."'  and  '".date("Y-m-d" , strtotime($_POST['date2']))."'";
		return $this->db->query($sql)->result();
	}
	
	
	
	public function progress_summary($i){
		$sql="select * from pms_lan WHERE status_SIK='' and tanggal_surat_masuk BETWEEN '".date("Y-m-d" , strtotime($_POST['date1']))."' AND NOW()";
		if ($i==true) $sql .= " and datediff(NOW(), tanggal_surat_masuk)  ".$_POST['where'];
		// echo $sql;
		return $this->db->query($sql)->result_array();
	}
	
	public function detsummary_m(){
		$sql="select * from pms_lan WHERE 
			  status_SIK='".$_POST['where']."' and 
			  tanggal_surat_masuk BETWEEN '".date("Y-m-d" , strtotime($_POST['date1']))."' AND '".date("Y-m-d" , strtotime($_POST['date2']))."'";
		// echo $sql;
		return $this->db->query($sql)->result_array();
	}
	/*
	cek telat
	select nomor_surat_masuk, keterangan_surat_masuk, nomor_SIK, 
			((SLA)-(DATEDIFF(tanggal_SIK,DATE_FORMAT(FROM_UNIXTIME(update_status_SIK), '%Y-%m-%d')))*-1) as pengerjaan, 
			tanggal_sik, SLA, DATE_FORMAT(FROM_UNIXTIME(update_status_SIK), '%Y-%m-%d') as done
			from pms_lan WHERE status_SIK='Done' and ((SLA)-(DATEDIFF(tanggal_SIK,DATE_FORMAT(FROM_UNIXTIME(update_status_SIK), '%Y-%m-%d')))*-1)<0 and tanggal_surat_masuk BETWEEN '2019-12-01' AND '2019-12-31'
	
	*/
	public function SLA(){
	$sql="select * from pms_lan WHERE 
			  status_SIK='Done' and status_by_case is null and kategori='pms_lan' and
			  tanggal_surat_masuk BETWEEN '".date("Y-m-d" , strtotime($_POST['date1']))."' AND '".date("Y-m-d" , strtotime($_POST['date2']))."'";
		return $this->db->query($sql)->result_array();
	}


	public function get_room_m(){
		$sql="select * from asset_dc_area_new where active=1 and id_asset_dc='".$_POST['asset_dc']."'";
		return $this->db->query($sql)->result_array();

	}

	public function get_assetdc_m(){
		$sql="select * from asset_dc";
		return  $this->db->query($sql)->result_array();
	}
    

}
/* End of file user_m.php */
/* Location: ./application/models/user_m.php */