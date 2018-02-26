<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('M_flight_attendant');
		$this->load->model('M_driver');
    }


    public function index()
	{
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['v_content'] = 'member/notification/content';
		$this->load->view('member/layout',$data);
	}
	
	 public function detail()
	{
		$data['listData']	= $this->M_flight_attendant->getAll();
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['v_content'] = 'member/notification/detail';
		$this->load->view('member/layout',$data);
	}
	
	public function picking_notif()
	{
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['v_content'] = 'member/notification_picking/content';
		$this->load->view('member/layout',$data);
	}
	
	 public function detail_picking_notif()
	{
		$data['listData']	= $this->M_driver->reportDriver();
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['v_content'] = 'member/notification_picking/detail';
		$this->load->view('member/layout',$data);
	}
    
	function decryptIt( $q ) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
		return( $qDecoded );
	}
       
}
