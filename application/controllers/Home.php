<?php
date_default_timezone_set("America/Lima");
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
		$this->load->model('User');
		$Usermodel = $this->User;

		if(!$Usermodel->is_logged_in())
		{
			redirect('login');
		}

		$this->load->model('Employed');
		$model = $this->Employed;

		$inputs = array('date_inout' => 0);

		$report_data = $model->getData($inputs);

		$tabular_data = array();
		foreach($report_data as $row)
		{
			$tabular_data[] = $this->security->xss_clean(array(
				'idperson' => $row->idperson,
				'dni' => $row->dni,
				'name' => $row->name,
				'gender' => $row->gender,
				'email' => $row->email,
				'daycheck' => $row->daycheck,
				'hourcheck' => $row->hourcheck,
				'eventcheck' => $row->eventcheck
			));
		}

		$data = array(
			'title' => 'Reporte de Marcaje',
			'subtitle' => $this->_get_subtitle(array('date_inout' => 0)),
			'content' => 'home',
			'headers' => $this->security->xss_clean($model->getDataColumns()),
			'data' => $tabular_data,
			'summary_data' => $this->security->xss_clean($model->getSummaryData($inputs))
		);
		$this->load->view("admin/templates/index",$data);
	}

	public function logout()
	{
		$this->User->logout();
	}

	private function _get_subtitle($inputs)
	{
		$subtitle = "<b><u>Parámetros:</u></b> <br>";

		if(isset($inputs['date_inout']))
		{
			if($inputs['date_inout'] == 0)
			{
				$subtitle .= "<b>Fecha:</b> ".date('Y-m-d')." <br>";
			}
			else
			{
				$subtitle .= '<b>Fecha:</b> '.$inputs['date_inout'].' <br>';
			}
		}

		return $subtitle;

	}
}