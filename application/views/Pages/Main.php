<h1>University</h1>
<table class="table table-condensed table-striped">
  <tr><td class="text-right"><b>Name:</b></td>
  <td>Kihun Han</td></tr>
  <tr><td class="text-right"><b>Techniques that have been used:</b></td>
    <td>php, Codeigniter, Javascript, CSS, Bootstrap, Mysql Workbench, </td></tr>
    <tr><td class="text-center" colspan="2">
      <span style="color:darkblue; font-size:20px;"><b>Instruction</b></span></td></tr>
      <tr><td class="text-right" ><a href="#">Guest</a>:</td>
          <td>Guest has access to only home page, otherwise asked to log in</td></tr>
    <tr><td class="text-right"><a href="#">Admin</a>:</td>
      <td><span style="color:purple; font-size:20px;">ID: admin // Password:admin123</span><br>Admin has access to all edit/delete student information,
          course information, grade information, admin information<br>
       <u>Student information</u> - Admin can check students information, add a new student(idStudent/primary key is auto increment but<br>
        can edit/add unless same with other) for making new student all fields are required and edit/delete a student information.<br>
      <u>Course information</u> - Admin can check course information and add/edit/delete a course infromation for making new course idCourse(primary key)<br>
      is auto increment but can edit/add unless same with other. In edit option, admin can change course information and enroll or disenroll student from course. <br>
      <u>Grades</u> - Admin can check all students grades from all course and also grade student or set students grade as null. <br>
      <u>Search</u> - Admin can search students or courses by name. <br>
      <u>Admin Menu</u> - Admin can add/edit/delete a postal information and check PHP information.
    </td></tr>
      <tr><td class="text-right"><a href="#">Student</a>:</td>
        <td><span style="color:purple; font-size:20px;">ID: student01 // Password:pass01</span><br>Student has access to check/edit student own information,
          enroll/disenroll course, check course information and check grade information<br>
         <u>Student information</u> - Student can check own information, edit a own student information(without idStudent and group).<br>
        <u>Course information</u> - Student can check course information and enroll/disenroll a course <br>
        <u>Grades</u> - Student can check own student grades from all course where student enrolled and got graded <br>
        <u>Search</u> - Student can search students or courses by name. <br>
        <u>Admin Menu</u> - Student doesn't have access to it.
        </td></tr>
        <tr>
          <td class="text-right"><b>Attention:</b></td>
          <td>Foreign key - (postalCode) // update for cascading and delete for set null.<br>
              (idStudent) // update for cascading and delete for cascading. <br>
              (idCourse) // update for cascading and delete for cascading. <br>
          There shouldn't be extra column for table so in case of student account, ID and password is set already with student whose idStudent is 1. </td>
        </tr>
    </table>

  <span style="font-size:30px;"><b>ER diagram</b></span>
<br>
  <img src="<?php echo base_url('img/University2_EER_Diagram_2.png'); ?>" />
