<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model extends CI_Model{
	function tambah(){
		if($this->input->post('sbt')) {
	        $config['upload_path'] = './Gambar/';
	        $config['file_name'] = date("j-n-Y+").$this->input->post('judul');
	        $config["allowed_types"] = 'jpg|jpeg|png|gif|';
	        $config["max_size"] = 2048;
	        $this->load->library('upload', $config);
	        if (!$this->upload->do_upload("gambar")) {
           		echo $this->upload->display_errors();
	        }
	        else{
				$insert = array(
					            'judul' => $this->input->post('judul'),
					            'gambar' => 'Gambar/'.$this->upload->data('file_name')
						        );
				$this->db->insert('modul10', $insert);
				echo '<script>alert ("Berhasil Bos");</script>';
			}
	    }
	}
	function tampil(){
		$baca = $this->db->get('modul10');
		if ($baca->num_rows()>0){
			foreach($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
}
?>