<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:50 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteSetting extends CI_Model
{
    public $tbl       = 'settings';
    public $validKeys = array(
        'site_name', 'welcome_msg','site_icon','site_logo',
        'meta_key','meta_desc','site_subtitle', 'contact_email',
        'contact_text'
    );

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function add( $record, $msg = '' ){
        $this->db->insert( $this->tbl, $record);

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


    public function getValue( $key ){
        if( !in_array($key, $this->validKeys) )
            show_error('[' . __CLASS__ . ']: Key not found in the setting\'s valid keys. Error is on line ' . __LINE__ );

        $data = array(
            'key' => $key
        );
        $row = $this->db->get_where($this->tbl, $data)->row_array();

        return $row ? $row['value'] : false;
    }


    public function setValue( $key, $value ){
        if( !in_array($key, $this->validKeys) )
            show_error('[' . __CLASS__ . ']: Key not found in the setting\'s valid keys. Error is on line ' . __LINE__ );

        $row = $this->getValue($key);
        if( $row ){
            $data = array(
                'value'=>$value,
                'updated_at'=>date("Y-m-d H:i:s")
            );
            $this->edit($data, ['key'=>$key]);
        } else {
            $data = array(
                'value' => $value,
                'key'   => $key
            );
            $this->add($data);
        }
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
}