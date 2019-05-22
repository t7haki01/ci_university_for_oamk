



<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function login_form()
  {
    $data['content_page']='Pages/login_form';
    $this->load->view('Structure/Content', $data);
  }

  public function log_in()
  {
    $id_form=$this->input->post('id');
    $pass_form=$this->input->post('password');
    $admin_id='admin';
    $admin_password='admin123';

    $student_id='student01';
    $student_pass='pass01';

    if($id_form==$admin_id && $pass_form==$admin_password)
      {
        $_SESSION['logged_in']=true;
        $_SESSION['admin']=true;
        $_SESSION['user']=$id_form;
        $data['message']='You have logged in as '.$id_form;
      }
      else  if($id_form==$student_id && $pass_form==$student_pass)
        {
          $_SESSION['logged_in']=true;
          $_SESSION['admin']=false;
          $_SESSION['user']=$id_form;
          $data['message']='You have logged in as '.$id_form;
        }
    else
      {
        $data['message']='ID or Password was wrong';
      }

    $data['content_page']='Pages/status';
    $this->load->view('Structure/Content',$data);

  }

  public function logout()
  {
    $_SESSION['logged_in']=false;
     SESSION_DESTROY();
     $data['message']='You have logged out';
     $_SESSION['user']='Guest';
     $data['content_page']='Pages/status';
     $this->load->view('Structure/Content',$data);
  }




}
?>
