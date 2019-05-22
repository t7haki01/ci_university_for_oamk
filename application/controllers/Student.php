

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller
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


  public function show_students()
  {
    if($_SESSION['admin'] == false && isset($_SESSION['logged_in']) )
    {
      $this->load->model('Student_model');
      $data['students']=$this->Student_model->get_students_id();
      $data['content_page']='Student/Show_students';
      $data['message']='<b>Here you can check your information or you can edit it</b>';
      $this->load->view('Structure/Content', $data);
    }
    else
    {
        $this->load->model('Student_model');
        $data['students']=$this->Student_model->get_students();
        $data['post']=$this->Student_model->get_post();
        $data['message']='<b>Here you can check students information or you can edit it</b>';
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
                    $data['message']='<b><span style="color:blue;">New student is created!</span></b>';
                    header("Refresh:0");
                  }
                  else
                  {
                    $data['message']='<b><span style="color:red;">There was an error!</span></b>';
                  }
              }
    $data['content_page']='Student/Show_students';
    $this->load->view('Structure/Content', $data);
}
  }

  public function delete_selected($delete_id)
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Student_model');
        $data['idStudent']=$delete_id;
        $data['chosen_student']=$this->Student_model->get_chosen_student($delete_id);
        $data['content_page']='Student/Delete_selected';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }


    // $this->load->model('Student_model');
    // $data['idStudent']=$delete_id;
    // $data['chosen_student']=$this->Student_model->get_chosen_student($delete_id);
    // $data['content_page']='Student/Delete_selected';
    // $this->load->view('Structure/Content', $data);
  }
}
  public function delete_student($idStudent)
  {
    // if(isset($_SESSION['logged_in']))
    // {
    //   if($_SESSION['admin'] == true)
    //   {
    //     $this->load->model('Student_model');
    //     $success=$this->Student_model->delete_student($idStudent);
    //     if($success)
    //     {
    //       $data['message']='The student has been deleted';
    //     }
    //     else
    //     {
    //         $data['message']='There was an error';
    //     }
    //     $data['content_page']='Student/Add_student_to_db';
    //     $this->load->view('Structure/Content',$data);
    //   }
    //   else
    //   {
    //     $data['message']='You do not have an access to this page';
    //     $data['content_page']='Pages/status';
    //     $this->load->view('Structure/content',$data);
    //   }
    // }



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
    $data['content_page']='Student/Add_student_to_db';
    $this->load->view('Structure/Content',$data);

}

  public function edit_selected($edit_id)
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true || $_SESSION['user'] == 'student01' )
      {
        $this->load->model('Student_model');
        $data['idStudent']=$edit_id;
        $data['post']=$this->Student_model->get_post_without($edit_id);
        $data['chosen_student']=$this->Student_model->get_chosen_student($edit_id);
        $data['content_page']='Student/Edit_selected';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }



    // $this->load->model('Student_model');
    // $data['idStudent']=$edit_id;
    // $data['chosen_student']=$this->Student_model->get_chosen_student($edit_id);
    // $data['content_page']='Student/Edit_selected';
    // $this->load->view('Structure/Content', $data);
  }
}
  public function save_edited()
  {
    if(isset($_SESSION['logged_in']))
    {
        $this->load->model('Student_model');
        $update_id=$this->input->post('studentid');
        $data_update=array(
                          'idStudent'=>$this->input->post('student_id'),
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
          $data['message']='You edited student successfully';
        }
        else
        {
          $data['message'] = 'Something went wrong';
        }
        $data['content_page']='Student/Add_student_to_db';
        $this->load->view('Structure/Content',$data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }



    // $this->load->model('Student_model');
    // $update_id=$this->input->post('student_id');
    // $data_update=array(
    //   'firstname'=>$this->input->post('fname'),
    //   'lastname'=>$this->input->post('lname'),
    //   'group'=>$this->input->post('group'),
    //   'email'=>$this->input->post('email'),
    //   'streetAddress'=>$this->input->post('streetaddress'),
    //   'postalCode'=>$this->input->post('pstcode'),
    //   'birthYear'=>$this->input->post('byr')
    // );
    // $success=$this->Student_model->save_edited($update_id, $data_update);
    // if($success)
    // {
    //   $data['message']='You edited student successfully: '.$this->input->post('fname, lname');
    // }
    // else
    // {
    //   $data['message'] = $this->input->post('fname, lname');
    // }
    // $data['content_page']='Student/Add_student_to_db';
    // $this->load->view('Structure/Content',$data);
  // }
}



}




?>
