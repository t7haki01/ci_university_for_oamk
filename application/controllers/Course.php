




<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller
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

  public function show_courses()
  {
    if($_SESSION['admin'] == false && isset($_SESSION['logged_in']) )
    {
      $this->load->model('Course_model');
      $data['courses_own']=$this->Course_model->get_courses_id();
      $data['courses']=$this->Course_model->get_courses_only_own();
      $data['message']='<b>Here you can check information about course, enroll a course or disenroll a course</b>';
    }
    else
    {
      $data['message']='<b>Here you can check information about course or edit a course</b>';
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
                  header("Refresh:0");
                  $data['message']='<b><span style="color:blue;">New course is added!</span></b>';
                }
                else
                {
                  $data['message']='<b><span style="color:red;">There was an error!</span></b>';
                }
            }
      }
    $data['content_page']='Course/Show_courses';
    $this->load->view('Structure/Content', $data);

  }

  public function delete_selected($delete_id)
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Course_model');
        $data['idCourse']=$delete_id;
        $data['chosen_course']=$this->Course_model->get_chosen_course($delete_id);
        $data['content_page']='Course/Delete_selected';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
    }

    // $this->load->model('Course_model');
    // $data['idCourse']=$delete_id;
    // $data['chosen_course']=$this->Course_model->get_chosen_course($delete_id);
    // $data['content_page']='Course/Delete_selected';
    // $this->load->view('Structure/Content', $data);
  }

  public function delete_course($idCourse)
  {
    // $this->load->model('Course_model');
    // $success=$this->Course_model->delete_course($idCourse);
    // if($success)
    // {
    //   $data['message']='The course has been deleted';
    // }
    // else
    // {
    //     $data['message']='There was an error';
    // }
    // $data['content_page']='Course/Add_course_to_db';
    // $this->load->view('Structure/Content',$data);

    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
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
        $this->load->view('Structure/Content',$data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
    }

  }


  public function edit_selected($edit_id)
  {
    // $this->load->model('Course_model');
    // $data['idCourse']=$edit_id;
    // $data['chosen_course']=$this->Course_model->get_chosen_course($edit_id);
    // $data['content_page']='Course/Edit_selected';
    // $this->load->view('Structure/Content', $data);
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Course_model');
        $data['idCourse']=$edit_id;
        $data['chosen_course']=$this->Course_model->get_chosen_course($edit_id);
        $data['content_page']='Course/Edit_selected';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
    }
  }

  public function save_edited()
  {
    // $this->load->model('Course_model');
    // $update_id=$this->input->post('courseid'); // here should be that hidden id from edit page
    // $data_update=array(
    //   'idCourse'=>$this->input->post('course_id'), // here should be editted id
    //   'courseName'=>$this->input->post('course_name'),
    //   'ectPoints'=>$this->input->post('ect')
    // );
    // $success=$this->Course_model->save_edited($update_id, $data_update);
    // if($success)
    // {
    //   $data['message']='You edited course successfully: '.$this->input->post('course_name');
    // }
    // else
    // {
    //   $data['message'] = $this->input->post('course_name');
    // }
    // $data['content_page']='Course/Add_course_to_db';
    // $this->load->view('Structure/Content',$data);

    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
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
        $data['content_page']='Course/Add_course_to_db';
        $this->load->view('Structure/Content',$data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
    }

  }

  public function add_student_course($course_id)
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Course_model');
        $data['idCourse']=$course_id;
        $data['courseName']=$this->Course_model->get_course_name($course_id);
        $data['students_for_course']=$this->Course_model->course_student_add($course_id);
        $data['content_page']='Course/student_add_course';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
    }

    // $this->load->model('Course_model');
    // $data['idCourse']=$course_id;
    // $data['courseName']=$this->Course_model->get_course_name($course_id);
    // $data['students_for_course']=$this->Course_model->course_student_add($course_id);
    // $data['content_page']='Course/student_add_course';
    // $this->load->view('Structure/Content', $data);
  }

  public function add_student_to_course()
  {

    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Course_model');
        $add_data=array(
          'idGrades'=>$this->input->post('idGrades'),
          'idStudent'=>$this->input->post('student_selection'),
          'idCourse'=>$this->input->post('idCourse'),
          'arvosana'=>$this->input->post('arvo'),
          'date_of_grade'=>$this->input->post('grade_date')
        );

        $success=$this->Course_model->add_student_tothe_course($add_data);
        if($success)
        {
          $data['message']='You have added a new student';
        }
        else
        {
            $data['message']='Something went wrong, check the Grades ID';
        }
        $data['content_page']='Course/Add_course_to_db';
        $this->load->view('Structure/Content',$data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
    }

    // $this->load->model('Course_model');
    // $add_data=array(
    //   'idGrades'=>$this->input->post('idGrades'),
    //   'idStudent'=>$this->input->post('student_selection'),
    //   'idCourse'=>$this->input->post('idCourse'),
    //   'arvosana'=>$this->input->post('arvo'),
    //   'date_of_grade'=>$this->input->post('grade_date')
    // );
    //
    // $success=$this->Course_model->add_student_tothe_course($add_data);
    // if($success)
    // {
    //   $data['message']='You have added a new student';
    // }
    // else
    // {
    //     $data['message']='Something went wrong, check the Grades ID';
    // }
    // $data['content_page']='Course/Add_course_to_db';
    // $this->load->view('Structure/content',$data);

  }

  public function add_student_to_course_test()
  {
    if($_SESSION['admin'] == false && isset($_SESSION['logged_in']) )
    {
        $this->load->model('Course_model');
        $add_data=array(
          'idGrades'=>0,
          'idStudent'=>1,
          'idCourse'=>$this->input->post('idCourse_test'),
          'arvosana'=>0,
          'date_of_grade'=>0
        );

        $success=$this->Course_model->add_student_tothe_course($add_data);
        if($success)
        {
          $data['message']='You have enrolled a course';
        }
        else
        {
            $data['message']='Something went wrong, check the Grades ID
                            <br>'.$add_data['idCourse'].
                            '<br>'.$add_data['idGrades'];
        }
        $data['content_page']='Course/Add_course_to_db';
        $this->load->view('Structure/Content',$data);
    }
    else
    {
      $data['message']='You do not have an access to this page';
      $data['content_page']='Pages/status';
      $this->load->view('Structure/Content',$data);
    }
  }





  public function remove_student_course($delete_id)
  {
    if(isset($_SESSION['logged_in']))
    {
      if($_SESSION['admin'] == true)
      {
        $this->load->model('Course_model');
        $data['idCourse']=$delete_id;
        $data['courseName']=$this->Course_model->get_course_name($delete_id);
        $data['chosen_student']=$this->Course_model->get_course_student($delete_id);
        $data['content_page']='Course/student_remove_course';
        $this->load->view('Structure/Content', $data);
      }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }
    }

    // $this->load->model('Course_model');
    // $data['idCourse']=$delete_id;
    // $data['courseName']=$this->Course_model->get_course_name($delete_id);
    // $data['chosen_student']=$this->Course_model->get_course_student($delete_id);
    // $data['content_page']='Course/student_remove_course';
    // $this->load->view('Structure/Content', $data);
  }

  public function remove_student_from_course()
  {
    if(isset($_SESSION['logged_in']))
    {
        $this->load->model('Course_model');
        $delete_student_id=$this->input->post('student_selection') ;
        $success=$this->Course_model->remove_student_from_course($delete_student_id);
          if($success)
          {
            $data['message']='You have removed a student';
          }
          else
          {
              $data['message']='Something went wrong, check the Grades ID';
          }
          $data['content_page']='Course/Add_course_to_db';
          $this->load->view('Structure/Content', $data);
    }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }



    // $this->load->model('Course_model');
    // $delete_student_id=$this->input->post('student_selection') ;
    // $success=$this->Course_model->remove_student_from_course($delete_student_id);
    //   if($success)
    //   {
    //     $data['message']='You have removed a student';
    //   }
    //   else
    //   {
    //       $data['message']='Something went wrong, check the Grades ID';
    //   }
    //   $data['content_page']='Course/Add_course_to_db';
    //   $this->load->view('Structure/Content', $data);

  }

  public function remove_student_from_course_test()
  {
    if(isset($_SESSION['logged_in']))
    {
        $this->load->model('Course_model');
        $delete_student_id=$this->input->post('student_selection') ;
        $delete_grades_id=$this->input->post('grades_selection') ;
        $success=$this->Course_model->remove_student_from_course_test($delete_student_id, $delete_grades_id);
          if($success)
          {
            $data['message']='You have disenrolled a course';
          }
          else
          {
              $data['message']='Something went wrong';
          }
          $data['content_page']='Course/Add_course_to_db';
          $this->load->view('Structure/Content', $data);
    }
      else
      {
        $data['message']='You do not have an access to this page';
        $data['content_page']='Pages/status';
        $this->load->view('Structure/Content',$data);
      }



    // $this->load->model('Course_model');
    // $delete_student_id=$this->input->post('student_selection') ;
    // $success=$this->Course_model->remove_student_from_course($delete_student_id);
    //   if($success)
    //   {
    //     $data['message']='You have removed a student';
    //   }
    //   else
    //   {
    //       $data['message']='Something went wrong, check the Grades ID';
    //   }
    //   $data['content_page']='Course/Add_course_to_db';
    //   $this->load->view('Structure/Content', $data);

  }







}
?>
