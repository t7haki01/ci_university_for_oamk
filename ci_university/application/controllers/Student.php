

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller
{

  public function show_students()
  {
    $this->load->model('Student_model');
    $data['students']=$this->Student_model->get_students();

if(isset($_POST['submit_btn']))
{
    $this->load->model('Student_model');
    $insert_data=array(
      'idStudent'=>$this->input->post('studentid'),
      'firstname'=>$this->input->post('fname'),
      'lastname'=>$this->input->post('lname'),
      'group'=>$this->input->post('group'),
      'email'=>$this->input->post('email'),
      'streetAddress'=>$this->input->post('streetaddress'),
      'postalCode'=>$this->input->post('pstcode'),
      'birthYear'=>$this->input->post('byr')
    );
    $success=$this->Student_model->insert_a_student($insert_data);
    if($success)
    {
      $data['message']='New student is created to the database';
      header("Refresh:0");
    }
    else
    {
      $data['message']='There was an error';
    }
}
    $data['content_page']='Student/show_students';
    $this->load->view('Structure/content', $data);

  }

  public function delete_selected($delete_id)
  {
    $this->load->model('Student_model');
    $data['idStudent']=$delete_id;
    $data['chosen_student']=$this->Student_model->get_chosen_student($delete_id);
    $data['content_page']='student/delete_selected';
    $this->load->view('Structure/content', $data);
  }

  public function delete_student($idStudent)
  {
    $this->load->model('Student_model');
    $success=$this->Student_model->delete_student($idStudent);
    if($success)
    {
      $data['message']='The student has been deleted';
    }
    else
    {
        $data['message']='There was an error';
    }
    $data['content_page']='student/Add_student_to_db';
    $this->load->view('Structure/content',$data);
  }


  public function edit_selected($edit_id)
  {
    $this->load->model('Student_model');
    $data['idStudent']=$edit_id;
    $data['chosen_student']=$this->Student_model->get_chosen_student($edit_id);
    $data['content_page']='student/edit_selected';
    $this->load->view('Structure/content', $data);
  }

  public function save_edited()
  {
    $this->load->model('Student_model');
    $update_id=$this->input->post('student_id');
    $data_update=array(
      'firstname'=>$this->input->post('fname'),
      'lastname'=>$this->input->post('lname'),
      'group'=>$this->input->post('group'),
      'email'=>$this->input->post('email'),
      'streetAddress'=>$this->input->post('streetaddress'),
      'postalCode'=>$this->input->post('pstcode'),
      'birthYear'=>$this->input->post('byr')
    );
    $success=$this->Student_model->save_edited($update_id, $data_update);
    if($success)
    {
      $data['message']='You edited student successfully: '.$this->input->post('fname, lname');
    }
    else
    {
      $data['message'] = $this->input->post('fname, lname');
    }
    $data['content_page']='Student/add_student_to_db';
    $this->load->view('Structure/content',$data);
  }




}




?>
