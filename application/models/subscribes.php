<?php
<<<<<<< .merge_file_a03716
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribes extends CI_Model{

    function add_subscriber($subscriber)
=======

class Subscribes extends CI_Model{
	
	    function add_subscriber($subscriber)
>>>>>>> .merge_file_a01544
    {
        $query = "INSERT INTO subscription (email) VALUES (?)";
        $values = array($subscriber['email']);
        return $this->db->query($query, $values);
    }
<<<<<<< .merge_file_a03716
    function show_subscribers()
    {
        $query = "SELECT * FROM subscription ORDER BY subsription.created_at DESC";
        return $this->db->query($query)->result_array();
    }
    function delete_subscriber($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('subscription');
        return true;
    }

    /**
     * Get all records - Added by SHAHROKH
     *
     * @return mixed
     */
    public function getAll($limit = 0, $offset = 0){
        $offset = $limit * $offset;
        return $this->db->get('subscription', $limit, $offset)->result_array();
    }

    /**
     * Count all records - Added by SHAHROKH
     */
    public function count(){
        return $this->db->count_all('subscription');
    }

=======

    	function show_subscribers()
    	{
    		$query = "SELECT * FROM subscription ORDER BY subsription.created_at DESC";
    		return $this->db->query($query)->result_array();
    	}

        function delete_subscriber($id)
        {
            $this->db->where('id',$id);
            $this->db->delete();
            return true;
        }
>>>>>>> .merge_file_a01544
}