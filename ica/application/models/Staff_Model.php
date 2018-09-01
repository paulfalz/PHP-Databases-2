<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_Model extends CI_Model {

    public function add_staff($staff_name, $staff_surname, $staff_subject, $staff_email) {

        $data = array(
            'staff_name'      => $staff_name,
            'staff_surname'     => $staff_surname,
            'staff_subject'  => $staff_subject,
            'staff_email'  => $staff_email
        );

        // An INSERT query:
        // INSERT INTO tbl_users (cols) VALUES (cols)
        $this->db->insert('tbl_staff', $data);

        // gives us whatever the primary key (AI) value is
        return $this->db->insert_id();

    }

	public function all_staff() {

		// these lines are preparing the
		// query to be run.
		$this->db->select('*')
				 ->order_by('staff_name', 'asc');

		// run the query using the parameters
		// above and below.
		return $this->db->get('tbl_staff');

	}

    public function get_staff($staffemail) {

        // run a query and return the row immediately
        return $this->db->select('*')
                        ->where('id', $id)
                        ->get('tbl_staff')
                        ->row_array();

    }

    public function update_staff($staff_name, $staff_surname, $staff_subject, $staff_email) {

        if ($this->check_staff($staff_name, $staff_surname, $staff_subject, $staff_email)) {
            return TRUE;
        }

        // this is the data that needs to change
        $data = array();
        if (!empty($staff_name)) $data['staff_name'] = $staff_name;
        if (!empty($staff_surname)) $data['staff_surname'] = $staff_surname;
        if (!empty($staff_subject)) $data['staff_subject'] = $staff_subject;
        if (!empty($staff_email)) $data['staff_email'] = $staff_email;

        // this is the entire update query
        $this->db->where('id', $id)
                 ->update('tbl_staff', $data);

        // TRUE or FALSE if there has been a change
        return $this->db->affected_rows() == 1;

    }

    public function check_staff($staff_name, $staff_surname, $staff_subject, $staff_email) {

        // this is the data that needs to change
        $data = array('id'  => $id);
        if (!empty($staff_name)) $data['staff_name'] = $staff_name;
        if (!empty($staff_surname)) $data['staff_surname'] = $staff_surname;
        if (!empty($staff_subject)) $data['staff_subject'] = $staff_subject;
        if (!empty($staff_email)) $data['staff_email'] = $staff_email;

        // TRUE or FALSE if there has been a change
        return $this->db->get_where('tbl_staff', $data)->num_rows() == 1;

    }

    public function unique_email($staff_email) {

        $data = array(
            'id !='     => $id,
            'staff_email'     => $staff_email
        );

        // will give me a true or false depending
        // on what comes up from the query
        return $this->db->get_where('tbl_staff', $data)->num_rows() == 0;

    }

    public function delete_staff($id) {
        $this->db->where_in('id', $id)->delete('tbl_staff');
    }
    function delete_row()
  {
   $this->db->where('id', $this->uri->segment(3));
   $this->db->delete('tbl_staff');

  }
}
