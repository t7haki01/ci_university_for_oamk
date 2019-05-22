


<?php

class Search_model extends CI_model
{
  public function search_student_by_name($students_name)
  {
    $this->db->SELECT('idStudent, firstname, lastname, group, email, streetAddress, postalCode, birthYear');
    $this->db->from('student');
    $this->db->like('firstname', $students_name);
    $this->db->or_like('lastname', $students_name);
    return $this->db->get()->result_array();
  }

  public function search_course_by_name($courses_name)
  {
    $this->db->SELECT('course.idCourse, courseName, ectPoints, count(grades.idStudent)');
    $this->db->from('course');
    $this->db->join('grades', 'course.idCourse=grades.idCourse', 'left');
    $this->db->join('student', 'grades.idStudent=student.idStudent', 'left');
    $this->db->like('courseName', $courses_name);
    $this->db->group_by('course.courseName');
    return $this->db->get()->result_array();
  }





}
?>
