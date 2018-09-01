<!DOCTYPE html>
<html>
<body>
<div id="container">
<div id="wrapper">
<div id="menu">
<p>Click On Data</p>
<!--====== Displaying Fetched Names from Database in Links ========-->
<ol>
<?php foreach ($vacancies as $vacancies): ?>
<li><a href="<?php echo base_url() . "index.php/Vacbackend/show_vacancy_id/" . $vacancies->vacancies_id; ?>"><?php echo $vacancies->job_place; ?></a>
</li><?php endforeach; ?>
</ol>
</div>
<div id="detail">
<!--====== Displaying Fetched Details from Database ========-->
<?php foreach ($single_vacancies as $vacancies): ?>
<p>Cancelled Lectures</p>
<?php echo $vacancies->job_place; ?>
<?php echo $vacancies->job_subject; ?>
<?php echo $vacancies->job_type; ?>
<!--====== Delete Button ========-->
<a href="<?php echo base_url() . "index.php/Vacbackend/delete_vacancy_id/" . $vacancies->vacancy_id; ?>">
<button>Delete</button></a>
<?php endforeach; ?>
</div>
</div>
</div>
</body>
</html>
