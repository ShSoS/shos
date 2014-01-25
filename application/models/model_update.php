<?php
	class Model_update extends CI_Model
	{
		
		public function update_data($tabela, $data, $id)
		{
			$where = "id =".$id;
			$this->db->update($tabela, $data, $where);
		}

		public function update_data_settings($tabela, $data, $id)
		{
			$where = "user_id =".$id;
			$this->db->update($tabela, $data, $where);
		}

		public function update_data_general_info($tabela, $data, $user_id)
		{
			$where = "user_id =".$user_id;
			$this->db->update($tabela, $data, $where);
		}

		public function update_data_project($tabela, $data, $project_id)
		{
			$where = "id =".$project_id;
			$this->db->update($tabela, $data, $where);
		}
	}
?>