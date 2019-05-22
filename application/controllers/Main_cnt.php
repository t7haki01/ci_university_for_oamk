<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Main_cnt extends CI_Controller
{

  public function index()
  {
    $data['content_page']='Pages/Main';
    $this->load->view('Structure/Content', $data);
  }


}


?>
