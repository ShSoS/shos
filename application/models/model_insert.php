<?php

	class Model_insert extends CI_Model
	{
		
		public function insert_data($tabela, $data)
		{
			$this->db->insert($tabela, $data);
		}
	}
?>