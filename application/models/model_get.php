<?php

	class Model_get extends CI_Model
	{
		
		public function get_data($tabela)
		{
			$id = $this->session->userdata('user_id');
			//$query = $this->db->query('SELECT * FROM '.$tabela.' WHERE user_id = '. $id);
			
			$this->db->select('*');
			$this->db->from($tabela);
			$this->db->where('user_id',$id);
			$query = $this->db->get();
			return $query -> result();
		}
		public function get_data_unique($tabela, $id, $column)
		{
						
			$this->db->select('*');
			$this->db->from($tabela);
			$this->db->where($column, $id);
			$query = $this->db->get();
			return $query -> result();
		}
		public function get_data_home_page($tabela)
		{			
			$this->db->select('*');
			$this->db->from($tabela);
			$query = $this->db->get();
			return $query -> result();
		}

		public function get_users($num = 5, $start = 0, $tabela) {
			//$query = $this->db->query('SELECT * FROM users AS us INNER JOIN general_info AS gi ON us.user_id = gi.user_id INNER JOIN project AS pr ON us.user_id = pr.user_id GROUP BY us.user_id');
			// $this->db->select('*');
			// $this->db->from('general_info');
			//$this->db->join('general_info', 'users.user_id = general_info.user_id');
			// $this->db->join('project', 'general_info.user_id = project.user_id', '');
			//$this->db->limit($num,$start);
			//$query = $this->db->get();
			$this->db->select('*');
			$this->db->from($tabela);
			$this->db->limit($num,$start);
			$query = $this->db->get();
			return $query -> result();

			//AS us JOIN general_info AS gi ON us.user_id = gi.user_id
		}

		function get_users_count(){
			$this->db->select('user_id')->from('users');
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function get_projects(){
			//$query = $this->db->query('SELECT * FROM users AS us JOIN project AS pr ON us.user_id = pr.user_id');
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('project', 'users.user_id = project.user_id');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_data_portfolio($tabela, $user_id) {
			$this->db->select('*');
			$this->db->from($tabela);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get();
			return $query -> result();
		}
	}
?>