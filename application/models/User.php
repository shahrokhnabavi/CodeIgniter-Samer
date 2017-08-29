<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:50 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    public $tbl = 'admins';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getUserByEmail( $email ){
        $data = array(
            'email' => $email
        );
        return $this->db->get_where($this->tbl, $data)->row_array();
    }

    public function getUserById( $id ){
        if( !is_numeric($id) )
            show_error('[User]: The type of parameter is not valid. Error is on line ' . __LINE__ );

        $data = array(
            'id' => $id
        );
        return $this->db->get_where($this->tbl, $data)->row_array();
    }

    public function addUser( $user ){
        $this->db->insert( $this->tbl, $user);
        return $this->db->insert_id();
    }
}