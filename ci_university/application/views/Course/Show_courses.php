

<h2>Courses</h2>
<table><tr><td>
<table class="table table-hover table-bordered">
  <tr class="info">
    <th>ID</th>
    <th>Course Name</th>
    <th>ECT Point</th>
    <th>DELETE</th>
    <th>EDIT</th>
  </tr>

<?php
foreach ($courses as $row)
{

  echo '<tr>';
  echo '<td>'.$row['idCourse'].'</td>';
  echo '<td>'.$row['courseName'].'</td>';
  echo '<td>'.$row['ectPoints'].'</td>';
  echo '<td> <a href="'.site_url('course/delete_selected/')
       .$row['idCourse'].'"><button class="btn btn-danger">
       <span class="glyphicon glyphicon-remove"></span></button>
       </a></td>';
  echo '<td> <a href="'.site_url('course/edit_selected/')
  .$row['idCourse'].'"><button class="btn btn-primary">
  <span class="glyphicon glyphicon-edit"></button></a></td>';
  echo '</tr>';

}
?>
</table></td>

<td><h2>Add a Course</h2>

  <form action="<?php echo site_url('Course/Show_courses');?>" method="post">
  <table>
    <tr>
      <td> <label for="course_id">Course ID</label> </td>
      <td> <input type="number" name="courseid" id="courseid" required></td>
    </tr>
    <tr>
      <td> <label for="course_name">Course Name</label> </td>
      <td> <input type="text" name="course_name" id="course_name"></td>
    </tr>
    <tr>
      <td> <label for="ect">ECT Point</label> </td>
      <td> <input type="text" name="ect" id="ect"></td>
    </tr>
    <tr>
      <td></td>
      <td> <input type="submit" name="submit_btn" id="submit_btn" value="Add"> </td>
    </tr>
  </table>
  </form>
<p> <?php $message; ?> </p>

</td></tr></table>
