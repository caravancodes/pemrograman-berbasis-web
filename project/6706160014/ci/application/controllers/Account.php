<?php
    class Account extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('account/user_model');
            //$this->load->helper('url');
            //$this->load->helper('form');
            $this->load->library('form_validation');
        }
        
        // melihat halaman login 
        public function index()
        {
            $this->load->view('account/form_login');
        }
        
        // memeriksa keberadaan akun username 
        public function login()
        {
            $username = $this->input->post('username', 'true');
            $password = $this->input->post('password', 'true');
            $temp_account = $this->user_model->check_user_account($username, $password)->row();
            
            // check account
            $num_account = count($temp_account);
            $this->form_validation->set_rules('username', 'User', 'required');
            $this->form_validation->set_rules('password', 'Pass', 'required'); 
            
            if ($this->form_validation->run() == false)
            {
                $this->load->view('account/form_login');
            }
            else
            {
                if ($num_account > 0)
                {
                    // kalau ada set session
                    $array_items = array('id_user' => $temp_account->id_user, 
                                         'username' => $temp_account->username, 'logged_in' => true);
                    $this->session->set_userdata($array_items);
                    redirect(site_url('account/view_success_page'));
                }
                else 
                {
                    // kalau tdk ada diredirect lagi ke halaman login
                    $this->session->set_flashdata('notification', 
                                                  'Peringatan : Username dan Password tidak cocok');
                    redirect(site_url('account'));
                }
            }
        }
        
        public function view_success_page()
        {
            $logged_in = $this->session->userdata('logged_in'); 
            if (!$logged_in)
            {
                redirect(site_url('account'));
            }
            $this->load->view('account/success_page');
        }
        
        // keluar dari sistem 
        public function logout()
        {
            $this->session->sess_destroy();
            redirect(site_url('account'));
        }
        
    }

?>