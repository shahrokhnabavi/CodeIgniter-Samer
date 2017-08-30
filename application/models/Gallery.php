<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:50 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Model
{
    public $tbl = 'gallery';

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



    public function add( $user, $msg = '' ){
        $this->db->insert( $this->tbl, $user);

        if ( addUser === '' )
            return $this->db->insert_id();
        else
            return $msg;
    }


    /**
     * Update Record of database
     *
     * @param $record
     * @return mixed
     */
    public function edit( $record, $where, $msg = 'Updated' ){
        $this->db->update($this->tbl, $record, $where);
        return $msg;
    }


    /**
     * Ger a record by specific field and value
     *
     * @param $field
     * @param $value
     * @return mixed
     */
    public function getByField( $field, $value ){
        $data = array(
            $field => $value
        );
        return $this->db->get_where($this->tbl, $data)->row_array();
    }


    /**
     * Get all records
     *
     * @return mixed
     */
    public function getAll($limit = 0, $offset = 0){
        $offset = $limit * $offset;
        return $this->db->get($this->tbl, $limit, $offset)->result_array();
    }

    /**
     * Count all records
     */
    public function count(){
        return $this->db->count_all($this->tbl);
    }

    /**
     * Delete record
     *
     * @param $id
     */
    public function delete( $id ){
        $data = array(
            'id' => $id
        );
        $this->db->delete($this->tbl, $data);
    }

    public function cUser( $field = '*' ){
        $id = $this->session->userdata('cUser');
        $record = $this->getUserById( $id );

        if( $field === '*' ) {
            return $record;
        } else {
            return $record[$field];
        }
    }
}