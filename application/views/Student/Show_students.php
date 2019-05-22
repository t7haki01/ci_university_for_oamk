

<h2>Students</h2>
<p> <?php echo $message ?> </p>
<table class="table table-condensed" id="student_table"><tr><td>
<table class="table table-hover table-bordered">
  <tr class="info">
    <th>ID</th>
    <th>Name</th>
    <th>Group</th>
    <th>Email</th>
    <th>Street Address</th>
    <th>Postal Code</th>
    <th>Post Place</th>
    <th>Birth Year</th>
    <!-- <th>Course</th> -->
    <?php
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
          echo '<th>DELETE</th>';
      }
    }
    ?>
    <th>Edit</th>
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
  echo '<td>'.$row['postPlace'].'</td>';
  echo '<td>'.$row['birthYear'].'</td>';
  // echo '<td>'.$row['group_concat(courseName)'].'</td>';
  // echo '<td> <a href="'.site_url('Student/delete_selected/')
  //      .$row['idStudent'].'"><button class="btn btn-danger">
  //      <span class="glyphicon glyphicon-remove"></span></button>
  //      </a></td>';
  // echo '<td> <a href="'.site_url('Student/edit_selected/')
  // .$row['idStudent'].'"><button class="btn btn-primary">
  // <span class="glyphicon glyphicon-edit"></button></a></td>';
  if(isset($_SESSION['logged_in']))
  {
    if($_SESSION['admin'] == true)
    {
      echo '<td class="text-center"> <a href="'.site_url('Student/delete_selected/')
           .$row['idStudent'].'"><button class="btn btn-danger">Delete</button>
           </a></td>';
    }
  }
  echo '<td class=""> <a href="'.site_url('Student/edit_selected/')
  .$row['idStudent'].'"><button class="btn btn-primary">
  <span class="glyphicon glyphicon-edit"></button></a></td>';
  echo '</tr>';
  echo '<tr><td><b>Course</b></td><td colspan="9"><div class="course_student">'
       .$row['group_concat(courseName)'].'</div></td></tr>';

}
?>
</table></td>
<td><?php
if(isset($_SESSION['logged_in']))
{
  if($_SESSION['admin'] == true)
  {
      echo '<h2>Add a Student</h2>';
      echo '<form action="'.site_url('Student/show_students').'" method="post">';
      echo '<table class="table table-striped" id="student_colB">';
      echo '<tr><td> <label for="student_id">Student ID</label> </td>
            <td> <input type="number" name="studentid" id="studentid" required></td></tr>';
      echo '<tr><td> <label for="firstname">First name</label> </td>
            <td> <input type="text" name="fname" id="fname" required></td></tr>';
      echo '<tr><td> <label for="lastname">Lastname</label> </td>
            <td> <input type="text" name="lname" id="lname" required></td></tr>';
      echo '<tr><td> <label for="group">Group</label> </td>
            <td> <input type="text" name="group" id="group" required></td></tr>';
      echo '<tr><td> <label for="email">Email</label> </td>
            <td> <input type="email" name="email" id="email" required></td></tr>';
      echo '<tr><td> <label for="streetaddress">Street Address</label> </td>
            <td><input type="text" name="streetaddress" id="streetaddress" required></td></tr>';
      echo '<tr><td> <label for="postal">Postal Code</label> </td>
            <td><select name="pstcode" id="pstcode">';
            foreach ($post as $row)
            {
              echo '<option value="'.$row['postalCode'].'">';
              echo $row['postalCode'].'/'.$row['postPlace'];
              echo '</option>';
            }
            echo '</select></td></tr>';
      echo '<tr><td> <label for="byr">Birth Year</label> </td>
            <td> <input type="number" name="byr" id="byr" required></td></tr>';
      echo '<tr><td></td><td> <input type="submit" name="submit_btn" class="btn btn-success btn-lg" id="submit_btn" value="Add"> </td></tr>';
      echo '</table></form>';
  }
}
?>
<!-- <td><h2>Add a student</h2>

  <form action="<?php echo site_url('Student/show_students');?>" method="post">
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
  </form> -->

</td></tr></table>
