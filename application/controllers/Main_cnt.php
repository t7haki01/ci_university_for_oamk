<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Main_cnt extends CI_Controller
{
  public function index()
  {
    $data['content_page']='Pages/Main';
    $this->load->view('Structure/Content', $data);
  }

  public function admin_page()
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Main_model');
        $data['post']=$this->Main_model->get_postalcode();
        $data['message']='<b>Edit postalcode and place</b>';
        if(isset($_POST['submit_btn']))
        {
            $this->load->model('Main_model');
            $insert_data=array(
              'postalCode'=>$this->input->post('postalCode'),
              'postPlace'=>$this->input->post('postplace'),
            );
            $success=$this->Main_model->insert_a_post($insert_data);
            if($success)
            {
              $data['message']='<b><span style="color:blue;">New post is added</span></b>';
              header("Refresh:0");
            }
            else
            {
              $data['message']='<b><span style="color:red;">There was an error</span></b>';
            }
        }

        $data['content_page']='Pages/admin';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
    }


      // $this->load->model('Main_model');
      // $data['post']=$this->Main_model->get_postalcode();
      // if(isset($_POST['submit_btn']))
      // {
      //     $this->load->model('Main_model');
      //     $insert_data=array(
      //       'postalCode'=>$this->input->post('postalCode'),
      //       'postPlace'=>$this->input->post('postplace'),
      //     );
      //     $success=$this->Main_model->insert_a_post($insert_data);
      //     if($success)
      //     {
      //       $data['message']='New student is created to the database';
      //       header("Refresh:0");
      //     }
      //     else
      //     {
      //       $data['message']='There was an error';
      //     }
      // }
      //
      // $data['content_page']='Pages/admin';
      // $this->load->view('Structure/Content', $data);


  }

  public function edit_selected($edit_id)
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Main_model');
        $data['postalCode']=$edit_id;
        $data['chosen_post']=$this->Main_model->get_chosen_post($edit_id);
        $data['content_page']='Pages/edit_selected';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }



    // $this->load->model('Main_model');
    // $data['postalCode']=$edit_id;
    // $data['chosen_post']=$this->Main_model->get_chosen_post($edit_id);
    // $data['content_page']='Pages/edit_selected';
    // $this->load->view('Structure/Content', $data);
  }
}

  public function delete_selected($delete_id)
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Main_model');
        $data['postalCode']=$delete_id;
        $data['chosen_post']=$this->Main_model->get_chosen_post($delete_id);
        $data['content_page']='Pages/delete_selected';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }



    // $this->load->model('Main_model');
    // $data['postalCode']=$delete_id;
    // $data['chosen_post']=$this->Main_model->get_chosen_post($delete_id);
    // $data['content_page']='Pages/delete_selected';
    // $this->load->view('Structure/Content', $data);
  }
}
  public function delete_post($postalCode)
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Main_model');
        $success=$this->Main_model->delete_post($postalCode);
        if($success)
        {
          $data['message']='The postal information has been deleted';
        }
        else
        {
            $data['message']='There was an error';
        }
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }



    // $this->load->model('Main_model');
    // $success=$this->Main_model->delete_post($postalCode);
    // if($success)
    // {
    //   $data['message']='The postal information has been deleted';
    // }
    // else
    // {
    //     $data['message']='There was an error';
    // }
    // $data['content_page']='Pages/status';
    // $this->load->view('Structure/Content',$data);
  }
}
  public function save_edited()
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Main_model');
        $update_id=$this->input->post('postalCode');
        $data_update=array(
          'postalCode'=>$this->input->post('postal_Code'), // here should be editted id
          'postPlace'=>$this->input->post('postPlace'),
        );
        $success=$this->Main_model->save_edited($update_id, $data_update);
        if($success)
        {
          $data['message']='You edited Postal Information successfully';
        }
        else
        {
          $data['message'] = 'Something went wrong';
        }
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }

    // $this->load->model('Main_model');
    // $update_id=$this->input->post('postalCode');
    // $data_update=array(
    //   'postalCode'=>$this->input->post('postalCode'), // here should be editted id
    //   'postPlace'=>$this->input->post('postPlace'),
    // );
    // $success=$this->Main_model->save_edited($update_id, $data_update);
    // if($success)
    // {
    //   $data['message']='You edited Postal Information successfully: '.$this->input->post('postplace');
    // }
    // else
    // {
    //   $data['message'] = 'Something went wrong';
    // }
    // $data['content_page']='Pages/status';
    // $this->load->view('Structure/Content',$data);
  }
}


public function info_page()
{
    $this->load->view('Pages/info');
}


}


?>
