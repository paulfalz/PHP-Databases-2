<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Edit</title>
  <style type="text/css" media="screen">
  label{display:block;}
  </style>
</head>
<body>

  <h2>EDIT</h2>
  <?php
  $arr = $_SERVER['REQUEST_URI'];
  $questionmark = explode('?', $arr);
  $id = $questionmark[1];
  $query = $this->db->get_where('assets', array('id' => $id));
  if($query->result()){
    echo form_open('site/update');
    foreach ($query->result() as $row) {
      ?>

      <p>
        <label for="student_name">student_name:</label>
        <input type="text" name="student_name" id="student_name" value="<?php echo $row->student_name; ?>" />
      </p>

      <p>
        <label for="student_surname">student_surname:</label>
        <input type="text" name="student_surname" id="student_surname" value="<?php echo $row->student_surname; ?>" />
      </p>

      <p>
        <label for="course_name">course_name:</label>
        <input type="text" name="course_name" id="course_name" value="<?php echo $row->course_name; ?>" />
      </p>

      <p>
        <label for="course_level">course_level:</label>
        <input type="text" name="course_level" id="course_level" value="<?php echo $row->course_level; ?>" />
      </p>

      <p>
        <label for="stud_link">stud_link:</label>
        <input type="text" name="stud_link" id="stud_link" value="<?php echo $row->stud_link; ?>" />
      </p>

      <input type="hidden" name="id" value="<?php echo $id; ?>" />

      <p>
        <input type="submit" value="UPDATE" />
      </p>

      <?php
    }
    echo form_close();
  } else {
    echo 'no record found with id <b>'. $id .'</b>';
  }
  ?>
</body>
