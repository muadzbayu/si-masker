<?php

    class cartModel extends CI_MODEL{
        function get_all($user){
            return $this->db->get_where('keranjang', array('username' => $user))->result();
        }
        function delete($id){
            $this->db->delete('keranjang', $id);
        }
    }

?>