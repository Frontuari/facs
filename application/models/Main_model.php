<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	
	public function __construct() 
	{
		parent::__construct();
	}

	public function consultarUltFecha() 
	{

		$lastid = $this->db->query('SELECT MAX(idinout) AS maxid FROM tbinout')->row()->maxid;

		$this->db->where('idinout',$lastid);
		$query = $this->db->get('tbinout');
		
		if($query->num_rows() == 0) {
			$dia ='';
			return $dia;
		 } else {
			foreach ($query->result() as $r) {
				$dia = $r->daycheck;
			}
			return $dia;
		}
	}
	
	public function consult_persons() 
	{
		$this->db->select('dni,name');
		$query = $this->db->get('tbperson');
		if($query->num_rows() >= 1) {
			return $query;
		}else{
			return 'No hay Coincidencias';
		}
	}

	//consultar si hay una entrada o una salida
	public function consultar_registro_repetido($ced,$dia,$reg)
	{

		if($reg=="SALIDA"){
			$query = $this->db->query("SELECT * FROM tbinout io 
			INNER JOIN tbperson p ON io.idperson = p.idperson 
			WHERE p.dni = '$ced' AND io.daycheck = '$dia' AND io.eventcheck = 'ENTRADA'");
			if($query->num_rows() == 0)
			{
				return array('1' => 'error');	
			}
		}

		$this->db->select('tbperson.dni,tbinout.daycheck,tbinout.eventcheck');
		$this->db->from('tbinout');
		$this->db->join('tbperson','tbperson.idperson = tbinout.idperson');
		$this->db->where('tbperson.dni',$ced);
		$this->db->where('tbinout.daycheck',$dia);
		$this->db->where('tbinout.eventcheck',$reg);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {

            foreach ($query->result() as $fila) {
                $datos[] = $fila;
            }
            
            return $datos;

        } else {

            return array('0' => 'nada');

        }
	}

	//insercion de registros
	public function insertarRegistro($ced,$dia,$hrs,$reg,$fec,$ope) 
	{

		$idperson = $this->db->query("SELECT idperson FROM tbperson WHERE dni = '".$ced."'")->row()->idperson;

		$data = array(
			'idperson' => $idperson,
			'daycheck' => $dia,
			'hourcheck'=> $hrs,
			'eventcheck'=> $reg,
			'date_inout' => $fec,
			'iduser'	 => $ope
			);

		if(!$this->db->insert('tbinout',$data)) {

			return 'error';

		} else {

			return 'correcto';

		}

	}

	public function login($dni, $password)
	{
		$query = $this->db->query("SELECT * FROM tbperson WHERE status = 'ACTIVO' AND dni = '$dni' LIMIT 1");

		if($query->num_rows() == 1)
		{
			$row = $query->row();

			// compare passwords 
			$this->load->library('encrypt');

			if ($this->encrypt->decode($password) == $this->encrypt->decode($row->passwd))
			{
				return TRUE;
			}
		}

		return FALSE;
	}

}