<?php 
class loginModel extends CI_MODEL{
    function cek_login($user,$pass){
        return $this->db->get_where('login',array('username' => $user,
        'password'=> $pass));
    }
    function update_data($user,$id){
        $this->db->where(array('username'=>$user));
        $this->db->update('login',array('id_produk'=>$id,
                                    'jumlah_produk'=> 1));
    }
    function insert_data($user,$id,$nama){
        $this->db->insert('keranjang',array('username'=> $user,
                                    'id_produk' => $id,
                                    'nama_produk'=> $nama,
                                    'jumlah_produk' => 1));
    }
}

?>