<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Controller{



public function Checkregister($data)
	{
		$query = $this->db->query("SELECT *
			FROM user
		 WHERE email='".$data['email']."' ");

		return $query->num_rows();
	}

	public function Register($data)
	{
		$this->db->insert('user', $data);
		return true;
	}


	public function Checklogin($data)
	{
		$query = $this->db->query("SELECT *
			FROM user
		 WHERE email='".$data['email']."' AND password='".$data['password']."' ");

		return $query->num_rows();
	}


	public function Login($data)
	{
		$query = $this->db->query("SELECT *
			FROM user
		 WHERE email='".$data['email']."' AND password='".$data['password']."' ");

		return $query->result();
	}



public function Checkemail($data)
	{
		$query = $this->db->query("SELECT *
			FROM user
		 WHERE email='".$data['email']."' ");

		return $query->num_rows();
	}


public function Checkrecover_code($data)
	{
		$query = $this->db->query("SELECT *
			FROM user
		 WHERE recover_code='".$data['recover_code']."' ");

		return $query->num_rows();
	}



		public function Resetpassword($data)
	{
$data2['password'] = md5(md5($data['newpassword']));
$this->db->where('recover_code', $data['recover_code']);
$this->db->update('user', $data2);
		return true;
	}



		public function Recovercode($data)
	{
$data2['recover_code'] = $data['code'];
$this->db->where('email', $data['email']);
$this->db->update('user', $data2);
		return true;
	}



public function Getemailuser($data)
	{
		$query = $this->db->query("SELECT email
			FROM user
		 WHERE recover_code='".$data['recover_code']."' ");

		return $query->result_array();
	}


	



	public function AdminChecklogin($data)
	{
		$query = $this->db->query("SELECT *
			FROM admin
		 WHERE user='".$data['user']."' AND pass='".$data['pass']."' ");

		return $query->num_rows();
	}


	public function AdminLogin($data)
	{
		$query = $this->db->query("SELECT *
			FROM admin
		 WHERE user='".$data['user']."' AND pass='".$data['pass']."' ");

		return $query->result();
	}








}