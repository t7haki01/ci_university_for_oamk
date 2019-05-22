

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if(isset($_SESSION['logged_in']))
    {
    }
    else
    {
        redirect('login/login_form');
    }
  }


  public function search_page()
  {
    $data['content_page']='Search/search_main';
    $this->load->view('Structure/Content', $data);
  }

  public function search_student()
  {
    $this->load->model('Search_model');
    $students_name=$this->input->post('student_search');
    $data['search_student_result']=$this->Search_model->search_student_by_name($students_name);
    $data['content_page']='Search/search_result_student';
    $this->load->view('Structure/Content',$data);
  }

  public function search_course()
  {
    $this->load->model('Search_model');
    $courses_name=$this->input->post('course_search');
    $data['search_course_result']=$this->Search_model->search_course_by_name($courses_name);
    $data['content_page']='Search/search_result_course';
    $this->load->view('Structure/Content',$data);
  }



}

?>
