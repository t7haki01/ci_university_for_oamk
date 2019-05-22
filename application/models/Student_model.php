


<?php

class Student_model extends CI_model
{

  public function get_students_id()
  {
    $this->db->select('student.idStudent, firstname, lastname, group, email, streetAddress, student.postalCode, postPlace, birthYear, group_concat(courseName)');
    $this->db->from('student');
    $this->db->join('postalCode', 'student.postalCode=postalCode.postalCode', 'left');
    $this->db->join('grades', 'student.idStudent=grades.idStudent', 'left');
    $this->db->join('course', 'grades.idCourse=course.idCourse', 'left');
    $this->db->group_by('student.idStudent');
    $this->db->where('student.idStudent', 1);
    return $this->db->get()->result_array();
  }


  public function get_post()
  {
    $this->db->select('postalCode, postPlace');
    $this->db->from('postalCode');
    return $this->db->get()->result_array();
  }

  public function get_post_without($edit_id)
  {
    $this->db->select('student.postalCode, postPlace');
    $this->db->from('postalCode');
    $this->db->join('student', 'postalCode.postalCode=student.postalCode', 'left');
    $this->db->group_by('postPlace');
    $this->db->OR_where('postPlace not in (select postPlace from
            student inner join postalCode on student.postalCode=postalCode.postalCode where idStudent='.$edit_id.')');
    return $this->db->get()->result_array();
  }


 public function get_students()
 {
   $this->db->select('student.idStudent, firstname, lastname, group, email, streetAddress, student.postalCode, postPlace, birthYear, group_concat(courseName)');
   $this->db->from('student');
   $this->db->join('postalCode', 'student.postalCode=postalCode.postalCode', 'left');
   $this->db->join('grades', 'student.idStudent=grades.idStudent', 'left');
   $this->db->join('course', 'grades.idCourse=course.idCourse', 'left');
   $this->db->group_by('student.idStudent');
   return $this->db->get()->result_array();
 }

 public function insert_a_student($insert_data)
 {
   $this->db->db_debug = false;
   $query_for_insert_student=$this->db->insert('student', $insert_data);
   return $query_for_insert_student;
 }

 public function get_chosen_student($delete_id)
 {
   $this->db->SELECT('idStudent, firstname, lastname, group, email, streetAddress, student.postalCode, birthYear, postPlace');
   $this->db->from('student');
   $this->db->join('postalCode', 'student.postalCode=postalCode.postalCode', 'left');
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
