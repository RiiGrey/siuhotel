<?php

class Pemesanan_model extends CI_Model {
    function fetch_data(){
        $query = $this->db->query("SELECT * FROM pemesanan a 
        LEFT OUTER JOIN kamar b ON a.idkamar = b.idkamar
        ORDER BY a.idpesan DESC");
        return $query;
    }
}

?>