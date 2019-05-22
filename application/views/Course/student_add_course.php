<h1>Add a Student into Course</h1>
<p><b>Course ID:</b> <?php echo $idCourse; ?></p>
<p><b>Course Name:</b> <?php foreach ($courseName as $row)
{
  echo $row['courseName'];
} ?></p>


<form class="" action="<?php echo site_url('Course/add_student_to_course') ?>" method="post">
<label for="">
Student ID / Name(firstname, lastname) / Group
</label>
<br>
<select class="" name="student_selection">
<?php foreach ($students_for_course as $row)
{
  echo '<option value="'.$row['idStudent'].'">'.$row['idStudent'].'/'.$row['firstname'].' '.$row['lastname'].'/'.
  $row['group'].'</option>';
} ?>
</select>
<br>
<!-- <label for="">Grades ID</label> <br> -->
<input type="hidden" name="idGrades" value="0">
<input type="hidden" name="idCourse" value="<?php echo $idCourse; ?>">
<input type="hidden" name="arvo" value="Null">
<input type="hidden" name="grade_date" value="Null">
<input type="submit" class="btn btn-link btn-sm" value="Add">
<a href="<?php echo site_url('course/edit_selected/').$idCourse;?>">
<span style="color:red; font-size:12px;">Cancel</span></a>
</form>



<!-- still same student can be in same course need to find out preventing it -->
