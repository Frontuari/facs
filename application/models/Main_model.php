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
		$this->db->select('tbperson.dni,tbinout.daycheck,tbinout.eventcheck');
		$this->db->from('tbinout');
		$this->db->join('tbperson','tbperson.idperson = tbinout.idperson');
		$this->db->where('tbperson.dni',$ced);
		$this->db->where('tbinout.daycheck',$dia);
		$this->db->where('tbinout.eventcheck',$reg);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {

            foreach ($query->result() as $fila) {
                $datos[] = $fila;
            }
            
            return $datos;

        } else {

            return 'nada';

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

}