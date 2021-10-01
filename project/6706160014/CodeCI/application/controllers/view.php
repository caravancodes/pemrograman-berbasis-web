<?php
	class View extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->database('default');
			$this->load->model('inputdata');
			$this->load->helper('url');
		}
		
		function index(){
			$data['mahasiswa'] = $this->inputdata->showdata()->result();
			$this->load->view('viewdata', $data);
		}
	}
?>