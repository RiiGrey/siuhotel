<?php 
class Admin_model extends CI_Model {
    function fetch_kamar(){
        $query = $this->db->query("SELECT * FROM kamar");

        return $query;
    }

    
    function fetch_kamar_perpage($limit, $start){
        // $this->db->get('t_penduduk', $limit, $start);
        // $query = 
        // return $query;
        $query = $this->db->query("SELECT * FROM kamar a
        ORDER BY a.idkamar DESC
        LIMIT " . $start . ", " . $limit);

        return $query;
    }

    function fetch_kamar_single($id){
        $query = $this->db->query("SELECT * FROM kamar WHERE idkamar = " . $id);

        return $query;
    }

    function insert_kamar($data){
        $this->db->insert('kamar', $data);
    }

    function kamarid_ai(){
        $query = $this->db->query("SELECT (MAX(idkamar) + 1) as kamarid_ai FROM kamar");

        return $query;
    }

    function update_kamar($data){
        $this->db->where('idkamar', $data['idkamar']);
        $this->db->update('kamar', $data);
    }

    function delete_kamar($id){
        $this->db->where('idkamar', $id);
        $this->db->delete('kamar');
    }

    function fetch_tamu_perpage($limit, $start){
        $query = $this->db->query("SELECT * FROM tamu a
        ORDER BY a.idtamu DESC
        LIMIT " . $start . ", " . $limit);

        return $query;

    }

    function fetch_pemesanan_perpage($limit, $start){
        $query = $this->db->query("SELECT a.*, b.*, c.jumlah_bayaran, c.bank, c.norek, c.namarek, c.bukti_pembayaran 
        FROM pemesanan a 
        LEFT OUTER JOIN kamar b ON a.idkamar = b.idkamar
        LEFT OUTER JOIN pembayaran c ON a.idpesan = c.idpesan
        ORDER BY a.idpesan DESC
        LIMIT " . $start . ", " . $limit);

        return $query;

    }

    function update_pemesanan_status($data){
        $this->db->where('idpesan', $data['idpesan']);
        $this->db->update('pemesanan', $data);

    }
}
?>