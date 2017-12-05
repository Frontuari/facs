<?php
date_default_timezone_set("America/Lima");
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('Employed');
	}

	public function index()
	{
		$data['title'] = 'Empleados';
		$data['path'] = 'employeed';
		$data['content'] = 'employee';
		$data['employees'] = $this->Employed->get_all();
		$this->load->view('admin/templates/index',$data);
	}

	public function edit($idperson){
		$data['title'] = 'Editar Empleados';
		$data['path'] = 'employeed';
		$data['content'] = 'form';
		$data['action'] = 'edit';
		$data['employees'] = $this->Employed->get_info($idperson);
		$this->load->view('admin/templates/index',$data);	
	}

	public function remove($idperson,$status){
		$employee_data = array(
			'status' => ($status=="Y" ? "ACTIVO" : "INACTIVO"),
			'iduser' => $this->User->get_logged_in_user_info()
		);

		if($this->Employed->remove($employee_data,$idperson))
		{
			$employee_data = $this->security->xss_clean($employee_data);
			if($status=="ACTIVO")
			{
				$this->session->set_flashdata('msg', '¡Empleado activado correctamente!');
			}
			else
			{
				$this->session->set_flashdata('msg', '¡Empleado desactivado correctamente!');
			}
			redirect('employees');
		}
	}

	public function add(){
		$data['title'] = 'Registrar Empleado';
		$data['path'] = 'employeed';
		$data['content'] = 'form';
		$data['action'] = 'add';
		$data['employees'] = $this->Employed->get_info(-1);
		$this->load->view('admin/templates/index',$data);	
	}

	public function save($idperson = -1){

		$this->form_validation->set_rules('name', 'Nombres y Apellidos', 'required');
		$this->form_validation->set_rules('dni', 'DNI', 'required|callback_dniunique');
		$this->form_validation->set_rules('gender', 'Género', 'required');
		$this->form_validation->set_rules('email', 'Correo Electrónico', 'required');
		$this->form_validation->set_rules('passwd', 'Contraseña', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE)
		{
			if($this->input->post('event')=="add")
			{
				$data['title'] = 'Registrar Empleado';
			}
			else
			{
				$data['title'] = 'Editar Empleado';
			}
			$data['path'] = 'employeed';
			$data['content'] = 'form';
			$data['action'] = $this->input->post('event');
			$data['employees'] = $this->Employed->get_info($idperson);
			$this->load->view('admin/templates/index',$data);
		}
		else
		{
			$this->load->library('encrypt');
			$employee_data = array(
				'dni' => $this->input->post('dni'),
				'name' => $this->input->post('name'),
				'passwd' => $this->encrypt->encode($this->input->post('passwd')),
				'gender' => $this->input->post('gender'),
				'birthday' => $this->input->post('birthday'),
				'place_birth' => $this->input->post('place_birth'),
				'email' => $this->input->post('email'),
				'level_education' => $this->input->post('level_education'),
				'charge' => $this->input->post('charge'),
				'phone_number' => $this->input->post('phone_number'),
				'mobile_phone' => $this->input->post('mobile_phone'),
				'address' => $this->input->post('address'),
				'status' => ($this->input->post('status')=="Y" ? "ACTIVO" : "INACTIVO"),
				'dateperson' => date('Y-m-d'),
				'iduser' => $this->User->get_logged_in_user_info()
			);

			if($this->Employed->save($employee_data, $idperson))
			{
				$employee_data = $this->security->xss_clean($employee_data);
				$this->session->set_flashdata('msg', '¡Empleado guardado correctamente!');
				redirect('employees');
			}
			else
			{
				if($this->input->post('event')=="add")
				{
					$data['title'] = 'Registrar Empleado';
					$this->session->set_flashdata('msg', '¡Ocurrió un error al registrar el Empleado!');
				}
				else
				{
					$data['title'] = 'Editar Empleado';
					$this->session->set_flashdata('msg', '¡Ocurrió un error al registrar el Empleado!');
				}
				$data['path'] = 'employeed';
				$data['content'] = 'form';
				$data['action'] = $this->input->post('event');
				$data['employees'] = $this->Employed->get_info($idperson);
				$this->load->view('admin/templates/index',$data);
			}
		}
	}

	public function dniunique($dni)
	{
		if($this->input->post('dni')!=$dni)
		{
			if($this->Employed->dni_exists($dni))
			{
				$this->form_validation->set_message('dniunique', '¡El DNI '.$dni.' ya esta registrado!');

				return FALSE;
			}
		}

		return TRUE;		
	}
}