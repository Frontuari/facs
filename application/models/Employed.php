<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("reports/Report.php");
class Employed extends Report 
{
	public function __construct()
	{
		parent::__construct();
	}

	/*
	*	Method for Reports
	*/
	public function getDataColumns()
	{
		return array(
			array('idperson' => 'ID'),
			array('dni' => 'DNI'),
			array('name' => 'Nombres y Apellidos'),
			array('gender' => 'Género'),
			array('email' => 'Correo Electrónico'),
			array('daycheck' => 'Fecha Marcaje'),
			array('hourcheck' => 'Hora Marcaje'),
			array('eventcheck' => 'Tipo Marcaje')
		);
	}
	
	public function getData(array $inputs)
	{

		$clauseWhere = ($inputs['date_inout']==0 ? 'WHERE i.date_inout = CURDATE()' : "WHERE i.date_inout = '".$inputs['date_inout']."'");

		$query = $this->db->query("SELECT
				i.idperson,p.dni,p.name,CASE p.gender WHEN 'F' THEN 'Femenino' ELSE 'Masculino' END AS gender,
				p.email,i.daycheck,i.hourcheck,i.eventcheck 
			FROM tbperson p  
			INNER JOIN tbinout i ON p.idperson = i.idperson 
				$clauseWhere 
			ORDER BY i.daycheck,i.hourcheck ASC");

		return $query->result();
	}
	
	public function getSummaryData(array $inputs)
	{
		return array();
	}

	/*
	Gets information about one service
	*/
	public function get_info($idperson)
	{
		$query = $this->db->query("SELECT idperson,dni,name,passwd,gender,birthday,place_birth,email,
		level_education,charge,phone_number,mobile_phone,address,status,dateperson,iduser 
		FROM tbperson WHERE idperson = $idperson");

		if($query->num_rows() == 1)
		{
			$person_obj = $query->row();

			return $person_obj;
		}
		else
		{
			//append those fields to base parent object, we we have a complete empty object
			$person_obj = new stdClass;
			//Get all the fields from tbperson table
			$query = $this->db->query("SELECT * FROM tbperson");
			foreach($query->list_fields() as $field)
			{
				$person_obj->$field = '';
			}

			return $person_obj;
		}
	}

	/*
	Gets information about all person
	*/
	public function get_all()
	{
		$query = $this->db->query("SELECT * FROM tbperson ORDER BY idperson,dni ASC");

		return $query->result();
	}

	/*
	Determines if a given idperson is an user
	*/
	public function exists($idperson)
	{
		$query = $this->db->query("SELECT * FROM tbperson WHERE idperson = $idperson");

		return ($query->num_rows() == 1);
	}

	/*
	Determines if a given idperson is an user
	*/
	public function dni_exists($dni)
	{
		$query = $this->db->query("SELECT * FROM tbperson WHERE dni = '".$dni."'");

		return ($query->num_rows() == 1);
	}
	/*
	Inserts or updates a user
	*/
	public function save(&$person_data, $idperson = -1)
	{
		if($idperson == -1 || !$this->exists($idperson))
		{
			$this->db->trans_start();

			//	Generating Insert SQL
			$sql = "INSERT INTO tbperson (";
			//	Add Column into Insert SQL
			foreach ($person_data as $column => $value) {
				echo $value."<br>";
				if($value != -1)
				{
					$sql.="$column,";
				}
			}
			//	Remove last comma ( , )
			$sql=substr($sql,0,-1);
			$sql.=") VALUES (";
			//	Add Values into Insert SQL
			foreach ($person_data as $column => $value) {
				if($value != -1)
				{
					$sql.="'$value',";
				}
			}
			//	Remove last comma ( , )
			$sql=substr($sql,0,-1);
			$sql.=")";

			$query = $this->db->query($sql);

			$this->db->trans_complete();

			if ($this->db->trans_status() === TRUE)
			{
				return TRUE;
			}

			return FALSE;
		}

		$this->db->trans_start();

		//	Generating Update SQL
		$sql = "UPDATE tbperson SET ";
		//	Add Column into Insert SQL
		foreach ($person_data as $column => $value) {
			if($value != -1)
			{
				$sql.="$column='$value',";
			}
		}
		//	Remove last comma ( , )
		$sql=substr($sql,0,-1);
		$sql.=" WHERE idperson = $idperson";

		$query = $this->db->query($sql);

		$this->db->trans_complete();

		if ($this->db->trans_status() === TRUE)
		{
			return TRUE;
		}

		return FALSE;
	}
	/*
	Updates a active/inactive user
	*/
	public function remove(&$person_data, $idperson)
	{
		$this->db->trans_start();
		//	Generating Update SQL
		$sql = "UPDATE tbperson SET ";
		//	Add Column into Insert SQL
		foreach ($person_data as $column => $value) 
		{
			if($value != -1)
			{
				$sql.="$column='$value',";
			}
		}
		//	Remove last comma ( , )
		$sql=substr($sql,0,-1);
		$sql.=" WHERE idperson = $idperson";

		$query = $this->db->query($sql);

		$this->db->trans_complete();

		if ($this->db->trans_status() === TRUE)
		{
			return TRUE;
		}

		return FALSE;
	}
}