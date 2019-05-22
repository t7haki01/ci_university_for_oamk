<h2>Edit a course</h2>
<table class="table table-condensed" id="Edit_course"><tr><td><table>
  <tr><td>
    <form action="<?php echo site_url('Course/save_edited'); ?> " method="post">
  <input type="hidden" name="courseid" value="<?php echo $idCourse;?> ">

  <label>Course ID</label></td></tr>
  <tr><td>
  <input type="text" name="course_id" value="<?php echo $chosen_course[0]['idCourse'];?>">
</td></tr>
<!-- here also id, i want to set type as number but it gives nothing -->
  <tr><td>
  <label>Course Name</label>
</td></tr>
  <tr><td>
  <input type="text" name="course_name" value="<?php echo $chosen_course[0]['courseName'];?>">
</td></tr>
<tr><td>
  <label>Enrolled Students</label>
</td></tr>
<tr><td><div class="scroll_for_student">
  <?php echo $chosen_course[0]['group_concat(firstname, lastname)']; ?>
</div></td></tr>

<tr><td>
  <label>ECT Point</label>
</td></tr>
<tr><td>
  <input type="text" name="ect" value="<?php echo $chosen_course[0]['ectPoints'];?>">
</td></tr>
<tr><td>
  <input class="btn btn-link btn-lg" type="submit" value="Save">
  <a href=" <?php echo site_url('Course/show_courses'); ?> "> <span style="color:red; font-size:16px;">Cancel</span> </a>
</form></td></tr></table></td>

<td><table><tr><td>  <?php $nameCourse = $chosen_course[0]['courseName'] ;  ?>
<a href="<?php echo site_url('Course/add_student_course/').$idCourse; ?>"> <button class="btn btn-primary">Add Student</button></a>
<br> <br>
<a href="<?php echo site_url('Course/remove_student_course/').$idCourse; ?>"> <button class="btn btn-warning">Remove Student</button></a>
</td></tr></table></td></tr></table>
