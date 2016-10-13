<?php
class CityModel extends CI_Model {

    function getAll(){
        return $this->db->get('municipio')->result_array();
    }

    function getById($idM){
        return $this->db->get_where('municipio', 'id_municipio='.$idM)->result_array();
    }
}