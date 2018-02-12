

<?php

class Course_model extends CI_model
{

  public function get_courses()
  {
    $this->db->select('*');
    $this->db->from('course');
    return $this->db->get()->result_array();
  }

  public function insert_a_course($insert_data)
  {
    $this->db->db_debug = false;
    $test=$this->db->insert('course', $insert_data);
    return $test;
  }

  public function get_chosen_course($delete_id)
  {
    $this->db->SELECT('idCourse, courseName, ectPoints');
    $this->db->from('course');
    $this->db->where('idCourse',$delete_id);
    return $this->db->get()->result_array();
  }

  public function delete_course($idCourse)
  {
    $this->db->db_debug = false;
    $this->db->where('idCourse',$idCourse);
    $test=$this->db->delete('course');
    return $test;
  }

  public function save_edited($update_id, $data_update)
  {
    $this->db->db_debug = false;
    $this->db->where('idCourse', $update_id);
    $test=$this->db->update('Course', $data_update);
    return $test;
  }



}

?>
