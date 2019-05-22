

<h2>Students</h2>
<table><tr><td>
<table class="table table-hover table-bordered">
  <tr class="info">
    <th>ID</th>
    <th>Name</th>
    <th>Group</th>
    <th>Email</th>
    <th>Street Address</th>4
    <th>Postal Code</th>
    <th>Birth Year</th>
    <th>DELETE</th>
    <th>EDIT</th>
  </tr>

<?php
foreach ($students as $row)
{

  echo '<tr>';
  echo '<td>'.$row['idStudent'].'</td>';
  echo '<td>'.$row['firstname'].'&nbsp'.$row['lastname'].'</td>';
  echo '<td>'.$row['group'].'</td>';
  echo '<td>'.$row['email'].'</td>';
  echo '<td>'.$row['streetAddress'].'</td>';
  echo '<td>'.$row['postalCode'].'</td>';
  echo '<td>'.$row['birthYear'].'</td>';
  echo '<td> <a href="'.site_url('student/delete_selected/')
       .$row['idStudent'].'"><button class="btn btn-danger">
       <span class="glyphicon glyphicon-remove"></span></button>
       </a></td>';
  echo '<td> <a href="'.site_url('student/edit_selected/')
  .$row['idStudent'].'"><button class="btn btn-primary">
  <span class="glyphicon glyphicon-edit"></button></a></td>';
  echo '</tr>';

}
?>
</table></td>

<td><h2>Add a student</h2>

  <form action="<?php echo site_url('Student/Show_students');?>" method="post">
  <table>
    <tr>
      <td> <label for="student_id">Student ID</label> </td>
      <td> <input type="number" name="studentid" id="studentid" required></td>
    </tr>
    <tr>
      <td> <label for="firstname">First name</label> </td>
      <td> <input type="text" name="fname" id="fname"></td>
    </tr>
    <tr>
      <td> <label for="lastname">Lastname</label> </td>
      <td> <input type="text" name="lname" id="lname"></td>
    </tr>
    <tr>
      <td> <label for="group">Group</label> </td>
      <td> <input type="text" name="group" id="group"></td>
    </tr>
    <tr>
      <td> <label for="email">Email</label> </td>
      <td> <input type="email" name="email" id="email"></td>
    </tr>
    <tr>
      <td> <label for="streeadress">Street Address</label> </td>
      <td> <input type="text" name="streetaddress" id="streetaddresss"></td>
    </tr>
    <tr>
      <td> <label for="postal">Postal Code</label> </td>
      <td> <input type="number" name="pstcode" id="pstcode"></td>
    </tr>
    <tr>
      <td> <label for="byr">Birth Year</label> </td>
      <td> <input type="number" name="byr" id="byr"></td>
    </tr>
    <tr>
      <td></td>
      <td> <input type="submit" name="submit_btn" id="submit_btn" value="Add"> </td>
    </tr>
  </table>
  </form>
<p> <?php $message; ?> </p>

</td></tr></table>
