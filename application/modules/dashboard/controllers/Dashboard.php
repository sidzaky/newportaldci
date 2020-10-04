<?php

/**
 *
 * @author 
 * @Nicky
 *
 **/
?>
 
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->module('login');
    $this->login->is_logged_in();
    $this->load->helper(array('url', 'form', 'html'));
    $this->load->model('dashboard_m');
  }

  public function index()
  {
      $data['navbar'] = 'navbar';
      $data['sidebar'] = 'sidebar';
      $data['content'] = 'dashboard';
      $data['headboard'] = 'Guardian Of The Data Center';
      $data['breadcrumb'][0] = 'Portal Isd';
      $data['breadcrumb'][1] = '';
      $_POST['statusapproval']='all';
      $_POST['date2']=date("m/d/y", time());
      $_POST['date1']=("01/01/".date("y"));
      $this->load->view('template',$data);
  }

 
}
