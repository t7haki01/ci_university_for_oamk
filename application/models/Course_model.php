

<?php

class Course_model extends CI_model
{

  public function get_courses_only_own()
  {
    // $this->db->select('idCourse');
    // $this->db->from('student');
    // $this->db->join('grades', 'student.idStudent=grades.idStudent', 'inner');
    // $this->db->where('grades.idStudebt', 1);
    //

    $this->db->select('course.idCourse, grades.idCourse, idGrades, course.courseName, ectPoints, group_concat(firstname, lastname), count(student.idStudent)');
    $this->db->from('student');
    $this->db->join('grades', 'student.idStudent=grades.idStudent', 'left');
    $this->db->join('course', 'grades.idCourse=course.idCourse', 'right');
    $this->db->group_by('grades.idCourse');
    // $this->db->having('count(grades.idStudent) = 0');
    // $this->db->or_having('grades.idCourse!=1');

    // $this->db->where('grades.idCourse', 8);
    $this->db->or_WHERE('grades.idCourse NOT IN (Select idCourse from student
              left join grades on student.idStudent=grades.idStudent where grades.idStudent=1)', NULL, False);

    return $this->db->get()->result_array();
  }


  public function get_courses_id()
  {
    $this->db->select('course.idCourse, idGrades, course.courseName, ectPoints, group_concat(firstname, lastname), count(student.idStudent)');
    $this->db->from('student');
    $this->db->join('grades', 'student.idStudent=grades.idStudent', 'left');
    $this->db->join('course', 'grades.idCourse=course.idCourse', 'right');
    $this->db->group_by('idCourse');
    $this->db->WHERE('student.idStudent', 1);
    return $this->db->get()->result_array();
  }
//need to figure out 23_2

  public function get_courses()
  {
    $this->db->select('course.idCourse, course.courseName, ectPoints, group_concat(firstname, lastname), count(student.idStudent)');
    $this->db->from('student');
    $this->db->join('grades', 'student.idStudent=grades.idStudent', 'left');
    $this->db->join('course', 'grades.idCourse=course.idCourse', 'right');
    $this->db->group_by('idCourse');
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
    $this->db->SELECT('course.idCourse, courseName, ectPoints, firstname, lastname, group, group_concat(firstname, lastname)');
    $this->db->from('course');
    $this->db->join('grades', 'course.idCourse=grades.idCourse', 'right');
    $this->db->join('student', 'grades.idStudent=student.idStudent', 'right');
    $this->db->where('course.idCourse',$delete_id);
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
    $test=$this->db->update('course', $data_update);
    return $test;
  }

  public function course_student_add($course_id)
  {
    $this->db->SELECT('idStudent, firstname, lastname, group');
    $this->db->from('student');
    return $this->db->get()->result_array();
  }

  public function add_student_tothe_course($add_data)
  {
    $this->db->db_debug = false ;
    $test=$this->db->insert('grades', $add_data);
    return $test;
  }


  public function get_course_student($delete_id)
  {
    $this->db->SELECT('student.idStudent, firstname, lastname, group, idGrades');
    $this->db->from('student');
    $this->db->join('grades', 'student.idStudent=grades.idStudent', 'left');
    $this->db->where('idCourse', $delete_id);
    return $this->db->get()->result_array();
  }

  public function remove_student_from_course($delete_student_id)
  {
    $this->db->db_debug = false;
    $this->db->where('idGrades', $delete_student_id);
    $test=$this->db->delete('grades');
    return $test;
  }

  public function remove_student_from_course_test($delete_student_id, $delete_grades_id)
  {
    $this->db->db_debug = false;
    $this->db->where('idStudent', $delete_student_id);
    $this->db->where('idGrades', $delete_grades_id);
    $test=$this->db->delete('grades');
    return $test;
  }


  public function get_course_name($delete_id)
  {
    $this->db->SELECT('courseName');
    $this->db->from('course');
    $this->db->where('idCourse', $delete_id);
    return $this->db->get()->result_array();

  }



}

?>
