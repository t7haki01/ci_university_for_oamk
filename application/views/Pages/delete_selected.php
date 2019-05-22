<h2>Delete a Postal Information</h2>
<p>Do you want to delete this Postal Information:</p>
<table class="table table-bordered table-condensed">
    <tr>
      <td width="200">Postal Code</td>
      <td wdith="200"> <?php echo $chosen_post[0]['postalCode']; ?> </td>
    </tr>
    <tr>
      <td>Post Place</td>
      <td> <?php echo $chosen_post[0]['postPlace']; ?> </td>
    </tr>
</table>

<a href="<?php echo site_url('Main_cnt/delete_post/').$postalCode;?>"><button class="btn btn-danger">Delete</button></a>
<a href="<?php echo site_url('Main_cnt/admin_page/');?>"><button class="btn btn-primary">Cancel</button></a>
