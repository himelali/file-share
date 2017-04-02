<?php

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count($table, $where = FALSE) {
        if (!empty($where) && $where == TRUE) :
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function select($table, $where = FALSE, $single = FALSE, $orderBy = FALSE, $limit = FALSE, $start = 0) {
        $this->db->select("*");
        $this->db->from($table);
        if (!empty($where) && $where == TRUE) :
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        if ($limit)
            $this->db->limit($limit, $start);
        if (!empty($orderBy) && $orderBy == TRUE) :
            foreach ($orderBy as $key => $value) {
                $this->db->order_by($key, $value);
            }
        endif;
        $query = $this->db->get();
        if($query->num_rows()>0) {
            if($single)
                return $query->row();
            return $query->result();
        }
        return FALSE;
    }

    public function insert($table, $date) {
        try {
            $this->db->insert($table, $date);
            if($this->db->affected_rows()) {
                return $this->db->insert_id();
            }
            $this->session->set_flashdata('exception', "No data inserted.");
            return FALSE;
        } catch (Exception $e) {
            $this->session->set_flashdata('exception', $e->getMessage());
            return FALSE;
        }
    }

    public function update($table, $date, $where) {
        try {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
            $this->db->update($table, $date);
            if($this->db->affected_rows()) {
                return TRUE;
            }
            $this->session->set_flashdata('exception', "No data changed now.");
            return FALSE;
        } catch (Exception $e) {
            $this->session->set_flashdata('exception', $e->getMessage());
            return FALSE;
        }
    }

    public function delete($table, $where) {
        try {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
            $this->db->delete($table);
            if($this->db->affected_rows()) {
                return TRUE;
            }
            $this->session->set_flashdata('exception', "No data deleted now.");
            return FALSE;
        } catch (Exception $e) {
            $this->session->set_flashdata('exception', $e->getMessage());
            return FALSE;
        }
    }

    public function last_id($table, $primaryKey, $where = FALSE) {
        $this->db->select("MAX($primaryKey) as id");
        if (!empty($where) && $where == TRUE) :
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        return (int) $this->db->get($table)->row()->id;
    }

}