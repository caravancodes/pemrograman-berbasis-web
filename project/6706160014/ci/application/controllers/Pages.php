<?php
    class Pages extends CI_Controller {
        
        public function view($page = 'home')
        {
            //cek apakah halaman tersedia atau tidak
            if (!file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
                show_404();
            }

            $data['title'] = ucfirst($page); // buat kapital utk huruf pertama

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
        
    }
?>