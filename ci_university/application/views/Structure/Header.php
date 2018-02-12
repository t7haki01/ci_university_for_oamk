
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>University</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <style media="screen">
              .table :td
              {
                padding-left: 20px;
              }
              </style>
                      <script type="text/javascript">
                      </script>
  </head>

  <body>

    <ul class="list-group">
      <li> <a href="<?php echo site_url('Main_cnt/index');?>">Main</a> </li>
      <li> <a href="<?php echo site_url('Student/Show_students');?> ">Student Information</a> </li>
      <li> <a href="<?php echo site_url('Course/Show_courses');?>">Course Information</a> </li>
      <li> <a href="#">Add a course</a> </li>
      <li> <a href="#">Grades</a> </li>
      <li> <a href="#">Add a grade</a> </li>
      <li> <a href="#">Search</a> </li>
    </ul>

<!-- 1. input type when it is number value, there is no data
     2. when editing where is extra space -->
<div class="container">
