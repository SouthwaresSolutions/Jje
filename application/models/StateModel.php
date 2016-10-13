<?php
class StateModel extends CI_Model {

    function getAll(){
        return $this->db->get('estado')->result_array();
    }

    function getById($idE){
        return $this->db->get_where('estado', 'id_estado='.$idE)->result_array();
    }
}