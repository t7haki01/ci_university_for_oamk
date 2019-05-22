<h1>Admin Menu</h1>


<p><?php echo $message; ?></p>

<table class="table table-condensed"><tr><td>
<table class="table table-hover table-bordered">
  <tr class="info">
    <th>Postal Code</th>
    <th>Post Place</th>
    <th>DELETE</th>
    <th>EDIT</th>
  </tr>

<?php
foreach ($post as $row)
{

  echo '<tr>';
  echo '<td>'.$row['postalCode'].'</td>';
  echo '<td>'.$row['postPlace'].'</td>';
  echo '<td> <a href="'.site_url('Main_cnt/delete_selected/')
       .$row['postalCode'].'"><button class="btn btn-danger">
       <span class="glyphicon glyphicon-remove"></span></button>
       </a></td>';
  echo '<td> <a href="'.site_url('Main_cnt/edit_selected/')
  .$row['postalCode'].'"><button class="btn btn-primary">
  <span class="glyphicon glyphicon-edit"></button></a></td>';
  echo '</tr>';

}
?>
</table></td>


<td><h2>Add a Postal Information</h2>

  <form action="<?php echo site_url('Main_cnt/admin_page');?>" method="post">
  <table class="table table-striped">
    <tr>
      <td class="text-right"> <label for="postalCode">Postal Code</label> </td>
      <td> <input type="number" name="postalCode" id="postalCode" required></td>
    </tr>
    <tr>
      <td class="text-right"> <label for="postplace">Post Place</label> </td>
      <td> <input type="text" name="postplace" id="postplace"></td>
    </tr>
    <tr>
      <td></td>
      <td> <input type="submit" class="btn btn-info" name="submit_btn" id="submit_btn" value="Add"> </td>
    </tr>
      </form>
<tr><td colspan="2"> <h2>PHP Information page</h2> </td></tr>
<tr><td colspan="2"> <a href="<?php echo site_url('Main_cnt/info_page');?>"> <button type="button" class="btn btn-info btn-lg" name="button">Info</button> </a>  </td>
</tr>
  </table>
</tr></table>
