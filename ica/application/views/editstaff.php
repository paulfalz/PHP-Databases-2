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
  $query = $this->db->get_where('tbl_staff', array('id' => $id));
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
        <label for="staff_subject">staff_subject:</label>
        <input type="text" name="staff_subject" id="staff_subject" value="<?php echo $row->staff_subject; ?>" />
      </p>

      <p>
        <label for="staff_email">staff_email:</label>
        <input type="text" name="staff_email" id="staff_email" value="<?php echo $row->staff_email; ?>" />
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
