<?php
class dataProduk extends CI_MODEL{
    function ambildata(){
        return $this->db->get('Produk');
    }
    function tambahdata($data){
        $this->db->insert('produk',$data);
    }
    function deletedata($hapus){
        $this->db->where(array('id_produk' => $hapus));
        $this->db->delete('produk');
    }
    function editdata($id){
        return $this->db->get_where('produk',$id);
    }
    function updatedata($data,$id){
        $this->db->where(array('id_produk' => $id));
        $this->db->update('produk',$data);
    }
}


?>