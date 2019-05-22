<h2>Edit a student</h2>
  <form action="<?php echo site_url('student/save_edited'); ?> " method="post">
  <input type="hidden" name="student_id" value=" <?php echo $idStudent; ?> ">
  <label>Firstname</label><br>
  <input type="text" name="fname" value=" <?php echo $chosen_student[0]['firstname']; ?>">
  <br>

  <label>Lastname</label><br>
  <input type="text" name="lname" value=" <?php echo $chosen_student[0]['lastname']; ?>">
  <br>

  <label>Group</label><br>
  <input type="text" name="group" value=" <?php echo $chosen_student[0]['group']; ?>">
  <br>

  <label>Email</label><br>
  <input type="email" name="email" value=" <?php echo $chosen_student[0]['email']; ?>">
  <br>

  <label>Street Address</label><br>
  <input type="text" name="streetaddress" value=" <?php echo $chosen_student[0]['streetAddress']; ?>">
  <br>

  <label>Postal Code</label><br>
  <input type="text" name="pstcode" value=" <?php echo $chosen_student[0]['postalCode']; ?>">
  <br>

  <label>Birth Year</label><br>
  <input type="text" name="byr" value=" <?php echo $chosen_student[0]['birthYear']; ?>">
  <br>


  <br>
  <input class="btn btn-primary" type="submit" value="Save">
</form>
<br>
<a href=" <?php echo site_url('student/show_students'); ?> "> <button class="btn btn-primary">Cancel</button> </a>
