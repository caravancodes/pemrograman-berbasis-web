<?php
    class Daftaragenda extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            //$this->load->helper('url');
            //$this->load->library('input');
            $this->load->model('daftaragenda/agenda_model');
        }
        
        // bagian pengelolaan agenda
        public function index()
        {
            $data['daftar_agenda'] = $this->agenda_model->select_all()->result();
            $this->load->view('daftaragenda/daftar_agenda', $data);
        }
        
        public function tambah_agenda()
        {
            $this->load->view('daftaragenda/form_tambah_agenda');
        }
        
        public function proses_tambah_agenda()
        {
            $data['nama'] = $this->input->post('nama');
            $data['keterangan'] = $this->input->post('keterangan');
            $this->agenda_model->insert_agenda($data);
            redirect(site_url('daftaragenda'));
        }
        
        public function edit_agenda($id)
        {
            $data['daftar_agenda'] = $this->agenda_model->select_by_id($id)->row();
            $this->load->view('daftaragenda/form_edit_agenda', $data);
        }
        
        public function proses_edit_agenda($id)
        {
            $data['nama'] = $this->input->post('nama');
            $data['keterangan'] = $this->input->post('keterangan');
            $this->agenda_model->update_agenda($id, $data);
            redirect(site_url('daftaragenda'));
        }
        
        function delete_agenda($id) {
            $this->agenda_model->delete($id);
            redirect('daftaragenda');
        }
        
        
        
//        function __construct() {
//            parent::__construct();
//            
//            //load model
//            $this->load->model('daftaragenda/agenda_model');
//        }
//        
//        function index()
//        {
//            //$this->load->model('daftaragenda/agenda_model');
//            $data['hasil'] = $this->agenda_model->tampildata();
//            $this->load->view('daftaragenda/daftar_agenda',$data);
//        }
//        
//        function form_tambah()
//        {
//            $this->load->view('daftaragenda/tambah_agenda');
//        }
//        
//        function tambah()
//        {
//            //$this->load->model('daftaragenda/agenda_model');
//            $this->agenda_model->tambahdata();
//            
//            $this->index();
//        }
//        
//        function delete($id) {
//            //$this->load->model('daftaragenda/agenda_model');
//            $this->agenda_model->id_agenda = $id;
//            $this->agenda_model->delete();
//            redirect('daftaragenda');
//        }

    }

?>