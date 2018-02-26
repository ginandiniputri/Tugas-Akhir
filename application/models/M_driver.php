<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_driver extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getAll(){
		$this->db->select("*");
		$this->db->from("driver");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getDriverId($id){
		$this->db->select("*");
		$this->db->from("driver");
		$this->db->where("driver_id",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	public function updateProfilDriver($param, $id){
		$dataArray = array(
						"email" 	=> $param['email'],
						'phone' 	=> $param['phone'],
						'name' 		=> $param['name'],
						'foto' 		=> $param['photo']
					);
		$update = $this->db->update('driver',$dataArray,array("driver_id" => $id));
		//$update = $this->db->insert('flight_attendant',$dataArray);
		if($update){
			return  $update;
		}else{
			return false;
		}
	}
	
	public function reportDriver(){
		$sql = "select *
				from driver_schedule
				join driver  ON driver.driver_id = driver_schedule.driver_id
				WHERE report IS NOT NULL
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
}