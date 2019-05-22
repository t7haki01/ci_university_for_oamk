

<h2>Courses</h2>
<p> <?php echo $message; ?> </p>
<table class="table table-condensed"><tr><td>
<table class="table table-condensed table-striped table-bordered">
  <tr class="info">
    <th class="text-center">Course ID</th>
    <th>Course Name</th>
    <th class="text-center">ECT Point</th>
    <th class="text-center">Number of student</th>

<?php
    if($_SESSION['admin'] == false && isset($_SESSION['logged_in']) )
        {
            echo '<th class="text-center">Enroll</th>';
        }
?>
    <?php
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
          echo '<th>DELETE</th>';
          echo '<th>EDIT</th>';
      }
    }
    ?>
  </tr>

<?php
foreach ($courses as $row)
{

  echo '<tr>';
  echo '<td class="text-center">'.$row['idCourse'].'</td>';
  echo '<td>'.$row['courseName'].'</td>';
  echo '<td class="text-center">'.$row['ectPoints'].'</td>';
  echo '<td class="text-center">'.$row['count(student.idStudent)'].'</td>';
  // echo '<td>'.$row['group_concat(firstname, lastname)'].'</td>';
  if($_SESSION['admin'] == false && isset($_SESSION['logged_in']) )
    {
      echo '<td class="text-center"><form action="'.site_url('Course/add_student_to_course_test/').'" method="post">
      <input type="hidden" name="idCourse_test" value="'.$row['idCourse'].'">
      <input type="submit" class="btn btn-info" value="Enroll"></form></td>';
    }
  if(isset($_SESSION['logged_in']))
  {
    if($_SESSION['admin'] == true)
    {
      echo '<td class="text-center"> <a href="'.site_url('Course/delete_selected/')
           .$row['idCourse'].'"><button class="btn btn-danger">
           <span class="glyphicon glyphicon-remove"></span></button>
           </a></td>';
      echo '<td class="text-center"> <a href="'.site_url('course/edit_selected/')
      .$row['idCourse'].'"><button class="btn btn-primary">
      <span class="glyphicon glyphicon-edit"></button></a></td>';
    }
  }
  echo '</tr>';

}

?>
</table></td>
<?php
if(isset($_SESSION['logged_in']))
{
  if($_SESSION['admin'] == true)
  {
      echo '<td><h2>Add a Course</h2>';
      echo '<form action="'.site_url('Course/show_courses').'" method="post">';
      echo '<table class="table table-condensed table-striped"><tr>';
      echo '<td> <label for="course_id">Course ID</label></td>';
      echo '<td> <input type="number" name="courseid" id="courseid" required></td></tr>';
      echo '<tr><td> <label for="course_name">Course Name</label> </td>';
      echo '<td> <input type="text" name="course_name" id="course_name"></td></tr>';
      echo '<tr><td> <label for="ect">ECT Point</label> </td>';
      echo '<td> <input type="text" name="ect" id="ect"></td></tr>';
      echo '<tr><td></td><td> <input type="submit" name="submit_btn" id="submit_btn" value="Add"> </td></tr>';
      echo '</table></form>';
  }
}
?>
</td></tr></table>
<?php
if($_SESSION['admin'] == false && isset($_SESSION['logged_in']) )
{
      echo '<td><h2>Own course</h2>';
      echo '<table class="table table-hover table-bordered">';
      echo '<tr class="info">';
      echo '<th class="text-center">Course ID</th>';
      echo '<th>Course Name</th><th class="text-center">ECT Point</th>';
      echo '<th class="text-center">Disenroll</th></tr>';

      foreach ($courses_own as $row)
      {
        echo '<tr>';
        echo '<td class="text-center">'.$row['idCourse'].'</td>';
        echo '<td>'.$row['courseName'].'</td>';
        echo '<td class="text-center">'.$row['ectPoints'].'</td>';
        echo '<td class="text-center"><form action="'.site_url('Course/remove_student_from_course_test/').'" method="post">
        <input type="hidden" name="grades_selection" value="'.$row['idGrades'].'">
        <input type="hidden" name="student_selection" value="1">
        <input type="submit" class="btn btn-warning" value="Disenroll"></form></td>';
        echo '</tr>';
      }
}
?>
</table></td></tr></table>
