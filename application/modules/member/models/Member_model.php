<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

    /**
     * @author Taufik Anggara
     * Create Module Users
     **/

    function getAllDataMember()
    {
        $this->db->select('
            tbl_member.*,
            tbl_detail_member.*
        ');
        $this->db->join('tbl_detail_member','tbl_detail_member.dmember_idfk = tbl_member.id');
        $q = $this->db->get('tbl_member');

        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return array();
        }
    }

    function getAllDataMemberByID($id)
    {
        $this->db->select('
            tbl_member.*,
            tbl_detail_member.*
        ');
        $this->db->join('tbl_detail_member','tbl_detail_member.dmember_idfk = tbl_member.id');
        $this->db->where('tbl_member.id',$id);
        $q = $this->db->get('tbl_member');

        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return array();
        }
    }
}