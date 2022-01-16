<?php
class Admin_Registration extends CI_Model {

    public function add_data_user($data){
        return $this->db->insert('tbl_user',$data);
    }


}