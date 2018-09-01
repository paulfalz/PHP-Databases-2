<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacbackend extends CI_Controller {

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
		$this->load->view('vacbackend');

		$data = array();
    if($query = $this->Vacancy_Model->get_records()){
      $data['records'] = $query;
    }
      $arr = $_SERVER['REQUEST_URI'];
      if (preg_match('#[0-9]#',$arr)){
        $questionmark = explode('?', $arr);
        $number = $questionmark[1];
        if(is_numeric ($number)){
          $this->load->view('editvacbackend');
        }else{
          //LOAD TABLE (because ? without no ?id)
          $this->load->view('tbl_vacancy',$data);
        }
      }else{
          //LOAD TABLE (becuase there is no ?id)
          $this->load->view('tbl_vacancy',$data);
      }

  } // end index

  function create()
  {
    $data = array(
      'job_place' => $this->input->post('job_place'),
      'job_subject' => $this->input->post('job_subject'),
	  'job_type' => $this->input->post('job_type')
    );

    $this->Vacancy_Model->add_record($data);
    $this->index();
  }

  function update(){
    $id = $this->input->post('id'); // send id to model
      $data['job_place'] = $this->input->post('job_place');
      $data['job_subject'] = $this->input->post('job_subject');
	  $data['job_type'] = $this->input->post('job_type');
    $this->Vacancy_Model->update_record($data, $id);
  }




  function delete()
  {
    $this->Vacancy_Model->delete_row();
    $this->index();
  }

  // Function to Fetch selected record from database.
  function show_vacancies_id() {
  $id = $this->uri->segment(3);
  $data['tbl_vacancy'] = $this->Vacancy_Model->show_vacancies();
  $data['single_student'] = $this->Vacancy_Model->show_vacancies_id($id);
  $this->load->view('deletevacbackend', $data);
  }
  // Function to Delete selected record from database.
  function delete_vacancies_id() {
  $id = $this->uri->segment(3);
  $this->Vacancy_Model->delete_vacancies_id($id);
  $this->show_vacancies_id();
  }
}
?>
