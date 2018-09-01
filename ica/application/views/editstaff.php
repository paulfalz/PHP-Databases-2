<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>staff</title>
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
        <label for="job_place">job_place:</label>
        <input type="text" name="job_place" id="job_place" value="<?php echo $row->job_place; ?>" />
      </p>

      <p>
        <label for="job_subject">job_subject:</label>
        <input type="text" name="job_subject" id="job_subject" value="<?php echo $row->job_subject; ?>" />
      </p>

      <p>
        <label for="job_type">job_type:</label>
        <input type="text" name="job_type" id="job_type" value="<?php echo $row->job_type; ?>" />
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
