<h2>Delete a student</h2>
<p>Do you want to delete this student:</p>
<table class="table table-bordered table-condensed">
    <tr>
      <td width="200">Name</td>
      <td wdith="200"> <?php echo $chosen_student[0]['firstname'].' '.$chosen_student[0]['lastname']; ?> </td>
    </tr>
    <tr>
      <td>Group</td>
      <td> <?php echo $chosen_student[0]['group']; ?> </td>
    </tr>
    <tr>
      <td>Birth Year</td>
      <td> <?php echo $chosen_student[0]['birthYear']; ?> </td>
    </tr>
</table>

<a href="<?php echo site_url('Student/delete_student/').$idStudent;?>"><button class="btn btn-danger">Delete</button></a>
<a href="<?php echo site_url('Student/show_students/');?>"><button class="btn btn-primary">Cancel</button></a>
