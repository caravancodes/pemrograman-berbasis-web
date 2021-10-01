<?php
	class Inputdata extends CI_Model{
		function inputnew($data, $table){
			$this->db->insert($table, $data);
		}
		function showdata(){
			return $this->db->get('mahasiswa');
		}
	}
?>