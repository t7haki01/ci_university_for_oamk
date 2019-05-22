
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>University</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <link rel="stylesheet" href="<?php echo base_url('css/global.css'); ?>">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
               <!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style media="screen">
#ul_margin
{
margin-top: 10px;
margin-left: 10px;
font-size: 18px;
font-family: sans-serif;
font-variant: small-caps;
}

#sidebar
{
  margin-left: 0;
}

#toggle_right
{
    text-align: right;
    position: absolute;
    right: 5px;
    width: 130px;
    padding: 10px;
    top: 2px;
}
</style>

<script type="text/javascript">
  function test()
  {
      // document.getElementById("sidebar").style.marginLeft = "-900px" ;

      if(document.getElementById("sidebar").style.marginLeft == "0px" || document.getElementById("sidebar").style.marginLeft == "")
      {
          document.getElementById("sidebar").style.marginLeft = "-900px" ;
          document.getElementById("sidebar").style.display = "none" ;

      }
      else
      {
          document.getElementById("sidebar").style.marginLeft = "0px" ;
          document.getElementById("sidebar").style.display = "block" ;
      }
  }


</script>

<!-- <script type="text/javascript">
  $(document).ready
  (
    function()
    {
    $('#sidebarCollapse').on('click',function()
      {
        $('#sidebar').toggleClass('active');
      });
    });
</script> -->

<!-- <style media="screen">
  .wrapper
  {
    display: flex;
    align-items: stretch;
  }

  #sidebar
  {
    background-color: lightgreen;
    color: #fff;
    transition: all 0.3s;
    display: inline;
  }

  #sidebar.active
  {
    /* display: none; */
    margin-left: -900px;
  }

</style> -->



  </head>

  <body>


<div class="wrapper" id="wrapper">
<nav id="sidebar" class="navbar navbar-inverse">
<!-- class="list-unstyled components" -->
  <ul class="list-inline" id="ul_margin">
      <!-- <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"></a></li>
      <ul class="collapse list-unstyled" id="homeSubmenu"> -->

        <li class=""> <a href="<?php echo site_url('Main_cnt/index');?>">Home</a> </li>
        <li> <a href="<?php echo site_url('Student/show_students');?> ">Student Information</a> </li>
        <li> <a href="<?php echo site_url('Course/show_courses');?>">Course Information</a> </li>
        <li> <a href="<?php echo site_url('Grades/show_grades');?>">Grades</a> </li>
        <li> <a href="<?php echo site_url('Search/search_page');?>">Search</a> </li>
        <!-- <li> <a href="<?php echo site_url('Main_cnt/admin_page');?>">Admin Menu</a> </li> -->
        <?php
        if(isset($_SESSION['logged_in']))
        {
          if($_SESSION['admin'] == true)
          {
              echo '<li><a href="'.site_url('Main_cnt/admin_page').'">Admin Menu</a></li>' ;
          }
        }
        ?>

      <!-- </ul> -->

	<li><a href="<?php echo base_url('../index.php');?>">Back to Main</a></li>

  </ul>
</nav>
<div id="toggle_right">
  <button type="button" id="toggle_btn" class="btn btn-info" onclick="test()">
    <i class="glyphicon glyphicon-align-left"></i>
    Toggle Menu
  </button>
<br>

  <?php
      if(isset($_SESSION['logged_in']))
      {
          echo 'Welcome'.'    '.$_SESSION['user'];
      }
      else
      {
        echo 'Welome'.'      '.'Guest';
      }
  ?>
<br>
  <?php
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
  {
    echo '<a href="'.site_url('login/logout').'">Logout</a>';
  }
  else
  {
    echo '<a href="'.site_url('login/login_form').'">Login</a>';
  }
  ?>

</div>

</div>  <!-- end of div for wrapper -->

<!-- 1. input type when it is number value, there is no data // fixed
     2. In student information section when id is same, there didn't come error message // fixed
     3. in Course add page, same student can be in same course - because if idGrades were different
     4. make status page one - need to check more but made almost
     5.
-->

<div class="container-fluid">
