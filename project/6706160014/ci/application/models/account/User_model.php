<?php
    class User_model extends CI_Model { 

        // cek keberadaan user di sistem
        function check_user_account($username, $password)
        {
            $this->db->select('*');
            $this->db->from('admin1');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            return $this->db->get();
        }

        // mengambil data user tertentu 
//        function get_user($id_user)
//        {
//            $this->db->select('*');
//            $this->db->from('admin1');
//            $this->db->where('id_user', $id_user);
//            return $this->db->get();
//        }
        
    }

?>