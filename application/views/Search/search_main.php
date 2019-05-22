<h1>Search</h1>
<table class="table table-striped table-condensed"><form class="" action="<?php echo site_url('Search/search_student'); ?>" method="post"><tr>
  <td class="text-right"><label for="student_search">Search Student by Name</label></td>
<td>  <input type="text" class="form-control" name="student_search" id="student_search" placeholder="Search Student by name"> </td>
<td>  <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></td>
</tr></form>

<form class="" action="<?php echo site_url('Search/search_course'); ?>" method="post"><tr>
<td class="text-right">  <label for="course_search">Search Course by Name</label> </td>
<td>  <input type="text" class="form-control" id="course_search" name="course_search" placeholder="Search Course by name"> </td>
<td>  <input type="submit" name="" class="btn btn-info" value="Search"> </td>
</tr></form>
</table>
