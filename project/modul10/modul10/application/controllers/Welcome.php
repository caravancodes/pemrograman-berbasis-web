<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function index(){
		$this->load->model('model');
		$data['hasil']=$this->model->tampil();
		$this->load->view('index',$data);
	}
	public function upload(){
		$this->load->model('model');
		$this->model->tambah();
		echo '<script>window.location = "http://localhost/6706160053/TP/modul10/index.php";</script>';
	}
}
