<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentp_Model extends CI_Model {

    public function add_studentp($student_name, $student_surname, $course_name, $course_level, $stud_link) {

        $data = array(
            'student_name'  => $student_name,
            'student_surname'   => $student_surname,
            'course_name' => $course_name,
            'course_level' => $course_level,
            'stud_link' => $stud_link
        );

        // An INSERT query:
        // INSERT INTO tbl_admin (cols) VALUES (cols)
        $this->db->insert('tbl_portfolio', $data);

        // gives us whatever the primary key (AI) value is
        return $this->db->insert_id();

    }

	public function all_studentp() {

		// these lines are preparing the
		// query to be run.
		$this->db->select('*')
				 ->order_by('name', 'asc');

		// run the query using the parameters
		// above and below.
		return $this->db->get('tbl_portfolio');

	}

    public function get_studentp($id) {

        // run a query and return the row immediately
        return $this->db->select('*')
                        ->where('id', $id)
                        ->get('tbl_portfolio')
                        ->row_array();

    }

    public function update_studentp($student_name, $student_surname, $course_name, $course_level, $stud_link) {

        if ($this->check_studentp($student_name, $student_surname, $course_name, $course_level, $stud_link)) {
            return TRUE;
        }

        // this is the data that needs to change
        $data = array();
        if (!empty($student_name)) $data['student_name'] = $student_name;
        if (!empty($student_surname)) $data['student_surname'] = $student_surname;
        if (!empty($course_name)) $data['course_name'] = $course_name;
        if (!empty($course_level)) $data['course_level'] = $course_level;
        if (!empty($stud_link)) $data['stud_link'] = $stud_link;

        // this is the entire update query
        $this->db->where('id', $id)
                 ->update('tbl_portfolio', $data);

        // TRUE or FALSE if there has been a change
        return $this->db->affected_rows() == 1;

    }

    public function check_studentp($student_name, $student_surname, $course_name, $course_level, $stud_link) {

        // this is the data that needs to change
        $data = array('id'  => $id);
        if (!empty($student_name)) $data['student_name'] = $student_name;
        if (!empty($student_surname)) $data['student_surname'] = $student_surname;
        if (!empty($course_name)) $data['course_name'] = $course_name;
        if (!empty($course_level)) $data['course_level'] = $course_level;
        if (!empty($stud_link)) $data['stud_link'] = $stud_link;
        // TRUE or FALSE if there has been a change
        return $this->db->get_where('tbl_studentp', $data)->num_rows() == 1;

    }
    public function unique_email($id, $student_name) {

        $data = array(
            'id !='     => $id,
            '$student_name'     => $student_name
        );

        // will give me a true or false depending
        // on what comes up from the query
        return $this->db->get_where('tbl_portfolio', $data)->num_rows() == 0;

    }

    function delete_row()
       {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('tbl_canclect');

       }

}
