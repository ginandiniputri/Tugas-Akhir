<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_schedule extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getAll(){
		$this->db->select("*, p.pilot_id, p.name as pilot_name, pl.pilot_id,pl.name as co_pilot_name");
		$this->db->from("crew_schedule cs");
		$this->db->join("pilot p","p.pilot_id = cs.pilot_id");
		$this->db->join("pilot pl","pl.pilot_id = cs.co_pilot_id");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getScheduleId($id){
		$this->db->select("*, `p`.`pilot_id`, `p`.`name` as `pilot_name`, `pl`.`pilot_id` as `co_pilot_id`, `pl`.`name` as `co_pilot_name`,
fa.fa_id, fa.name as fa_name, fa.gender, fa.status, fa.location");
		$this->db->from("crew_schedule cs");
		$this->db->where("cs.schedule_id",$id);
		$this->db->join("pilot p","p.pilot_id = cs.pilot_id");
		$this->db->join("pilot pl","pl.pilot_id = cs.co_pilot_id");
		$this->db->join("crew_schedule_detail csd","csd.schedule_id = cs.schedule_id");
		$this->db->join("flight_attendant fa","fa.fa_id = csd.fa_id");
		
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	public function getFaId($id){
		$this->db->select("*");
		$this->db->from("crew_schedule_detail csd");
		$this->db->where("schedule_id",$id);
		$this->db->join("flight_attendant fa","fa.fa_id = csd.fa_id");
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	public function getFADriver($id){
		$sql = "select *
				from flight_attendant fa 
				WHERE fa.fa_id 
				NOT IN (
					SELECT dsc.fa_id
					FROM driver_schedule_detail dsc)
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	
	public function getDriverSchedule(){
		$this->db->select("*");
		$this->db->from("driver_schedule ds");
		$this->db->join("vehicle v","v.vehicle_id = ds.vehicle_id");
		$this->db->where("vehicle v","v.vehicle_id = ds.vehicle_id");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getDriverScheduleId($date, $id){
		$sql = "select ds.driver_schedule_id, cs.origin_code,cs.destination_code, cs.take_off_time as departs, v.description,
				v. vehicle_id,
				ds.pickup_time, count(csd.fa_id) as crew
				from driver_schedule ds
				inner join vehicle v ON v.vehicle_id = ds.vehicle_id
				inner join crew_schedule_detail csd ON csd.schedule_id = ds.schedule_id
				inner join crew_schedule cs ON cs.schedule_id = csd.schedule_id
				where ds.date = '".$date."' and driver_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	
	public function getDriverScheduleDetail($id){
		$sql = "select ds.driver_schedule_id, count(csd.fa_id) as crew, ds.date, cs.origin_code,cs.destination_code, cs.take_off_time as departs, v.description,
				v. vehicle_id,
				ds.pickup_time
				from driver_schedule ds
				inner join vehicle v ON v.vehicle_id = ds.vehicle_id
				inner join crew_schedule_detail csd ON csd.schedule_id = ds.schedule_id
				inner join crew_schedule cs ON cs.schedule_id = csd.schedule_id
				where  driver_schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getDriverPickUp($id){
		$sql = "select ds.driver_schedule_id, d.name, v.description as vehicle, v.vehicle_id as plat_number,
				CONCAT(cs.origin_code, ' at ', cs.date,' ',cs.take_off_time) as departure,  count(csd.fa_id) as total_crew, ds.duration
				from driver_schedule ds
				inner join driver d ON d.driver_id = ds.driver_id
				inner join vehicle v ON v.vehicle_id = ds.vehicle_id
				inner join crew_schedule_detail csd ON csd.schedule_id = ds.schedule_id
				inner join crew_schedule cs ON cs.schedule_id = csd.schedule_id
				where ds.driver_schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getDriverCrew($id){
		$sql = "select fa.name, fa.gender, fa.location
				from driver_schedule ds
				inner join crew_schedule_detail csd ON csd.schedule_id = ds.schedule_id
				inner join flight_attendant fa ON fa.fa_id = csd.fa_id
				where ds.driver_schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getScheduleApps($date){
		$sql = "select cs.schedule_id,cs.date, cs.flight_code, cs.origin_code, 		cs.take_off_time,cs.destination_code,cs.landing_time, cs.duration
				from crew_schedule cs
				where date = '".$date."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getScheduleAppsDetailSchedule($id){
		$sql = "select cs.schedule_id,cs.date, cs.flight_code, cs.origin_code, 		cs.take_off_time,cs.destination_code,cs.landing_time, cs.duration 
				from crew_schedule cs
				inner join pilot p ON p.pilot_id = cs.pilot_id
				inner join pilot pl ON pl.pilot_id = cs.co_pilot_id
				where cs.schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function ScheduleInf($id){
		$sql = "select p.name as pilot, pl.name as co_pilot,
				flight_code as aircraft,
				CONCAT(cs.origin_code, ' at ', cs.date,' ',cs.take_off_time) as departure,
				CONCAT(cs.destination_code, ' at ', cs.date,' ',cs.landing_time) as arrival, cs.duration

				from crew_schedule cs
				inner join pilot p ON p.pilot_id = cs.pilot_id
				inner join pilot pl ON pl.pilot_id = cs.co_pilot_id
				where cs.schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function ScheduleFA($id){
		$sql = "select fa.name, fa.nationality, fa.gender
				from crew_schedule cs
				inner join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
				inner join flight_attendant fa ON fa.fa_id = csd.fa_id
				where cs.schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function ScheduleTransport($id){
		$sql = "select d.name as driver, v.description, v.vehicle_id
				from crew_schedule cs
				inner join driver_schedule ds ON ds.schedule_id = cs.schedule_id
				inner join vehicle v ON v.vehicle_id = ds.vehicle_id
				inner join driver d ON d.driver_id = ds.driver_id
				where cs.schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getScheduleAppsFA($id){
		$sql = "select cs.schedule_id, d.name as driver_name, csd.occupation, cs.flight_code as flight_number
		from crew_schedule cs
		left join driver_schedule ds ON ds.schedule_id = cs.schedule_id
		left join driver d ON d.driver_id = ds.driver_id
		left join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
		where csd.fa_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getScheduleAcceptFA($id){
		$sql = "select cs.schedule_id,cs.date, cs.flight_code, cs.origin_code, 		cs.take_off_time,cs.destination_code,cs.landing_time, cs.duration 
				from crew_schedule cs
				left join pilot p ON p.pilot_id = cs.pilot_id
				left join pilot pl ON pl.pilot_id = cs.co_pilot_id
				left join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
				left join flight_attendant fa ON fa.fa_id = csd.fa_id
				where cs.schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getTulisanAtas($id){
		$sql = "select csd.occupation, cs.flight_code
				from crew_schedule cs
				inner join pilot p ON p.pilot_id = cs.pilot_id
				inner join pilot pl ON pl.pilot_id = cs.co_pilot_id
				inner join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
				inner join flight_attendant fa ON fa.fa_id = csd.fa_id
				where fa.fa_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function ScheduleFAAfterAccept($id){
		$sql = "select fa.name, fa.nationality, fa.gender, fa.location
				from crew_schedule cs
				inner join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
				inner join flight_attendant fa ON fa.fa_id = csd.fa_id
				where cs.schedule_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	
	public function reject($schedule_id, $fa_id, $feedback_reject){
		$dataArray = array(
						'feedback_reject' => $feedback_reject,
						'flag' => 2
					);
		$update = $this->db->update("crew_schedule_detail",$dataArray,array("fa_id" => $fa_id, "schedule_id" => $schedule_id));
		if($update){
			return true;
		}else{
			return false;
		} 
	}
	
	public function acceptFeedback($schedule_detail_id){
		$dataArray = array(
						'flag' => 4
					);
		$update = $this->db->update("crew_schedule_detail",$dataArray,array("schedule_detail_id" => $schedule_detail_id));
		if($update){
			return true;
		}else{
			return false;
		} 
	}
	
	public function declineFeedback($schedule_detail_id){
		$dataArray = array(
						'flag' => 1
					);
		$update = $this->db->update("crew_schedule_detail",$dataArray,array("schedule_detail_id" => $schedule_detail_id));
		if($update){
			return true;
		}else{
			return false;
		} 
	}
	
	public function pickupReport($id, $report){
		$dataArray = array(
						'report' => $report,
					);
		$update = $this->db->update("driver_schedule",$dataArray,array("driver_schedule_id" => $id));
		if($update){
			return true;
		}else{
			return false;
		} 
	}
	
	public function FaSendLocation($fa_id, $location){
		$dataArray = array(
						'location' => $location,
						//'flag' => 2
					);
		$update = $this->db->update("flight_attendant",$dataArray,array("fa_id" => $fa_id));
		if($update){
			return true;
		}else{
			return false;
		} 
	}
	
	public function FaCheckIn($fa_id, $location){
		$dataArray = array(
						'location' => $location,
						'status' => 4
					);
		$update = $this->db->update("flight_attendant",$dataArray,array("fa_id" => $fa_id));
		if($update){
			return true;
		}else{
			return false;
		} 
	}
	
	public function getScheduleAppsDriver($date){
		$sql = "select cs.schedule_id,cs.date, cs.flight_code, cs.origin_code,
				cs.take_off_time,cs.destination_code,cs.landing_time, cs.duration,
				v.vehicle_id,description, ds.pickup_time
				from crew_schedule cs
				inner join driver_schedule ds ON ds.schedule_id = cs.schedule_id
				inner join vehicle v ON v.vehicle_id = ds.vehicle_id
				where ds.date = '".$date."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getScheduleAppsDriverCrew($date, $id){
		$sql = "select count(csd.fa_id) as crew
				from crew_schedule cs
				inner join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
				inner join driver_schedule ds ON ds.schedule_id = cs.schedule_id
				inner join vehicle v ON v.vehicle_id = ds.vehicle_id
				where ds.date = '".$date."' and ds.driver_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getNotifOCC(){
		$sql = "select csd.schedule_detail_id, fa.name
				from crew_schedule_detail csd
				inner join flight_attendant fa ON fa.fa_id = csd.fa_id
				where csd.flag = '2'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getNotifOCCDetail($id){
		$sql = "select csd.schedule_detail_id, fa.name, cs.date,flight_code, origin_code, take_off_time, destination_code, landing_time, duration,
			 csd.feedback_reject
			from crew_schedule_detail csd
			inner join flight_attendant fa ON fa.fa_id = csd.fa_id
			inner join crew_schedule cs ON cs.schedule_id = csd.schedule_id
			where csd.schedule_detail_id  = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	
	public function getScheduleAppsPilot($pilot){
		$sql = "select cs.schedule_id, d.name as driver_name, CONCAT('pilot') as occupation, cs.flight_code as flight_number
				from crew_schedule cs
				left join driver_schedule ds ON ds.schedule_id = cs.schedule_id
				left join driver d ON d.driver_id = ds.driver_id
				left join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
				where cs.pilot_id = '".$pilot."' OR cs.co_pilot_id = '".$pilot."'
				GROUP BY cs.schedule_id
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getDriverNotif($id){
		$sql = "select cs.schedule_id, fa.name, fa.location
				from crew_schedule cs
				left join driver_schedule ds ON ds.schedule_id = cs.schedule_id
				left join driver d ON d.driver_id = ds.driver_id
				left join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
				left join flight_attendant fa ON fa.fa_id = csd.fa_id
				where ds.driver_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	public function getDriverJumlahCrew($id){
		$sql = "select count(fa.name) as crew
				from crew_schedule cs
				left join driver_schedule ds ON ds.schedule_id = cs.schedule_id
				left join driver d ON d.driver_id = ds.driver_id
				left join crew_schedule_detail csd ON csd.schedule_id = cs.schedule_id
				left join flight_attendant fa ON fa.fa_id = csd.fa_id
				where ds.driver_id = '".$id."'
				";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	
	
}