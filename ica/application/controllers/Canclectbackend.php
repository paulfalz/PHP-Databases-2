<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Canclectbackend extends CI_Controller {

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
		$this->load->view('canclectbackend');


    $data = array();
    if($query = $this->CancLect_Model->get_records()){
      $data['records'] = $query;
    }
      $arr = $_SERVER['REQUEST_URI'];
      if (preg_match('#[0-9]#',$arr)){
        $questionmark = explode('?', $arr);
        $number = $questionmark[1];
        if(is_numeric ($number)){
          $this->load->view('editcanclectbackend');
        }else{
          //LOAD TABLE (because ? without no ?id)
          $this->load->view('tbl_canclect',$data);
        }
      }else{
          //LOAD TABLE (becuase there is no ?id)
          $this->load->view('tbl_canclect',$data);
	}
}
	function create()
	  {
	    $data = array(
	      'staff_name' => $this->input->post('staff_name'),
	      'staff_surname' => $this->input->post('staff_surname'),
		  'course_name' => $this->input->post('course_name'),
		  'course_level' => $this->input->post('course_level'),
		  'course_group' => $this->input->post('course_group'),
		  'course_subname' => $this->input->post('course_subname'),
		  'les_time' => $this->input->post('les_time'),
		  'les_date' => $this->input->post('les_date')

	    );

	    $this->CancLect_Model->add_record($data);
	    $this->index();
	  }

	  function update(){
	    $id = $this->input->post('id'); // send id to model
	      $data['staff_name'] = $this->input->post('staff_name');
	      $data['staff_surname'] = $this->input->post('staff_surname');
		  $data['course_name'] = $this->input->post('course_name');
		  $data['course_level'] = $this->input->post('course_level');
		  $data['course_group'] = $this->input->post('course_group');
		  $data['course_subname'] = $this->input->post('course_subname');
		  $data['les_time'] = $this->input->post('les_time');
		  $data['les_date'] = $this->input->post('les_date');
	    $this->CancLect_Model->update_record($data, $id);
	  }

	  function delete()
	  {
	    $this->CancLect_Model->delete_row();
	    $this->index();
	  }
	  // Function to Fetch selected record from database.
	  function show_canclect_id() {
	  $id = $this->uri->segment(3);
	  $data['tbl_canclect'] = $this->CancLect_Model->show_canclect();
	  $data['single_canclect'] = $this->CancLect_Model->show_canclect_id($id);
	  $this->load->view('deletecanclectbackend', $data);
	  }
	  // Function to Delete selected record from database.
	  function delete_canclect_id() {
	  $id = $this->uri->segment(3);
	  $this->delete_model->delete_canclect_id($id);
	  $this->show_canclect_id();
	  }
}
?>
