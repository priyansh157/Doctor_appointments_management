<?php 
class CommonModel extends CI_model{
    public function insert_data($tbl,$data) 
    {
        $this->db->insert($tbl, $data);
        return $this->db->insert_id();
    }
    public function edit_data($tbl,$where,$arr) 
    {
        $this->db->where($where);
        if ($this->db->update($tbl, $arr)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_data($tbl, $where) 
    {
        $this->db->where($where);
        if ($this->db->delete($tbl)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_all_data($tbl,$where)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function total_rows($tbl)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_table_data($tbl)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data($tbl,$where)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pa_data($tbl,$where)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where($where);
      
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_all_pa_table_data($tbl,$limit,$offset)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>