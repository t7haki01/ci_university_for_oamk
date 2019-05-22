


<?php

class Grades_model extends CI_model
{
  public function get_grades_test()
  {
    $this->db->select('course.idCourse, idGrades, courseName, ectPoints, firstname, lastname, arvosana, date_of_grade');
    $this->db->from('student');
    $this->db->join('grades', 'student.idStudent=grades.idStudent' ,'left');
    $this->db->join('course', 'grades.idCourse=course.idCourse', 'right');
    $this->db->where('student.idStudent', 1);
    $this->db->group_by('courseName');
    $this->db->order_by('course.idCourse');
    return $this->db->get()->result_array();
  }


 public function get_grades()
 {
   $this->db->select('course.idCourse, idGrades, courseName, ectPoints, firstname, lastname, arvosana, date_of_grade');
   $this->db->from('student');
   $this->db->join('grades', 'student.idStudent=grades.idStudent' ,'left');
   $this->db->join('course', 'grades.idCourse=course.idCourse', 'right');
   $this->db->group_by('courseName');
   $this->db->order_by('course.idCourse');
   return $this->db->get()->result_array();
 }

 public function insert_a_grades($insert_data, $update_id)
 {
   $this->db->db_debug = false;
   $this->db->where('idGrades', $update_id);
   $test=$this->db->update('grades', $insert_data);
   return $test;
 }

 public function get_chosen_course($delete_id)
 {
   $this->db->select('course.idCourse, idGrades, courseName, ectPoints, firstname, lastname, group, arvosana, date_of_grade');
   $this->db->from('student');
   $this->db->join('grades', 'student.idStudent=grades.idStudent' ,'left');
   $this->db->join('course', 'grades.idCourse=course.idCourse', 'right');
   $this->db->where('course.idCourse', $delete_id);
   return $this->db->get()->result_array();
 }

public function get_chosen_course_test($delete_id)
{
  $this->db->select('course.idCourse, idGrades, courseName, ectPoints, firstname, lastname, group, arvosana, date_of_grade');
  $this->db->from('student');
  $this->db->join('grades', 'student.idStudent=grades.idStudent' ,'left');
  $this->db->join('course', 'grades.idCourse=course.idCourse', 'right');
  $this->db->where('course.idCourse', $delete_id);
  $this->db->where('student.idStudent', 1);
  return $this->db->get()->result_array();
}


}



?>
