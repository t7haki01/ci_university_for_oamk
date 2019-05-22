<h2>Edit a Postal Information</h2>
  <form action="<?php echo site_url('Main_cnt/save_edited'); ?> " method="post">
  <input type="hidden" name="postalCode" value="<?php echo $postalCode;?>">
  <label>Postal Code</label><br>
  <input type="number" name="postal_Code" value="<?php echo $chosen_post[0]['postalCode'];?>">
  <br>

  <label>Post Place</label><br>
  <input type="text" name="postPlace" value="<?php echo $chosen_post[0]['postPlace']; ?>">
  <br>

  <br>
  <input class="btn btn-link btn-m" type="submit" value="Save">
  <a href="<?php echo site_url('Main_cnt/admin_page'); ?>">
    <span style="color:red; font-size:13px;">Cancel</span></a>
</form>
