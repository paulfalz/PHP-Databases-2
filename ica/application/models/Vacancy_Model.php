<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancy_Model extends CI_Model {

    public function add_vacancy($job_place, $job_subject, $job_type) {

        $data = array(
            'job_place'     => $job_place,
            'job_subject'  => $job_subject,
            'job_type'    => $job_type
        );

        // An INSERT query:
        // INSERT INTO tbl_admin (cols) VALUES (cols)
        $this->db->insert('tbl_vacancy', $data);

        // gives us whatever the primary key (AI) value is
        return $this->db->insert_id();

    }

	public function all_vacancy() {

		// these lines are preparing the
		// query to be run.
		$this->db->select('*')
				 ->order_by('job_subject', 'asc');

		// run the query using the parameters
		// above and below.
		return $this->db->get('tbl_vacancy');

	}

    public function get_vacancy($id) {

        // run a query and return the row immediately
        return $this->db->select('*')
                        ->where('id', $id)
                        ->get('tbl_vacancy')
                        ->row_array();

    }

    public function update_vacancy($job_place, $job_subject, $job_type) {

        if ($this->check_vacancy($job_place, $job_subject, $job_type)) {
            return TRUE;
        }

        // this is the data that needs to change
        $data = array();
        if (!empty($job_place)) $data['job_place'] = $job_place;
        if (!empty($job_subject)) $data['job_subject'] = $job_subject;
        if (!empty($job_type)) $data['job_type'] = $job_type;

        // this is the entire update query
        $this->db->where('id', $id)
                 ->update('tbl_vacancy', $data);

        // TRUE or FALSE if there has been a change
        return $this->db->affected_rows() == 1;

    }

    public function check_vacancy($job_place, $job_subject, $job_type) {

        // this is the data that needs to change
        $data = array('id'  => $id);
        if (!empty($job_place)) $data['job_place'] = $job_place;
        if (!empty($job_subject)) $data['job_subject'] = $job_subject;
        if (!empty($job_type)) $data['job_type'] = $job_type;

        // TRUE or FALSE if there has been a change
        return $this->db->get_where('tbl_vacancy', $data)->num_rows() == 1;

    }
    function get_records()
    {
         $query = $this->db->get('assets');
         return $query->result();
        // $query = $this->db->query('SELECT * FROM assets');
        //echo $this->table->generate($query);
    }

    function add_record($data)
    {
        $this->db->insert('assets', $data);
        return;
    }

    function update_record($data, $id)
    {
        $this->db->where('id', $id); // here is the id
        $this->db->update('assets', $data);
        redirect(site_url('site')); //redirect after done update process
    }

    function delete_row()
       {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('assets');

       }
}
