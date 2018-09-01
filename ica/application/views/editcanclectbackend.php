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
  $query = $this->db->get_where('tbl_canclect', array('id' => $id));
  if($query->result()){
    echo form_open('site/update');
    foreach ($query->result() as $row) {
      ?>

      <p>
        <label for="staff_name">staff_name:</label>
        <input type="text" name="staff_name" id="staff_name" value="<?php echo $row->staff_name; ?>" />
      </p>

      <p>
        <label for="staff_surname">staff_surname:</label>
        <input type="text" name="staff_surname" id="staff_surname" value="<?php echo $row->staff_surname; ?>" />
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
        <label for="course_group">course_group:</label>
        <input type="text" name="course_group" id="course_group" value="<?php echo $row->course_group; ?>" />
      </p>

      <p>
        <label for="course_subname">course_subname:</label>
        <input type="text" name="course_subname" id="course_subname" value="<?php echo $row->course_subname; ?>" />
      </p>

      <p>
        <label for="les_time">les_time:</label>
        <input type="text" name="les_time" id="les_time" value="<?php echo $row->les_time; ?>" />
      </p>

      <p>
        <label for="les_date">les_date:</label>
        <input type="text" name="les_date" id="les_date" value="<?php echo $row->les_date; ?>" />
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
