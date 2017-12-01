<?php
date_default_timezone_set("America/Caracas");
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// redireccion del index para codeigniter
	public function index() 
	{
		if($this->User->is_logged_in())
		{
			redirect('home');
		}
		else
		{
			$this->form_validation->set_rules('username', 'Usuario o Email', 'callback_login_check');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run() == FALSE)
			{
				$data['title'] = 'Inicio de Sesión';
				$this->load->view('admin/login',$data);
			}
			else
			{
				redirect('home');
			}
		}
	}

	public function login_check($username)
	{
		$this->load->library('encrypt');
		/*
		Encode the password with library encrypt of CI
		*/
		$password = $this->encrypt->encode($this->input->post('password'));

		if(!$this->User->login($username, $password))
		{
			$this->form_validation->set_message('login_check', 'Usuario/Contraseña invalido ');

			return FALSE;
		}

		return TRUE;		
	}

}
