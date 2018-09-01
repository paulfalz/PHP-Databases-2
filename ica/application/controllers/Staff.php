<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

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
		$this->load->view('staff');
		$this->load->view('templates/bottom');

		public function add_staff()
		{
			$data = array(
				'page_title'    => 'Staff',
				'form_action'   => 'Enter/submit',
				'form'          => array(
					'staff_name'         => array(
						'type'          => 'staff_name',
						'placeholder'   => 'staff_name',
						'name'          => 'staff_name',
						'id'            => 'input-staff_name'
					),
					'staff_surname'         => array(
						'type'          => 'staff_surname',
						'placeholder'   => 'staff_surname',
						'name'          => 'staff_surname',
						'id'            => 'input-staff_surname'
					),
					'staff_subject'      => array(
						'type'          => 'staff_subject',
						'placeholder'   => 'staff_subject',
						'name'          => 'staff_subject',
						'id'            => 'input-staff_subject'
					),
					'staff_email'      => array(
						'type'          => 'staff_email',
						'placeholder'   => 'staff_email',
						'name'          => 'staff_email',
						'id'            => 'input-staff_email'
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
			public function staff_submit()
			{
				# 1. Check the form for validation errors
				if ($this->fv->run('staff') === FALSE)
				{
					echo validation_errors();
					return;
				}

				# 2. Retrieve the data for checking
				$staff_name      = $this->input->post('staff_name');
				$staff_surname   = $this->input->post('staff_surname');
				$staff_subject   = $this->input->post('staff_subject');
		#
				$id = $this->system->add_staff($staff_name, $staff_surname, $staff_subject, $staff_email);

				$check = $this->system->staff($staff_name, $staff_surname, $staff_subject, $staff_email);

			if ($check === FALSE)
			{
				$this->system->delete_staff($id);
				echo "We couldn't register the  Student Portfolio because of a database error.";
				return;
			}


			redirect('/');
		}
		}

	}
}
