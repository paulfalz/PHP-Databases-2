<!DOCTYPE html>
<html>
<body>
<div id="container">
<div id="wrapper">
<div id="menu">
<p>Click On Data</p>
<!--====== Displaying Fetched Names from Database in Links ========-->
<ol>
<?php foreach ($studentp as $studentp): ?>
<li><a href="<?php echo base_url() . "index.php/Studentpbackend/show_studentp_id/" . $studentp->studentp_id; ?>"><?php echo $studentp->student_name; ?></a>
</li><?php endforeach; ?>
</ol>
</div>
<div id="detail">
<!--====== Displaying Fetched Details from Database ========-->
<?php foreach ($single_studentp as $studentp): ?>
<p>Cancelled Lectures</p>
<?php echo $studentp->student_name; ?>
<?php echo $studentp->student_surname; ?>
<?php echo $studentp->course_name; ?>
<?php echo $studentp->course_level; ?>
<?php echo $studentp->stud_link; ?>
<!--====== Delete Button ========-->
<a href="<?php echo base_url() . "index.php/Studentpbackend/delete_studentp_id/" . $studentp->studentp_id; ?>">
<button>Delete</button></a>
<?php endforeach; ?>
</div>
</div>
</div>
</body>
</html>
