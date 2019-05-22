<h1>Remove a student</h1>

<p><b>Course ID:</b> <?php echo $idCourse; ?></p>
<p><b>Course Name:</b> <?php foreach ($courseName as $row)
{
  echo $row['courseName'];
} ?></p>


<form class="" action="<?php echo site_url('Course/remove_student_from_course/'); ?>" method="post">
<label for="">
Student ID / Name(firstname, lastname) / Group
</label>
<br>
<select class="" name="student_selection">
<?php foreach ($chosen_student as $row)
{
  echo '<option value="'.$row['idGrades'].'">'.$row['idStudent'].'/'.$row['firstname'].' '.$row['lastname'].'/'.
  $row['group'].'</option>';
} ?>
</select>
<br>
<input type="hidden" name="idCourse" value="<?php echo $idCourse; ?>">
<input type="submit" class="btn btn-link btn-sm" value="Remove">
<a href="<?php echo site_url('course/edit_selected/').$idCourse;?>">
<span style="color:red; font-size:12px;">Cancel</span></a>

</form>
