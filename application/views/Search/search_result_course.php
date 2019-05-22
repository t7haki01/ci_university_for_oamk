<h1>Search Course Result</h1>


<table class="table table-hover table-bordered">
  <tr class="info">
    <th>ID</th>
    <th>Course Name</th>
    <th>ECT Point</th>
    <th>Number of Students</th>
  </tr>

<?php
foreach ($search_course_result as $row)
{

  echo '<tr>';
  echo '<td>'.$row['idCourse'].'</td>';
  echo '<td>'.$row['courseName'].'</td>';
  echo '<td>'.$row['ectPoints'].'</td>';
  echo '<td>'.$row['count(grades.idStudent)'].'</td>';
  echo '</tr>';

}
?>
</table></td>
