
<h2>Grades</h2>
<?php
// foreach ($grades as $row)
// {
//   $test_array= [] ;
//   array_push($test_array, $row['idCourse']);
//   echo $test_array[1];
//   echo '<button onclick="test_'.$row['idCourse'].'()">'.$row['courseName'].'</button>';
// }
?>

<table class="table table-hover table-bordered">
  <tr class="info" id="info">
    <th>Course ID</th>
    <th>Course Name</th>
    <th>ECT Point</th>
    <th>Grade</th>
  </tr>

<?php
foreach ($grades as $row)
{

  echo '<tr>';
  echo '<td>'.$row['idCourse'].'</td>';
  echo '<td>'.$row['courseName'].'</td>';
  echo '<td>'.$row['ectPoints'].'</td>';
  echo '<td> <a href="'.site_url('Grades/course_selected/').$row['idCourse'].'"><button class="btn btn-primary">
       Grades</button></a></td>';
  echo '</tr>';

}
?>
</table>
