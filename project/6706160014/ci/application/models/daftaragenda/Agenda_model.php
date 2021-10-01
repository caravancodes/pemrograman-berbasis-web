<?php
    class Agenda_model extends CI_Model { 
        
        function insert_agenda($data)
        {
            $this->db->insert('agenda', $data);
        }
        
        function select_all()
        {
            $this->db->select('*');
            $this->db->from('agenda');
            //$this->db->order_by('date_modified', 'desc');
            return $this->db->get();
        }
        
        function select_by_id($id_agenda)
        {
            $this->db->select('*');
            $this->db->from('agenda');
            $this->db->where('id_agenda', $id_agenda);
            return $this->db->get();
        }
        
        function update_agenda($id_agenda, $data)
        {
            $this->db->update('agenda', $data);
            $this->db->where('id_agenda', $id_agenda);
        }
        
        function delete($id_agenda)
        {
            $this->db->where('id_agenda', $id_agenda);
            $this->db->delete('agenda');
        }

        
        
//        function tampildata()
//        {
//            $baca = $this->db->get('agenda');
//            if($baca->num_rows() > 0)
//            {
//                foreach ($baca->result() as $data)
//                {
//                    $hasil[] = $data;
//                }
//                return $hasil;
//            }
//        }
//        
//        function tambahdata()
//        {
//            $nama = $this->input->post('nm');
//            $keterangan = $this->input->post('ket');
//            
//            $data = array('nama'=>$nama, 'keterangan'=>$keterangan);
//            $this->db->insert('agenda', $data);
//        }
//        
//        function delete() {
//            $sql = sprintf("delete from agenda where id_agenda='%d'", $this->id_agenda);
//            $this->db->query($sql);
//        }
    }

?>