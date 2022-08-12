<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_model extends CI_Model
{
    public function getDataRow($tbl, $row, $arrWhere = '', $limit = '', $arrJoin = array(), $orderBy = '', $arrWhereIn = '', $groupBy = array(), $sum = array())
    {
        if (!empty($arrWhere))
            $this->db->where($arrWhere);
        if (!empty($arrWhereIn) && is_array($arrWhereIn))
            $this->db->where_in($arrWhereIn);
        if (!empty($limit))
            $this->db->limit($limit);
        if (!empty($orderBy))
            $this->db->order_by($orderBy);
        if (!empty(count($groupBy)))
            $this->db->group_by($groupBy);
        if (is_array($arrJoin))
            if (!empty(count($arrJoin))) {
                foreach ($arrJoin as $item) {
                    $param = '';
                    if (count($item) > 2) {
                        $param = $item[2];
                    }
                    $this->db->join($item[0], $item[1], $param,);
                }
            }
        if (is_array($sum))
            if (!empty(count($sum))) {
                foreach ($sum as $item) {
                    $this->db->select_sum($item);
                }
            }

        $this->db->select($row);
        $this->db->from($tbl);
        return $this->db->get()->result_array();
    }
    public function insert($tbl, $arrData)
    {
        $this->db->insert($tbl, $arrData);
        return $this->db->insert_id();
    }
    public function delete($tbl, $where)
    {
        $this->db->where($where);
        $this->db->delete($tbl);
    }
    public function update($table, $arrData, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $arrData);
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function set($table, $where, $data = array())
    {
        $this->db->set($data[0], $data[1], $data[2]);
        $this->db->where($where);
        return $this->db->update($table);
    }
}
