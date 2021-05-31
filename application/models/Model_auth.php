<?php

class Model_auth extends CI_Model{
    public function cek_login(){
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)
                            ->where('password', $password)
                            ->where('status', 'Aktif')
                            ->where('bagian', 'karyawan')
                            ->limit(1)
                            ->get('user');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }


    public function cek_login_pemilik()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)
            ->where('password', $password)
            ->where('status', 'Aktif')
            ->where('bagian', 'pemilik')
            ->limit(1)
            ->get('user');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}