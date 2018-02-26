<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Services extends CI_Controller {
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
									'm_api',
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
		
	function loginPilot(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'username' =>  $this->input->post('username'),
				'password' =>  $this->input->post('password'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->m_login->checkLoginAppsPilot($param['username'], $param['password']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Login berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Username atau password salah";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function loginDriver(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'username' =>  $this->input->post('username'),
				'password' =>  $this->input->post('password'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->m_login->checkLoginAppsDriver($param['username'], $param['password']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Login berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Username atau password salah";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function loginChiefOCC(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'username' =>  $this->input->post('username'),
				'password' =>  $this->input->post('password'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->m_login->checkLoginAppsChiefOCC($param['username'], $param['password']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Login berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Username atau password salah";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function loginFA(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'username' =>  $this->input->post('username'),
				'password' =>  $this->input->post('password'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->m_login->checkLoginAppsFA($param['username'], $param['password']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Login berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Username atau password salah";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function profilFA(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'username' =>  $this->input->post('username'),
				'password' =>  $this->input->post('password'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->m_login->checkLoginAppsFA($param['username'], $param['password']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Login berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Username atau password salah";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function updateProfilFA(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'fa_id' 	=>  $this->input->post('fa_id'),
				'email' 	=>  $this->input->post('email'),
				'phone' 	=>  $this->input->post('phone'),
				'name' 		=>  $this->input->post('name'),
				'status' 	=>  $this->input->post('status')
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$file_attach = "";
			
			if($_FILES['photo']['name']!=""){
				$uploaddir = 'uploads/profil/';
				$uploadfile = $uploaddir . basename($_FILES['photo']['name']);
				move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
				$param['photo'] = $_FILES['photo']['name'];
			}
			$data = $this->M_flight_attendant->updateProfilFA($param, $param['fa_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function updateProfilDriver(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'driver_id' 	=>  $this->input->post('driver_id'),
				'email' 	=>  $this->input->post('email'),
				'phone' 	=>  $this->input->post('phone'),
				'name' 		=>  $this->input->post('name'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$file_attach = "";
			
			if($_FILES['photo']['name']!=""){
				$uploaddir = 'uploads/profil/';
				$uploadfile = $uploaddir . basename($_FILES['photo']['name']);
				move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
				$param['photo'] = $_FILES['photo']['name'];
			}
			$data = $this->M_driver->updateProfilDriver($param, $param['driver_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	
	
	function listSchedule(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'date' =>  $this->input->post('date'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getScheduleApps($param['date']);
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function scheduleDetail(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'schedule_id' =>  $this->input->post('schedule_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getScheduleAppsDetailSchedule($param['schedule_id']);
			$data2 = $this->M_schedule->ScheduleInf($param['schedule_id']);
			$data3 = $this->M_schedule->ScheduleFA($param['schedule_id']);
			$data4 = $this->M_schedule->ScheduleTransport($param['schedule_id']);
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['schedule'] = (array) $data;
				$dataArray ['results']['flight_information'] = (array) $data2;
				$dataArray ['results']['list_of_crew'] = (array) $data3;
				$dataArray ['results']['transport'] = (array) $data4;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	
	function listScheduleDriver(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'date' =>  $this->input->post('date'),
				'driver_id' =>  $this->input->post('driver_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getScheduleAppsDriver($param['date'], $param['driver_id']);
			$data2 = $this->M_schedule->getScheduleAppsDriverCrew($param['date'], $param['driver_id']);
			/* echo $this->db->last_query();
			die; */
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$dataArray ['results']['crew'] = (array) $data2;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function listScheduleDriverDetail(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'driver_schedule_id' =>  $this->input->post('driver_schedule_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getDriverScheduleDetail($param['driver_schedule_id']);
			$data2 = $this->M_schedule->getDriverPickUp($param['driver_schedule_id']);
			$data3 = $this->M_schedule->getDriverCrew($param['driver_schedule_id']);
			
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$dataArray ['results']['pickup_information'] = (array) $data2;
				$dataArray ['results']['list_crew'] = (array) $data3;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function emergencyDetail(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'schedule_id' =>  $this->input->post('schedule_id'),
				'fa_id' =>  $this->input->post('fa_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getTulisanAtas($param['fa_id']);
			$data1 = $this->M_schedule->getScheduleAppsDetailSchedule($param['schedule_id']);
			$data2 = $this->M_schedule->ScheduleInf($param['schedule_id']);
			$data3 = $this->M_schedule->ScheduleFA($param['schedule_id']);
			$data4 = $this->M_schedule->ScheduleTransport($param['schedule_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['tulisan_atas'] = (array) $data;
				$dataArray ['results']['schedule'] = (array) $data1;
				$dataArray ['results']['flight_information'] = (array) $data2;
				$dataArray ['results']['list_of_crew'] = (array) $data3;
				$dataArray ['results']['transport'] = (array) $data4;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function notification(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'fa_id' =>  $this->input->post('fa_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getScheduleAppsFA($param['fa_id']);
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function notificationPilot(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'pilot_id' =>  $this->input->post('pilot_id'),
				//'co_pilot_id' =>  $this->input->post('pilot_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getScheduleAppsPilot($param['pilot_id']);
			
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function notificationOCC(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'data' => 'bbg'
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getNotifOCC();
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function notificationOCCDetail(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'schedule_detail_id' =>  $this->input->post('schedule_detail_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getNotifOCCDetail($param['schedule_detail_id']);
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function notificationDriver(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'driver_id' =>  $this->input->post('driver_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getDriverNotif($param['driver_id']);
			$data2 = $this->M_schedule->getDriverJumlahCrew($param['driver_id']);
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$dataArray ['results']['crew'] = (array) $data2;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function emgergencyAfterAccept(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'schedule_id' =>  $this->input->post('schedule_id'),
				'fa_id' =>  $this->input->post('fa_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getScheduleAppsFA($param['fa_id']);
			$data1 = $this->M_schedule->getScheduleAppsDetailSchedule($param['schedule_id'], $param['fa_id']);
			$data2 = $this->M_schedule->ScheduleInf($param['schedule_id']);
			$data3 = $this->M_schedule->ScheduleFAAfterAccept($param['schedule_id']);
			$data4 = $this->M_schedule->ScheduleTransport($param['schedule_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['tulisan_atas'] = (array) $data;
				$dataArray ['results']['schedule'] = (array) $data1;
				$dataArray ['results']['flight_information'] = (array) $data2;
				$dataArray ['results']['list_of_crew'] = (array) $data3;
				$dataArray ['results']['transport'] = (array) $data4;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function checkIn(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'fa_id' 		=>  $this->input->post('fa_id')
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_flight_attendant->checkIn($param['fa_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function accept(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'fa_id' 		=>  $this->input->post('fa_id'),
				//'location' 		=>  $this->input->post('location')
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_flight_attendant->accept($param['fa_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function reject(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'schedule_id' 	=>  $this->input->post('schedule_id'),
				'fa_id' 		=>  $this->input->post('fa_id'),
				'feedback_reject' 		=>  $this->input->post('feedback_reject')
				
		);
		
		$check_require = $this->m_api->requireValidation($param);
		if ($check_require ['status'] == true) {
			
			$data = $this->M_schedule->reject($param['schedule_id'], $param['fa_id'],$param['feedback_reject']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function acceptFeedback(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'schedule_detail_id' 	=>  $this->input->post('schedule_detail_id'),
				
		);
		
		$check_require = $this->m_api->requireValidation($param);
		if ($check_require ['status'] == true) {
			
			$data = $this->M_schedule->acceptFeedback($param['schedule_detail_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function declineFeedback(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'schedule_detail_id' 	=>  $this->input->post('schedule_detail_id'),
				
		);
		
		$check_require = $this->m_api->requireValidation($param);
		if ($check_require ['status'] == true) {
			
			$data = $this->M_schedule->declineFeedback($param['schedule_detail_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function pickupReport(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'driver_schedule_id' 	=>  $this->input->post('driver_schedule_id'),
				'report' 		=>  $this->input->post('report')
				
		);
		
		$check_require = $this->m_api->requireValidation($param);
		if ($check_require ['status'] == true) {
			
			$data = $this->M_schedule->pickupReport($param['driver_schedule_id'], $param['report']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function FaSendLocation(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'fa_id' 	=>  $this->input->post('fa_id'),
				'location' 	=>  $this->input->post('location')
				
		);
		
		$check_require = $this->m_api->requireValidation($param);
		if ($check_require ['status'] == true) {
			
			$data = $this->M_schedule->FaSendLocation($param['fa_id'],$param['location']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function FaCheckIn(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'fa_id' 	=>  $this->input->post('fa_id'),
				'location' 	=>  $this->input->post('location')
				
		);
		
		$check_require = $this->m_api->requireValidation($param);
		if ($check_require ['status'] == true) {
			
			$data = $this->M_schedule->FaCheckIn($param['fa_id'],$param['location']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function parsingin (){
		$text = '<This> is a <test> string, <eat> my <shorts>.';
		preg_match_all("/\<([^\>]*)\>/", $text, $matches);
		var_dump($matches[1]);
	}

	function scheduleDetailPilot(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'pilot_schedule_id' =>  $this->input->post('pilot_schedule_id'),
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->M_schedule->getScheduleAppsDetailSchedule($param['pilot_schedule_id']);
			$data2 = $this->M_schedule->ScheduleInf($param['pilot_schedule_id']);
			$data3 = $this->M_schedule->ScheduleTransport($param['pilot_schedule_id']);
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['schedule'] = (array) $data;
				$dataArray ['results']['flight_information'] = (array) $data2;
				$dataArray ['results']['transport'] = (array) $data3;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}

	function updateProfilPilot(){
		$dataArray = array ( 
				'pic' => 'Gina' 
		);
	
		$param = array(
				'pilot_id' 	=>  $this->input->post('pilot_id'),
				'email' 	=>  $this->input->post('email'),
				'phone' 	=>  $this->input->post('phone'),
				'name' 		=>  $this->input->post('name'),
				'status' 	=>  $this->input->post('status')
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$file_attach = "";
			
			if($_FILES['photo']['name']!=""){
				$uploaddir = 'uploads/profil/';
				$uploadfile = $uploaddir . basename($_FILES['photo']['name']);
				move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
				$param['photo'] = $_FILES['photo']['name'];
			}
			$data = $this->M_flight_attendant->updateProfilFA($param, $param['fa_id']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}

	
}