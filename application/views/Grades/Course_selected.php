<a href="<?php echo site_url('Grades/show_grades/');?>">
<button>Back</button></a><br>


<h2>Grades</h2>

<p><b>Course Name:</b> <?php echo $chosen_course[0]['courseName']; ?></p>

<table class="table table-condensed"><tr><td>
      <table class="table table-bordered">
        <tr class="info">
          <th>Course ID</th>
          <th>Name</th>
          <th>Group</th>
          <th>Grade</th>
          <th>Graded Date</th>
          <th>Ect Point</th>
        </tr>

          <?php
          foreach ($chosen_course as $row)
          {

            echo '<tr>';
            echo '<td>'.$row['idCourse'].'</td>';
            echo '<td>'.$row['firstname'].' '.$row['lastname'].'</td>';
            echo '<td>'.$row['group'].'</td>';
            echo '<td>'.$row['arvosana'].'</td>';
            echo '<td>'.$row['date_of_grade'].'</td>';
            echo '<td>'.$row['ectPoints'].'</td>';
            echo '</tr>';

          }

          ?>

      </table></td>

<td><?php
  if(isset($_SESSION['logged_in']))
  {
    if($_SESSION['admin'] == true)
    {
        echo '<table class="table table-striped table-condensed">';
        echo '<tr><td class="text-center" colspan="2"><h3>Grade a Student/Edit a Grade</h3></td></tr>';
        echo '<form action="'.site_url('Grades/insert_a_grades').'" method="post">';
        echo '<tr><td class="text-right"> <label for="courseName">Course Name: </label></td>
              <td>'.$chosen_course[0]['courseName'].'</td></tr>';
        echo '<tr><td class="text-right"> <label for="ect">ECT Point: </label> </td>
              <td>'.$chosen_course[0]['ectPoints'].'</td><tr>';
        echo '<td class="text-right"> <label for="student">Student: </label> </td>';
        echo '<td><select class="" name="student">';
          foreach ($chosen_course as $row)
            {
              echo '<option value="'.$row['idGrades'].'">';
              echo $row['firstname'].' '.$row['lastname'];
              echo '</option>';
            }
        echo '</select></td></tr>';

        echo '<tr><td class="text-right"> <label for="arvo">Grade: </label> </td>
              <td> <input type="number" name="arvo" id="arvo" min="0" max="5"></td></tr>';

        echo '<tr><td class="text-right"> <label for="g_date">Graded Date: </label> </td>
              <td> <input type="date" name="g_date" id="g_date"></td></tr>';
        echo '<tr><td></td><td> <input type="submit" class="btn btn-success" name="submit_btn" id="submit_btn" value="Add"> </td></tr>';
        echo '</form>';

        echo '<tr><td colspan="2" class="text-center"><h3>Delete a grades from course</h3></td></tr>';
        echo '<tr><td class="text-right"><form action="'.site_url('Grades/insert_a_grades').'" method="post">';
        echo '<select class="" name="student">';
        foreach ($chosen_course as $row)
          {
            echo '<option value="'.$row['idGrades'].'">';
            echo $row['firstname'].' '.$row['lastname'];
            echo '</option>';
          }
        echo '</select></td>';
        echo '<td><input type="submit" class="btn btn-danger" name="submit_btn" id="submit_btn" value="delete"></td></tr>';
        echo '<input type="hidden" name="arvo" id="arvo" value="0">';
        echo '<input type="hidden" name="g_date" id="g_date" value="cur_date()">';
        echo '</form></table>';

    }
  }
  ?></td>
<!-- <td><table>

<td><?php
if(isset($_SESSION['logged_in']))
{
  if($_SESSION['admin'] == true)
  {
  }
}
?>
</td>






  <form action="<?php echo site_url('Course/save_edited'); ?> " method="post">
  <input type="hidden" name="courseid" value=" <?php echo $idCourse; ?> ">

  <label>ID</label><br>
  <input type="text" name="course_id" value=" <?php echo $chosen_course[0]['idCourse']; ?>">
  <br>

  <label>Course Name</label><br>
  <input type="text" name="course_name" value=" <?php echo $chosen_course[0]['courseName']; ?>">
  <br>

  <label>ECT Point</label><br>
  <input type="text" name="ect" value=" <?php echo $chosen_course[0]['ectPoints']; ?>">
  <br>

  <br>
  <input class="btn btn-primary" type="submit" value="Save">
</form>
<br>
<a href=" <?php echo site_url('Course/show_courses'); ?> "> <button class="btn btn-primary">Cancel</button> </a> -->
<!-- </table></td> -->
</tr></table>
<!-- <p>Delete a grades from course</p>

<form action="<?php echo site_url('Grades/insert_a_grades');?>" method="post">
     <select class="" name="student">
      <?php
        foreach ($chosen_course as $row)
          {
            echo '<option value="'.$row['idGrades'].'">';
            echo $row['firstname'].' '.$row['lastname'];
            echo '</option>';
          }
          ?>
    </select>
       <input type="submit" name="submit_btn" id="submit_btn" value="delete">
       <input type="hidden" name="arvo" id="arvo" value="0">
       <input type="hidden" name="g_date" id="g_date" value="cur_date()">
</form> -->
