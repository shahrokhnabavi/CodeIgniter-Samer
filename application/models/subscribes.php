<?php

class Subscribes extends CI_Model{
	
	    function add_subscriber($subscriber)
    {
        $query = "INSERT INTO subscription (email) VALUES (?)";
        $values = array($subscriber['email']);
        return $this->db->query($query, $values);
    }

    	function show_subscribers()
    	{
    		$query = "SELECT * FROM subscription ORDER BY subsription.created_at DESC";
    		return $this->db->query($query)->result_array();
    	}
}