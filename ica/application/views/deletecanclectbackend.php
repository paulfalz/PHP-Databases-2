<!DOCTYPE html>
<html>
<body>
<div id="container">
<div id="wrapper">
<div id="menu">
<p>Click On Data</p>
<!--====== Displaying Fetched Names from Database in Links ========-->
<ol>
<?php foreach ($canclect as $canclect): ?>
<li><a href="<?php echo base_url() . "index.php/Canclectbackend/show_canclect_id/" . $canclect->canclect_id; ?>"><?php echo $canclect->course_name; ?></a>
</li><?php endforeach; ?>
</ol>
</div>
<div id="detail">
<!--====== Displaying Fetched Details from Database ========-->
<?php foreach ($single_canclect as $canclect): ?>
<p>Cancelled Lectures</p>
<?php echo $canclect->course_name; ?>
<?php echo $canclect->course_level; ?>
<?php echo $canclect->course_group; ?>
<?php echo $canclect->course_subname; ?>
<?php echo $canclect->les_time; ?>
<?php echo $canclect->les_date; ?>
<!--====== Delete Button ========-->
<a href="<?php echo base_url() . "index.php/Canclectbackend/delete_canclect_id/" . $canclect->canclect_id; ?>">
<button>Delete</button></a>
<?php endforeach; ?>
</div>
</div>
</div>
</body>
</html>
