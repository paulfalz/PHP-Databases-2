<!DOCTYPE html>
<html>
<body>
<div id="container">
<div id="wrapper">
<div id="menu">
<p>Click On Data</p>
<!--====== Displaying Fetched Names from Database in Links ========-->
<ol>
<?php foreach ($staff as $staff): ?>
<li><a href="<?php echo base_url() . "index.php/Staffbackend/show_staff_id/" . $staff->staff_id; ?>"><?php echo $staff->staff_name; ?></a>
</li><?php endforeach; ?>
</ol>
</div>
<div id="detail">
<!--====== Displaying Fetched Details from Database ========-->
<?php foreach ($single_staff as $staff): ?>
<p>Cancelled Lectures</p>
<?php echo $staff->staff_name; ?>
<?php echo $staff->staff_surname; ?>
<?php echo $staff->staff_subject; ?>
<?php echo $staff->staff_email; ?>
<!--====== Delete Button ========-->
<a href="<?php echo base_url() . "index.php/Staffbackend/delete_staff_id/" . $staff->staff_id; ?>">
<button>Delete</button></a>
<?php endforeach; ?>
</div>
</div>
</div>
</body>
</html>
