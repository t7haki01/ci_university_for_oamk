<h2>Edit a student</h2>
  <form action="<?php echo site_url('Student/save_edited'); ?> " method="post">
<input type="hidden" name="studentid" value="<?php echo $idStudent;?> ">
<?php
if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        echo '<label>Student ID</label><br>';
      }
    }
?>
<input type="<?php if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        echo 'text';
      }
      else
      {
        echo 'hidden';
      }
    }?>" name="student_id" value="<?php echo $chosen_student[0]['idStudent']; ?>">
<?php
if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        echo '<br>';
      }
    }
?>

  <!-- here student id, i want to put as number but it comes nothing -->

  <label>Firstname</label><br>
  <input type="text" name="fname" value="<?php echo $chosen_student[0]['firstname']; ?>">
  <br>

  <label>Lastname</label><br>
  <input type="text" name="lname" value="<?php echo $chosen_student[0]['lastname']; ?>">
  <br>

  <?php
  if(isset($_SESSION['logged_in']))
      {
        if($_SESSION['admin'] == true)
        {
          echo '<label>Group</label><br>';
        }
      }
  ?>

<input type="<?php
if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        echo 'text';
      }
      else
      {
        echo 'hidden';
      }
    }
?>" name="group" value="<?php echo $chosen_student[0]['group']; ?>">

<?php
if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        echo '<br>';
      }
    }
?>

  <label>Email</label><br>
  <input type="email" name="email" value="<?php echo $chosen_student[0]['email']; ?>">
  <br>

  <label>Street Address</label><br>
  <input type="text" name="streetaddress" value="<?php echo $chosen_student[0]['streetAddress']; ?>">
  <br>

  <label>Postal Code</label><br>
  <select name="pstcode">
    <?php
    echo '<option selected="selected">'.$chosen_student[0]['postalCode'].'/'.$chosen_student[0]['postPlace'].'</option>';
    foreach ($post as $row)
    {
      echo '<option value="'.$row['postalCode'].'">';
      echo $row['postalCode'].'/'.$row['postPlace'];
      echo '</option>';
    }
    ?>
  </select>
  <br>

  <label>Birth Year</label><br>
  <input type="text" name="byr" value="<?php echo $chosen_student[0]['birthYear']; ?>">
  <br>
  <br>

  <input class="btn btn-link btn-xs" type="submit" value="Save">
  <a href="<?php echo site_url('Student/show_students'); ?>"> <span style="color:red;font-size:12px;">Cancel</span></a>
</form>
<!-- <br><a href="<?php echo site_url('Student/show_students'); ?> "> <button class="btn btn-primary">Cancel</button> </a> -->
