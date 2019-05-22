<h2>Edit a course</h2>
  <form action="<?php echo site_url('Course/save_edited'); ?> " method="post">
  <input type="hidden" name="courseid" value=" <?php echo $idCourse; ?> ">

  <label>ID</label><br>
  <input type="text" name="course_id" value=" <?php echo $chosen_course[0]['idCourse']; ?>">
  <br>

  <label>Course Name</label><br>
  <input type="text" name="course_name" value=" <?php echo $chosen_course[0]['courseName']; ?>">
  <br>

  <label>ECT Point</label><br>
  <input type="text" name="ect" value=" <?php echo $chosen_course[0]['ectPoints']; ?>">
  <br>

  <br>
  <input class="btn btn-primary" type="submit" value="Save">
</form>
<br>
<a href=" <?php echo site_url('course/show_courses'); ?> "> <button class="btn btn-primary">Cancel</button> </a>
