<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CheckInOuts extends CI_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('CheckInOut');
	}

	// redireccion a la pagina inicial
	public function debug()
	{

		$this->load->view('front_end/debug');

	}

	//con esta función abrimos el modal
	public function form_modal_agrega_hora() 
	{

		$this->load->view('front-end/form_modal_agrega_hora');
	}

	//con esta función insertaremos la entrada
	public function insertar_registro() 
	{
		//print_r($_POST);
		//redirect('/chequeo/debug', 'refresh');
		// recibo los posteos desde el modal form_modal_agregahora
		$ced  = $this->input->post('cedchkperson');
		$hrs  = time($this->input->post('horachkperson'));
		$diaU = $this->input->post('diachkperson');
			// separo el dato de la fecha para darle un formato que permita que la bd lo pueda reconocer y guardar
			list($day, $mes, $year) = explode("-", $diaU);
		$dia  = $year."-".$mes."-".$day;
		// datos para la auditoria de la base de datos
		$fec  = date('Y-m-d');
		$ope  = 'operador';

		/* creo una variable que me va a servir para comparar 
		 * lo posteado y poder guardarlo en bd correctamente
		 * o mejor dicho, de una manera mas intuitiva
		 */
		$reg = $this->input->post('posteo');

		// primero verifico si ya se creo una entrada en la misma fecha
		$consulta = $this->Chequeo_model->consultar_registro_repetido($ced,$dia,$reg);

		if($consulta == 'nada') {

			// luego y si no hubo una entrada, inserto los datos de la entrada en si
			$insertar_entrada = $this->Chequeo_model->insertarRegistro($ced,$dia,$hrs,$reg,$fec,$ope);
			
			if ($insertar_entrada == 'error') {
				
				$this->session->set_flashdata('error', 'Ya se ha registrado una '.$reg.' Anteriormente..! <br> Por favor verifique.');
				redirect('main/index', 'refresh');
			
			 } elseif ($insertar_entrada == 'correcto') {
				
				$this->session->set_flashdata('correcto', 'La '.$reg.' se Registro Correctamente!');
				redirect('main/index', 'refresh');
			
			}
		} else {

			// realizo el recorrido de los datos q traigo de la bd
			foreach ($consulta as $r) {
				$cedconsult = $r->cedchkperson;
				$diaconsult = $r->diachkperson;
				$regconsult = $r->registrochk;		
			}

			// verifico si ya hay una entrada
			if ($regconsult == $reg) {

				// si existe un registro de entrada previo hecho en este mismo dia entonces le informo del error al usuario		
				$this->session->set_flashdata('error', 'Ya se ha registrado una '.$reg.'<br> Por favor verifique.');
				redirect('main/index', 'refresh');
			
			 } else {

			 	// luego y si no hubo una entrada, inserto los datos de la entrada en si
				$insertar_entrada = $this->Chequeo_model->insertarRegistro($ced,$dia,$hrs,$reg,$fec,$ope);
				
				if ($insertar_entrada == 'error') {
					
					$this->session->set_flashdata('error', 'Ya se ha registrado una '.$reg.' Anteriormente..! <br> Por favor verifique.');
					redirect('main/index', 'refresh');
				
				 } elseif ($insertar_entrada == 'correcto') {
					
					$this->session->set_flashdata('correcto', 'La '.$reg.' se Registro Correctamente!');
					redirect('main/index', 'refresh');
				
				}
				
			}
		}

	}

}
