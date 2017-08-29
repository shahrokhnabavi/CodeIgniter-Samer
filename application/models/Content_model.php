<?php



class Content_model extends CI_Model {
 
    public function add_content($new_content)
    {
        
        $query = "INSERT INTO content 
        		(title, content, slug, description, created_at, updated_at, admin_id)	VALUES (?,?,?,?,?,?,?)";



        return $this->db->query($query,$new_content);

    }

        public function list_of_post()
    {
       
        $sql = "SELECT title, content, description FROM content";
                 
        return $this->db->query( $sql)->result_array();

    }

}