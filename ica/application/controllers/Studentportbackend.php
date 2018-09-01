<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentportbackend extends CI_Controller {

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
		$this->load->view('studentportbackend');

	$data = array();
		if($query = $this->Studentp_Model->get_records()){
		  $data['records'] = $query;
		}
		  $arr = $_SERVER['REQUEST_URI'];
		  if (preg_match('#[0-9]#',$arr)){
			$questionmark = explode('?', $arr);
			$number = $questionmark[1];
			if(is_numeric ($number)){
			  $this->load->view('editstudentp');
			}else{
			  //LOAD TABLE (because ? without no ?id)
			  $this->load->view('tbl_portfolio',$data);
			}
		  }else{
			  //LOAD TABLE (becuase there is no ?id)
			  $this->load->view('tbl_portfolio',$data);
		  }

	  } // end index

	  function create()
	  {
		$data = array(
		  'student_name' => $this->input->post('student_name'),
		  'student_surname' => $this->input->post('student_surname'),
		  'course_name' => $this->input->post('course_name'),
		  'course_level' => $this->input->post('course_level'),
		  'stud_link' => $this->input->post('stud_link')
		);

		$this->Studentp_Model->add_record($data);
		$this->index();
	  }

	  function update(){
		$id = $this->input->post('id'); // send id to model
		  $data['student_name'] = $this->input->post('student_name');
		  $data['student_surname'] = $this->input->post('student_surname');
		  $data['course_name'] = $this->input->post('course_name');
		  $data['course_level'] = $this->input->post('course_level');
		  $data['stud_link'] = $this->input->post('stud_link');
		$this->Studentp_Model->update_record($data, $id);
	  }




	  function delete()
	  {
		$this->Studentp_Model->delete_row();
		$this->index();
	  }

	  // Function to Fetch selected record from database.
	  function show_studentp_id() {
	  $id = $this->uri->segment(3);
	  $data['tbl_portfolio'] = $this->Studentp_Model->show_studentp();
	  $data['single_student'] = $this->Studentp_Model->show_studentp_id($id);
	  $this->load->view('deletestudentp', $data);
	  }
	  // Function to Delete selected record from database.
	  function delete_studentp_id() {
	  $id = $this->uri->segment(3);
	  $this->Studentp_Model->delete_studentp_id($id);
	  $this->show_studentp_id();
  	  }
}
?>
