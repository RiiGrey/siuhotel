<?php 
class Login_model extends CI_Model {
    function fetch_user($data){
        $query = $this->db->query("SELECT * FROM tamu WHERE username = '". $data['username'] ."' AND password= '". $data['password'] ."';");

        return $query;
    }
}
?>