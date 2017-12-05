<?php
date_default_timezone_set("America/Lima");
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('Main_model');
	}

	// redireccion del index para codeigniter
	public function index() 
	{

		$now = date('Y-m-d');
		$dia = $this->Main_model->consultarUltFecha();

		if (date($now) < date($dia)) {

			// redireccion a la pagina de error en caso de darse un 400 o 500
			$this->load->view('plantillas/front_end/error_view');

		} else {
			
			// redireccion a la pagina inicial
			$this->load->view('plantillas/front_end/main_view');
		}
	}

	//con esta función abrimos el modal
	public function form_modal_agrega_hora() 
	{

		$this->load->view('front-end/form_modal_agrega_hora');
	}

	//con esta función insertaremos la entrada
	public function insertar_registro() 
	{
		// recibo los posteos desde el modal form_modal_agregahora
		$ced  = $this->input->post('cedchkperson');
		$hrs  = time($this->input->post('horachkperson'));
		$diaU = $this->input->post('diachkperson');
		//	cargo la libreria encrypt
		$this->load->library('encrypt');
		//	guardo la contraseña encriptada para enviar a la base de datos
		$passwd = $this->encrypt->encode($this->input->post('password'));
		// separo el dato de la fecha para darle un formato que permita que la bd lo pueda reconocer y guardar
		list($day, $mes, $year) = explode("-", $diaU);
		$dia  = $year."-".$mes."-".$day;
		// datos para la auditoria de la base de datos
		$fec  = date('Y-m-d');
		$ope  = '2'; //	Usuario operador

		/* creo una variable que me va a servir para comparar 
		 * lo posteado y poder guardarlo en bd correctamente
		 * o mejor dicho, de una manera mas intuitiva
		 */
		$reg = $this->input->post('posteo');

		// primero verifico si ya se creo una entrada en la misma fecha
		$consulta = $this->Main_model->consultar_registro_repetido($ced,$dia,$reg);
		if($consulta[0] == 'nada') {

			// luego y si no hubo una entrada, inserto los datos de la entrada en si
			$insertar_entrada = $this->Main_model->insertarRegistro($ced,$dia,$hrs,$reg,$fec,$ope);
			
			if ($insertar_entrada == 'error') {
				
				$this->session->set_flashdata('mensaje', 'Ya se ha registrado una '.$reg.' anteriormente..! <br> Por favor verifique.');
				redirect('main/index');
			
			 } elseif ($insertar_entrada == 'correcto') {
				
				$this->session->set_flashdata('mensaje', 'La '.$reg.' se registro correctamente!');
				redirect('main/index');
			
			}elseif($insertar_entrada == 'error' & $reg == 'SALIDA'){
				$this->session->set_flashdata('mensaje', 'No puede Registrar una '.$reg.' Sin Realizar una Entrada..! <br> Por favor verifique.');
				redirect('main/index');
			}

		} 
		else if($consulta[1] == 'error'){
			$this->session->set_flashdata('mensaje', 'No es posible registrar la SALIDA, antes debe registrar una ENTRADA! <br> Por favor verifique.');
			redirect('main/index');
		}
		else {

			// realizo el recorrido de los datos q traigo de la bd
			foreach ($consulta as $r) {
				$cedconsult = $r->dni;
				$diaconsult = $r->daycheck;
				$regconsult = $r->eventcheck;
			}
			// verifico si ya hay una entrada
			if ($regconsult == $reg) {
				// si existe un registro de entrada previo hecho en este mismo dia entonces le informo del error al usuario		
				$this->session->set_flashdata('mensaje', 'Ya se ha registrado una '.$reg.'<br> Por favor verifique.');
				redirect('main/index');
			
			 } else {
			 	// luego y si no hubo una entrada, inserto los datos de la entrada en si
				$insertar_entrada = $this->Main_model->insertarRegistro($ced,$dia,$hrs,$reg,$fec,$ope);
				
				if ($insertar_entrada == 'error') {
					
					$this->session->set_flashdata('mensaje', 'Ya se ha registrado una '.$reg.' anteriormente..! <br> Por favor verifique.');
					redirect('main/index');
				
				 } elseif ($insertar_entrada == 'correcto') {
					
					$this->session->set_flashdata('mensaje', 'La '.$reg.' se registro correctamente!');
					redirect('main/index');
				
				}
				
			}
		}

	}
	//	comprobamos si el usuario y la clave son validos
	public function check_employeed()
	{
		$this->load->library('encrypt');
		/*
		Encode the password with library encrypt of CI
		*/
		$dniperson = $this->input->post('cedchkperson');
		$password = $this->encrypt->encode($this->input->post('passwd'));

		if(!$this->Main_model->login($dniperson, $password))
		{
			echo json_encode(array('valid' => false));
		}
		else{
			echo json_encode(array('valid' => true));
		}
	}

}
