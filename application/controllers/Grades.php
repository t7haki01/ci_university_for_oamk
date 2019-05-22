<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grades extends CI_Controller
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


  public function show_grades()
  {
    if($_SESSION['admin'] == false && isset($_SESSION['logged_in']) )
    {
      $this->load->model('Grades_model');
      $data['grades']=$this->Grades_model->get_grades_test();
      $data['content_page']='Grades/Show_grades';
      $this->load->view('Structure/Content', $data);
    }
    else
    {
    $this->load->model('Grades_model');
    $data['grades']=$this->Grades_model->get_grades();
    $data['content_page']='Grades/Show_grades';
    $this->load->view('Structure/Content', $data);
    }
  }


  public function course_selected($course_id)
  {
    if($_SESSION['admin'] == false && isset($_SESSION['logged_in']) )
    {
      $this->load->model('Grades_model');
      $data['idCourse']=$course_id;
      $data['chosen_course']=$this->Grades_model->get_chosen_course_test($course_id);
      $data['content_page']='Grades/Course_selected';
      $this->load->view('Structure/Content', $data);
    }
    else
    {
    $this->load->model('Grades_model');
    $data['idCourse']=$course_id;
    $data['chosen_course']=$this->Grades_model->get_chosen_course($course_id);
    $data['content_page']='Grades/Course_selected';
    $this->load->view('Structure/Content', $data);
    }
  }



  public function insert_a_grades()
  {
    if($_SESSION['admin'] == true)
    {
      $this->load->model('Grades_model');
      $update_id=$this->input->post('student');
      $insert_data=array(
        'arvosana'=>$this->input->post('arvo'),
        'date_of_grade'=>$this->input->post('g_date')
      );
      $success=$this->Grades_model->insert_a_grades($insert_data, $update_id);
      if($success)
      {
        $data['message']='Grade information is changed';
      }
      else
      {
        $data['message']='There was an error';
      }
      $data['content_page']='Grades/statue_of_grade';
      $this->load->view('Structure/Content', $data);
    }
    else
    {
      $data['message']='You do not have an access to this page';
      $data['content_page']='Pages/status';
      $this->load->view('Structure/Content',$data);
    }

      // $this->load->model('Grades_model');
      // $update_id=$this->input->post('student');
      // $insert_data=array(
      //
      //   'arvosana'=>$this->input->post('arvo'),
      //   'date_of_grade'=>$this->input->post('g_date')
      // );
      // $success=$this->Grades_model->insert_a_grades($insert_data, $update_id);
      // if($success)
      // {
      //   $data['message']='New grade is added to the database';
      // }
      // else
      // {
      //   $data['message']='There was an error';
      // }
      // $data['content_page']='Grades/statue_of_grade';
      // $this->load->view('Structure/Content', $data);

  }

}







?>
