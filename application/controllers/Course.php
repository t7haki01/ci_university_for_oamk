




<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller
{


  public function show_courses()
  {
    $this->load->model('Course_model');
    $data['courses']=$this->Course_model->get_courses();

if(isset($_POST['submit_btn']))
{
    $this->load->model('Course_model');
    $insert_data=array(
      'idCourse'=>$this->input->post('courseid'),
      'courseName'=>$this->input->post('course_name'),
      'ectPoints'=>$this->input->post('ect')
                      );
    $success=$this->Course_model->insert_a_course($insert_data);
    if($success)
    {
      $data['message']='New course is created to the database';
      header("Refresh:0");
    }
    else
    {
      $data['message']='There was an error';
    }
}
    $data['content_page']='Course/show_courses';
    $this->load->view('Structure/content', $data);

  }

  public function delete_selected($delete_id)
  {
    $this->load->model('Course_model');
    $data['idCourse']=$delete_id;
    $data['chosen_course']=$this->Course_model->get_chosen_course($delete_id);
    $data['content_page']='course/delete_selected';
    $this->load->view('Structure/content', $data);
  }

  public function delete_course($idCourse)
  {
    $this->load->model('Course_model');
    $success=$this->Course_model->delete_course($idCourse);
    if($success)
    {
      $data['message']='The course has been deleted';
    }
    else
    {
        $data['message']='There was an error';
    }
    $data['content_page']='Course/Add_course_to_db';
    $this->load->view('Structure/content',$data);
  }


  public function edit_selected($edit_id)
  {
    $this->load->model('Course_model');
    $data['idCourse']=$edit_id;
    $data['chosen_course']=$this->Course_model->get_chosen_course($edit_id);
    $data['content_page']='course/edit_selected';
    $this->load->view('Structure/content', $data);
  }

  public function save_edited()
  {
    $this->load->model('Course_model');
    $update_id=$this->input->post('courseid'); // here should be that hidden id from edit page
    $data_update=array(
      'idCourse'=>$this->input->post('course_id'), // here should be editted id
      'courseName'=>$this->input->post('course_name'),
      'ectPoints'=>$this->input->post('ect')
    );
    $success=$this->Course_model->save_edited($update_id, $data_update);
    if($success)
    {
      $data['message']='You edited course successfully: '.$this->input->post('course_name');
    }
    else
    {
      $data['message'] = $this->input->post('course_name');
    }
    $data['content_page']='Course/add_course_to_db';
    $this->load->view('Structure/content',$data);
  }


}
?>
