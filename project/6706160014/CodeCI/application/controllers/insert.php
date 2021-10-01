<?php
	class Insert extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->database('default');
			$this->load->model('inputdata');
			$this->load->helper('url');
		}
		function index(){
			$data['mahasiswa'] = $this->inputdata->showdata()->result();
			$this->load->view('Duste');
		}
		function inject(){
			$nim = $this->input->post('nim');
			$nama = $this->input->post('nama');
			$kelas = $this->input->post('kelas');
			
			$tampungData = array(
				'nim' => $nim,
				'nama' => $nama,
				'kelas' => $kelas
			);
			
			$this->inputdata->inputnew($tampungData,  'mahasiswa');
			redirect('insert');
		}
	}
?>