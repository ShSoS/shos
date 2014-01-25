<?php

	class Model_delete extends CI_Model
	{
		public function delete( $tabela, $id ){
			$this->db->where('id', $id);
			$this->db->delete($tabela);
		}
	}
?>