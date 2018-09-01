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

		public function addstudentp()
		{
			$data = array(
				'page_title'    => 'Student Portfolio',
				'form_action'   => 'Enter/submit',
				'form'          => array(
					'student_name'         => array(
						'type'          => 'student_name',
						'placeholder'   => 'student_name',
						'name'          => 'student_name',
						'id'            => 'input-student_name'
					),
					'student_surname'         => array(
						'type'          => 'student_surname',
						'placeholder'   => 'student_surname',
						'name'          => 'student_surname',
						'id'            => 'input-student_surname'
					),
					'course_name'      => array(
						'type'          => 'course_name',
						'placeholder'   => 'course_name',
						'name'          => 'course_name',
						'id'            => 'input-course_name'
					),
					'course_level'      => array(
						'type'          => 'course_level',
						'placeholder'   => 'course_level',
						'name'          => 'course_level',
						'id'            => 'input-course_level'
					),
					'stud_link'      => array(
						'type'          => 'stud_link',
						'placeholder'   => 'stud_link',
						'name'          => 'stud_link',
						'id'            => 'input-stud_link'
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
			public function studentp_submit()
			{
				# 1. Check the form for validation errors
				if ($this->fv->run('studentp') === FALSE)
				{
					echo validation_errors();
					return;
				}

				# 2. Retrieve the data for checking
				$student_name      = $this->input->post('student_name');
				$student_surname   = $this->input->post('student_surname');
				$course_name   = $this->input->post('course_name');
		#
				$id = $this->system->add_studentp($student_name, $student_surname, $course_name, $course_level, $stud_link);

				$check = $this->system->studentp($student_name, $student_surname, $course_name, $course_level, $stud_link);

			if ($check === FALSE)
			{
				$this->system->delete_studentp($id);
				echo "We couldn't register the  Student Portfolio because of a database error.";
				return;
			}


			redirect('/');
		}
		}

	}
}
