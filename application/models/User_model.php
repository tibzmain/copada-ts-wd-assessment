<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{	

	public function login_auth()
	{
		$username = (string) $this->input->post('username');
		$password = (string)  $this->input->post('password');

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		$row = $query->row();

		if($row)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}

	}

	public function getData(){

      $query = $this->db->query('SELECT * FROM courses ORDER BY id ASC');

      return $query;
  	}

  	public function getCollege(){

      $query = $this->db->query('SELECT * FROM colleges ORDER BY id ASC');

      return $query;
  	}

  	public function getProgram(){

      $query = $this->db->query('SELECT * FROM college_programs ORDER BY id ASC');

      return $query;
  	}

  	public function getCourse(){

      $query = $this->db->query('SELECT * FROM courses ORDER BY id ASC');

      return $query;
  	}

  	public function getStudent(){
  		$this->db->where('user_type', 'student');		
  		$query = $this->db->get('users');
      	

      	return $query;
  	}

  	public function courseName($id){

  		$this->db->where('id', $id);		
  		$query = $this->db->get('courses');
      	$row = $query->row();

      	return $row->name;
  	}

  	public function courseCode($id){

  		$this->db->where('id', $id);		
  		$query = $this->db->get('courses');
      	$row = $query->row();

      	return $row->code;
  	
  	}

  	public function program($id){

  		$this->db->where('id', $id);		
  		$query = $this->db->get('courses');
      	$row = $query->row();

      	$program = $row->program_id;

      	$this->db->where('id', $program);		
  		$query2 = $this->db->get('college_programs');
      	$row2 = $query2->row();
      	return $row2->code;
  	}

  	public function addStudent($data){

      $this->db->insert('users', $data);
  	}

  	public function checkUser($id, $num){

  		$this->db->where('subject_id', $id);
  		$this->db->where('student_num', $num);
  	
      	$query = $this->db->get('users');
      	$ret = $query->result_array();

      	if(count($ret) > 0){
      		return true;
      	}else{
      		return false;
      	}
      
  	}

  	public function college($id){

  		$this->db->where('id', $id);		
  		$query = $this->db->get('courses');
      	$row = $query->row();

      	$program = $row->college_id;

      	$this->db->where('id', $program);		
  		$query2 = $this->db->get('colleges');
      	$row2 = $query2->row();
      	return $row2->code;
  	}

	public function login($username, $password){

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get('users');
		$row = $query->row();

		if($row)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}

	public function delete($id){

      $this->db->where('id', $id);
      $this->db->delete('users');
  	}


  	public function updateStudent($data, $user){

      $this->db->where('id', $user);
      $this->db->update('users',$data);

  	}

	// amo ine an na add hen data ha database
	public function insertFruit($data){

		$this->db->insert('fruits', $data);
	}

	// amo ine an nakuha tanan nga data na fruit ha database
	public function getFruitData(){
		
		$query = $this->db->query('SELECT * FROM fruits ORDER BY id DESC');
	    return $query;
	}

	// amo ine an nakuha han specific data, ha fruit database
	// eton nga $id tikang eton ha controller na gnapasa ngada ha editFruit(), account->edit
	public function editFruit($id){

		$this->db->where('id', $id);
      	$query = $this->db->get('fruits');
      	return $query;
	}

	// amo ine na function an nbuhat han pag uupdate han data
	// eton nga $id ngan $data tikang eton ha controller na gnapasa ngada ha update(), account->updateFruit
	public function update($data, $id){

		$this->db->where('id', $id);
    	$this->db->update('fruits',$data);
	}
}