<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CheckInOut extends CI_Model {
	
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
				$dia = $r->diachkprof;
			}
			return $dia;
		}
	}
	
	public function consult_profesores() 
	{
		$this->db->select('cedulaprof,apenomprof');
		$this->db->limit(5);
		$query = $this->db->get('tbprofe');
		if($query->num_rows() >= 1) {
			return $query;
		}else{
			return 'No hay Coincidencias';
		}
	}

	//consultar si hay una entrada o una salida
	public function consultar_registro_repetido($ced,$dia,$reg)
	{
		$this->db->select('cedchkprof,diachkprof,registrochk');
		$this->db->where('cedchkprof',$ced);
		$this->db->where('diachkprof',$dia);
		$this->db->where('registrochk',$reg);
		$query = $this->db->get('tbinout');
		
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

		$data = array(
			'cedchkprof' => $ced,
			'diachkprof' => $dia,
			'horachkprof'=> $hrs,
			'registrochk'=> $reg,
			'fechainout' => $fec,
			'operador'	 => $ope
			);

		if(!$this->db->insert('tbinout',$data)) {

			return 'error';

		} else {

			return 'correcto';

		}

	}

}