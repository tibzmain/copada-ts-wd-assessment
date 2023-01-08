<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
	
	 

	public function index()
	{	
		// var_dump( count($this->session->all_userdata()) ); die();

		if( $this->session->userdata('username') != '' ) {
			redirect('/welcome/home');
		}else{

			$data["notif"]  = $this->session->flashdata('message');
			$data["message"]  = $this->session->flashdata('success');
			$data["header"]  = $this->session->flashdata('header');
			// $this->session->set_flashdata('notif', 'error');
			// var_dump($data["message"]); 
			$this->load->view('login', $data);
		}
	}

	public function home()
	{	
		// var_dump($this->session->get_userdata() ); die();
		if( $this->session->userdata('username') != '') {

			$this->load->model('user_model');
			$data["getData"] = $this->user_model->getData();
			$data["students"] = $this->user_model->getStudent();
			$data["notif"]  = $this->session->flashdata('message');
			$data["message"]  = $this->session->flashdata('success');
			$data["header"]  = $this->session->flashdata('header');
			// var_dump($data["students"]); die();
			$this->load->view('header');
			$this->load->view('home', $data);
			$this->load->view('footer');
		}else{

			redirect('/');
		}
		
	}

	public function colleges()
	{	
		// var_dump($this->session->get_userdata() ); die();
		if( count($this->session->get_userdata() ) > 1 ) {

			$this->load->model('user_model');
			// $data["getData"] = $this->user_model->getCollege();
			$data["students"] = $this->user_model->getCollege();
			$data["notif"]  = $this->session->flashdata('message');
			$data["message"]  = $this->session->flashdata('success');
			$data["header"]  = $this->session->flashdata('header');
			// var_dump($data["students"]); die();
			$this->load->view('header');
			$this->load->view('college', $data);
			$this->load->view('footer');
		}else{

			redirect('/');
		}
		
	}

	public function program()
	{	
		// var_dump($this->session->get_userdata() ); die();
		if( count($this->session->get_userdata() ) > 1 ) {

			$this->load->model('user_model');
			// $data["getData"] = $this->user_model->getCollege();
			$data["students"] = $this->user_model->getProgram();
			$data["notif"]  = $this->session->flashdata('message');
			$data["message"]  = $this->session->flashdata('success');
			$data["header"]  = $this->session->flashdata('header');
			// var_dump($data["students"]); die();
			$this->load->view('header');
			$this->load->view('program', $data);
			$this->load->view('footer');
		}else{

			redirect('/');
		}
		
	}

	public function course()
	{	
		// var_dump($this->session->get_userdata() ); die();
		if( count($this->session->get_userdata() ) > 1 ) {

			$this->load->model('user_model');
			// $data["getData"] = $this->user_model->getCollege();
			$data["students"] = $this->user_model->getCourse();
			$data["notif"]  = $this->session->flashdata('message');
			$data["message"]  = $this->session->flashdata('success');
			$data["header"]  = $this->session->flashdata('header');
			// var_dump($data["students"]); die();
			$this->load->view('header');
			$this->load->view('course', $data);
			$this->load->view('footer');
		}else{

			redirect('/');
		}
		
	}

	public function login_auth(){
		
		if( $this->input->post('submit') == "Submit")
        {
        	
        	$this->form_validation->set_rules('username', 'Username', 'trim|required');

            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            // $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() != FALSE)
            {
                 
		          $this->load->model('user_model');
		          $response = $this->user_model->login_auth();
		          // var_dump($response); die();
		          if( $response )
		          {
		              $session_data = array(

                        'id'        =>  $response['id'],
                        'username'     =>  $response['username']
                        
                        
                        );

                      $this->session->set_userdata($session_data);

                       redirect('/welcome/home');

		          }else
		          {
		              	$this->session->set_flashdata('message', 'Invalid Username or Password');
						$this->session->set_flashdata('notif', 'error');
						$this->session->set_flashdata('header', 'Success');
						
		              	// var_dump($this->session->flashdata('notif')); die();
		              	redirect(base_url().'welcome/index');

		          }

	          
	          	
	        }
	    
	    } 

		
	}

	public function add_student(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('student_num', 'Student Number', 'required');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');

		$this->load->model('user_model');
		if($this->form_validation->run()){


			
			$id = (int) $this->input->post('subject');
			$num =  	$this->input->post('student_num');
			$fname =  	strtolower(trim($this->input->post('fname')));
			$lname = 	strtolower(trim($this->input->post('lname')));
			$check = $this->user_model->checkUser($id, $num );
			// var_dump($check); die();

			if($check ){
				$msg 	= 'Duplicate Information of Student.';
				$notif 	= 'error';
				$this->session->set_flashdata('message', $msg);
				$this->session->set_flashdata('notif', $notif);
				redirect('/welcome/home');
			}else{
				$courseName = $this->user_model->courseName($id);
				$courseCode = $this->user_model->courseCode($id);
				$program 	= $this->user_model->program($id);
				$college 	= $this->user_model->college($id);
				
				// $this->user_model->college($data);

				$data = array(

					"student_num" 	=>  $this->input->post('student_num'),
					"fname" 		=> 	$fname,
					"lname" 		=> 	$lname,
					"program" 		=> 	$program,
					"course_code" 	=> 	$courseCode,
					"course_name" 	=> 	$courseName,
					"subject_id" 	=> 	$id ,
					"college" 		=> 	$college
				);



				$this->user_model->addStudent($data);

				$msg 	= 'Student Successfully Added.';
				$notif 	= 'success';
				$this->session->set_flashdata('message', $msg);
				$this->session->set_flashdata('notif', $notif);
				$this->session->set_flashdata('header', 'Success');
				redirect('/welcome/home');

			}
			

		}
		else{

			redirect('/welcome/home');

		}
	}


	public function update_student(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('student_num', 'Student Number', 'required');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');

		$this->load->model('user_model');
		if($this->form_validation->run()){


			
			$id 	= (int) $this->input->post('subject');
			$user 	= (int) $this->input->post('user_id');
			$orig 	= (int) $this->input->post('orig_subject');
			$num 	=  	$this->input->post('student_num');
			$fname 	=  	strtolower(trim($this->input->post('fname')));
			$lname 	= 	strtolower(trim($this->input->post('lname')));
			$check 	= false;

			if($id != $orig){
				$check 	= $this->user_model->checkUser($id, $num );
			}
			
	

			if($check ){
				$msg 	= 'Duplicate Information of Student.';
				$notif 	= 'error';
				$this->session->set_flashdata('message', $msg);
				$this->session->set_flashdata('notif', $notif);
				$this->session->set_flashdata('header', 'Error');
				redirect('/welcome/home');
			}else{
				$courseName = $this->user_model->courseName($id);
				$courseCode = $this->user_model->courseCode($id);
				$program 	= $this->user_model->program($id);
				$college 	= $this->user_model->college($id);
				
				// $this->user_model->college($data);

				$data = array(

					"student_num" 	=>  $this->input->post('student_num'),
					"fname" 		=> 	$fname,
					"lname" 		=> 	$lname,
					"program" 		=> 	$program,
					"course_code" 	=> 	$courseCode,
					"course_name" 	=> 	$courseName,
					"subject_id" 	=> 	$id ,
					"college" 		=> 	$college
				);



				$this->user_model->updateStudent($data, $user);

				$msg 	= 'Student Successfully Updated.';
				$notif 	= 'success';
				$this->session->set_flashdata('message', $msg);
				$this->session->set_flashdata('notif', $notif);
				$this->session->set_flashdata('header', 'Success');
				redirect('/welcome/home');

			}
			

		}
		else{

			redirect('/welcome/home');

		}
	}


	public function logout(){

	    $this->session->sess_destroy();
	    redirect('/');
	}

	public function delete(){

		if($this->session->userdata('username') != ''){

			$id = $this->uri->segment(3);
			$this->load->model('user_model');
			// var_dump($id); die();
			
			$this->user_model->delete($id);
			redirect('welcome/home');
		}
		else{
			redirect('/');
		}
	}

}
