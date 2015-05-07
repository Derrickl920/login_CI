<?php 
class Students extends CI_Controller
{
	public function index()
	{
		redirect();
	}

	public function thank()
	{
		$data['title'] = 'Thank';
		$this->load->view('login_home');
		echo 'thanks';
	}

	public function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname','First Name','trim|required|');
		$this->form_validation->set_rules('lastname','Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Your Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		if($this->form_validation->run()==FALSE)
		{
			//$this->view_data['errors'] = validation_errors();;
			$this->index();
		}
		else
		{
		$this->load->model('student_model');
		$student_info['firstname']=$this->input->post('firstname');
		$student_info['lastname']=$this->input->post('lastname');
		$student_info['email']=$this->input->post('email');
		$student_info['password']=$this->input->post('password');
		$add_student = $this->student_model->add_student($student_info);
		if($add_student === TRUE)
		// echo "course is added";
		// redirect('add_course_page');
			echo 'user registered';
			//codes to run on success validation here
		}
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$this->load->model('Student_model');
		$students = $this->Student_model->get_student_by_email($email);
		// var_dump($student);
		// die();
		if($students && $students['password'] == $password)
		{
			$user = array(
				'student_id' => $students['id'],
				'student_email' => $students['email'],
				'student_name' => $students['first_name'].' '.$students['last_name'],
				'is_logged_in' => true
			);
			$this->session->set_userdata($user);
			redirect("/students/profile");
			// echo 'logged in';
		}
		else
		{
			$this->session->set_flashdata("login_error", "Invalid email or password!");
			echo 'error';
			redirect("/students/index");
		}
	}
	public function profile()
	{
		if($this->session->userdata('is_logged_in') === TRUE)
			echo "You are now logged in! Click <a href='/students/logout'>Here </a> to logout.";
		else
			redirect('/students/index');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/students/index");
	}
}

 ?>