<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffbackend extends CI_Controller {

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
		$this->load->view('staffbackend');


    $data = array();
    if($query = $this->Staff_Model->get_records()){
      $data['records'] = $query;
    }
      $arr = $_SERVER['REQUEST_URI'];
      if (preg_match('#[0-9]#',$arr)){
        $questionmark = explode('?', $arr);
        $number = $questionmark[1];
        if(is_numeric ($number)){
          $this->load->view('editstaff');
        }else{
          //LOAD TABLE (because ? without no ?id)
          $this->load->view('tbl_staff',$data);
        }
      }else{
          //LOAD TABLE (becuase there is no ?id)
          $this->load->view('tbl_staff',$data);
	}
}
	function create()
	  {
	    $data = array(
	      'staff_name' => $this->input->post('staff_name'),
	      'staff_surname' => $this->input->post('staff_surname'),
		  'staff_subject' => $this->input->post('staff_subject'),
		  'staff_email' => $this->input->post('staff_email'),

	    );

	    $this->Staff_Model->add_record($data);
	    $this->index();
	  }

	  function update(){
	    $id = $this->input->post('id'); // send id to model
	      $data['staff_name'] = $this->input->post('staff_name');
	      $data['staff_surname'] = $this->input->post('staff_surname');
		  $data['staff_subject'] = $this->input->post('staff_subject');
		  $data['staff_email'] = $this->input->post('staff_email');
	    $this->Staff_Model->update_record($data, $id);
	  }

	  function delete()
	  {
	    $this->Staff_Model->delete_row();
	    $this->index();
	  }
	  // Function to Fetch selected record from database.
	  function show_staff_id() {
	  $id = $this->uri->segment(3);
	  $data['tbl_staff'] = $this->Staff_Model->show_staff();
	  $data['single_student'] = $this->Staff_Model->show_staff_id($id);
	  $this->load->view('deletestaff', $data);
	  }
	  // Function to Delete selected record from database.
	  function delete_staff_id() {
	  $id = $this->uri->segment(3);
	  $this->Staff_Model->delete_staff_id($id);
	  $this->show_staff_id();
	  }
}

?>
