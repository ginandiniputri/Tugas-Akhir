<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Services2 extends CI_Controller {
	private $signature; 
	function __construct() {
		parent::__construct ();
		
		$uri = $this->uri->segment(1);
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper ( array (
				'url',
				'form',
				'language' 
		) );
		$this->load->model ( array (
									
									'm_login',
									'M_schedule',
									'M_flight_attendant',
									'M_driver'
									) 
							);
	}
	
	function index() {
		header ( "location: " . base_url () );
		die ();
	}
		
	
	function Fa_schedule_new(){
		var_dump($_POST);
		die;
	}
	
	
	 
	
}