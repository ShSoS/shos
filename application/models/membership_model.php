<?php

class Membership_model extends CI_Model{

	function validate()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));

		$query = $this->db->get('users'); 

		if($query->num_rows == 1)
		{
			//return $query->result_array();
			return true;
		}
		else
		{
			return false;
		}
		//Ako postoji vracen 1 red vrati sve podatke o tom useru i onda te podatke upisi u sesiju
	}

	public function get_id($email)
	{
		$query = $this->db->query("SELECT user_id FROM users WHERE email ='$email'");
		$row = $query->row_array();
		return $row['user_id'];
	}

	public function get_rol($email)
	{
		$query = $this->db->query("SELECT rol FROM users WHERE email ='$email'");
		$row = $query->row_array();
		return $row['rol'];
	}

	function create_member()
	{
		$new_member_insert_data = array(
				'rol' => 'user',
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password'))
			);
		$insert = $this->db->insert('users', $new_member_insert_data);
		return $insert;
	}
	/*function test_query($email,$password) {
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		return $query->result_array();
	}*/
}