<?php
class User extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	/*
	Determines if a given iduser is an user
	*/
	public function exists($iduser)
	{
		$query = $this->db->query("SELECT * FROM tbuser WHERE iduser = $iduser");

		return ($query->num_rows() == 1);
	}
	/*
	Attempts to login user and set session. Returns boolean based on outcome.
	*/
	public function login($username, $password)
	{
		$query = $this->db->query("SELECT * FROM tbuser WHERE status = '1' AND (LOWER(name) = LOWER('$username') OR LOWER(email) = LOWER('$username')) LIMIT 1");

		if($query->num_rows() == 1)
		{
			$row = $query->row();

			// compare passwords 
			$this->load->library('encrypt');

			if ($this->encrypt->decode($password) == $this->encrypt->decode($row->passwd))
			{
				$this->session->set_userdata('iduser', $row->iduser);

				return TRUE;
			}

		}

		return FALSE;
	}
	public function get_logged_in_user_info()
	{
		return $this->session->userdata('iduser');
	}

	/*
	Determins if a user is logged in
	*/
	public function is_logged_in()
	{
		return ($this->session->userdata('iduser') != FALSE);
	}
	/*
	Logs out a user by destorying all session data and redirect to login
	*/
	public function logout()
	{
		$this->session->sess_destroy();

		redirect('login');
	}
	/*
	Inserts or updates a user
	*/
	public function save(&$user_data, $iduser = -1)
	{
		if($iduser == -1 || !$this->exists($iduser))
		{
			$this->db->trans_start();

			//	Generating Insert SQL
			$sql = "INSERT INTO tbuser (";
			//	Add Column into Insert SQL
			foreach ($user_data as $column => $value) {
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
			foreach ($user_data as $column => $value) {
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
		$sql = "UPDATE tbuser SET ";
		//	Add Column into Insert SQL
		foreach ($user_data as $column => $value) {
			if($value != -1)
			{
				$sql.="$column='$value',";
			}
		}
		//	Remove last comma ( , )
		$sql=substr($sql,0,-1);
		$sql.=" WHERE iduser = $iduser";

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
	public function remove(&$user_data, $iduser)
	{
		$this->db->trans_start();
		//	Generating Update SQL
		$sql = "UPDATE tbuser SET ";
		//	Add Column into Insert SQL
		foreach ($user_data as $column => $value) 
		{
			if($value != -1)
			{
				$sql.="$column='$value',";
			}
		}
		//	Remove last comma ( , )
		$sql=substr($sql,0,-1);
		$sql.=" WHERE iduser = $iduser";

		$query = $this->db->query($sql);

		$this->db->trans_complete();

		if ($this->db->trans_status() === TRUE)
		{
			return TRUE;
		}

		return FALSE;
	}
}