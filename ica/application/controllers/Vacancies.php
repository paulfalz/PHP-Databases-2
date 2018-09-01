<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancies extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('templates/top');
		$this->load->view('vacancies');
		$this->load->view('templates/bottom');

		public function add_vacancy()
		{
			$data = array(
				'page_title'    => 'Vancancy',
				'form_action'   => 'Enter/submit',
				'form'          => array(

					'job_place'         => array(
						'type'          => 'job_place',
						'placeholder'   => 'job_place',
						'name'          => 'job_place',
						'id'            => 'input-job_place'
					),
					'job_subject'      => array(
						'type'          => 'job_subject',
						'placeholder'   => 'job_subject',
						'name'          => 'job_subject',
						'id'            => 'input-job_subject'
					),
					'job_type'      => array(
						'type'          => 'job_type',
						'placeholder'   => 'job_type',
						'name'          => 'job_type',
						'id'            => 'input-job_type'
					)

				),
				'buttons'       => array(
					'submit'        => array(
						'type'          => 'submit',
						'content'       => 'Enter'
					)
				)
			);

			$this->load->view('system/form', $data);

		# canc lect submit
			public function Vacancy_submit()
			{
				# 1. Check the form for validation errors
				if ($this->fv->run('Vacancy') === FALSE)
				{
					echo validation_errors();
					return;
				}

				# 2. Retrieve the data for checking
				$job_place    = $this->input->post('job_place');
				$job_subject     = $this->input->post('job_subject');
				$job_type   = $this->input->post('job_type');
		#
				$id = $this->system->add_vacancy($job_place, $job_subject, $job_type);

			$check = $this->system->Vacancy($job_place, $job_subject, $job_type);

			if ($check === FALSE)
			{
				$this->system->delete_Vacancy($id);
				echo "We couldn't register the  Vacancy because of a database error.";
				return;
			}


			redirect('/');
		}
		}
	}
}
