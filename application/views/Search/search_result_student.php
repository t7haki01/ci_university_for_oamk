<h1>Search Student result</h1>


<table class="table table-hover table-bordered">
  <tr class="info">
    <th>ID</th>
    <th>Name</th>
    <th>Group</th>
    <th>Email</th>
    <th>Street Address</th>
    <th>Postal Code</th>
    <th>Birth Year</th>
  </tr>

<?php
foreach ($search_student_result as $row)
{

  echo '<tr>';
  echo '<td>'.$row['idStudent'].'</td>';
  echo '<td>'.$row['firstname'].'&nbsp'.$row['lastname'].'</td>';
  echo '<td>'.$row['group'].'</td>';
  echo '<td>'.$row['email'].'</td>';
  echo '<td>'.$row['streetAddress'].'</td>';
  echo '<td>'.$row['postalCode'].'</td>';
  echo '<td>'.$row['birthYear'].'</td>';
  echo '</tr>';

}
?>
</table></td>
