


<?php

class Student_model extends CI_model
{

 public function get_students()
 {
   $this->db->select('*');
   $this->db->from('student');
   return $this->db->get()->result_array();
 }

 public function insert_a_student($insert_data)
 {
   $this->db->db_debug = false;
   $test=$this->db->insert('student', $insert_data);
   return $test;
 }

 public function get_chosen_student($delete_id)
 {
   $this->db->SELECT('firstname, lastname, group, email, streetAddress, postalCode, birthYear');
   $this->db->from('student');
   $this->db->where('idStudent',$delete_id);
   return $this->db->get()->result_array();
 }

 public function delete_student($idStudent)
 {
   $this->db->db_debug = false;
   $this->db->where('idStudent',$idStudent);
   $test=$this->db->delete('student');
   return $test;
 }

 public function save_edited($update_id, $data_update)
 {
   $this->db->db_debug = false;
   $this->db->where('idStudent', $update_id);
   $test=$this->db->update('student', $data_update);
   return $test;
 }



}



?>
