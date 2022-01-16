<?php
class Admin_Login_Modal extends CI_Model {

    public function Check_Admin_Data($data){
        $query = $this->db->select('*')
                ->from('tbl_user')
                ->where('u_email',$data['u_email'])
                ->where('password',$data['password'])
                ->get();
        return $query->row();
    }


}