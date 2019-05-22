



<?php

class Main_model extends CI_model
{

    public function get_postalcode()
    {
      $this->db->select('postalCode, postPlace');
      $this->db->from('postalCode');
      return $this->db->get()->result_array();
    }


    public function get_chosen_post($delete_id)
    {
      $this->db->SELECT('postalCode, postPlace');
      $this->db->from('postalCode');
      $this->db->where('postalCode',$delete_id);
      return $this->db->get()->result_array();
    }


    public function insert_a_post($insert_data)
    {
      $this->db->db_debug = false;
      $test=$this->db->insert('postalCode', $insert_data);
      return $test;
    }

    public function delete_post($postalCode)
    {
      $this->db->db_debug = false;
      $this->db->where('postalCode',$postalCode);
      $test=$this->db->delete('postalCode');
      return $test;
    }

    public function save_edited($update_id, $data_update)
    {
      $this->db->db_debug = false;
      $this->db->where('postalCode', $update_id);
      $test=$this->db->update('postalCode', $data_update);
      return $test;
    }

}

?>
