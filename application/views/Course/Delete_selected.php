<h2>Delete a course</h2>
<p>Do you want to delete this course:</p>
<table class="table table-bordered table-condensed">
    <tr>
      <td width="200">ID</td>
      <td wdith="200"> <?php echo $chosen_course[0]['idCourse']; ?> </td>
    </tr>
    <tr>
      <td>Course Name</td>
      <td> <?php echo $chosen_course[0]['courseName']; ?> </td>
    </tr>
    <tr>
      <td>ECT Point</td>
      <td> <?php echo $chosen_course[0]['ectPoints']; ?> </td>
    </tr>
</table>

<a href="<?php echo site_url('Course/delete_course/').$idCourse;?>"><button class="btn btn-danger">Delete</button></a>
<a href="<?php echo site_url('Course/show_courses/');?>"><button class="btn btn-primary">Cancel</button></a>
