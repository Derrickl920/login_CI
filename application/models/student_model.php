<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function add_student($students)
	{
		$query = "INSERT INTO students(first_name, last_name,email,password, created_at,updated_at) VALUES (?,?,?,?,?,?)";
		$values = array($students['firstname'],$students['lastname'],$students['email'],md5($students['password']),date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}
	function get_student_by_email($email)
	{
		return $this->db->query("SELECT * FROM students WHERE email = ?", array($email))->row_array();
		// $chicken = $this->db->query("SELECT * FROM students WHERE students.email = ?", array($email))->row_array();
		// echo 'hello';
		// var_dump($chicken);
		// die();
	}


}

?>
