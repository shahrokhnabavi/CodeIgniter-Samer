<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Model {
    public $tbl = 'events';

    public function __construct(){
        parent::__construct();
        $this->load->database();
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
     * @param int $limit
     * @param int $offset
     * @param array $order
     *
     * @return mixed
     */
    public function getAll( $limit = 0, $offset = 0, $order = array('id', 'desc') ){
        $offset = $limit * $offset;
        $this->db->order_by($order[0], $order[1]);
        return $this->db->get($this->tbl, $limit, $offset)->result_array();
    }

    /**
     * Count all records
     */
    public function count(){
        return $this->db->count_all($this->tbl);
    }

    public function add( $data, $msg = '' ){
        $this->db->insert( $this->tbl, $data);

        if ( $msg === '' )
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
}