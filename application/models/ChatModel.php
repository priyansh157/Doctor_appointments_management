<?php 

class ChatModel extends CI_model{

    public function get_all_chats($tbl,$where)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where($where);
        $this->db->order_by('time','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_chat($table,$data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}
?>