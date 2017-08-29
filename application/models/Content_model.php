<?php



class Content_model extends CI_Model {
 
    public function add_content($new_content)
    {
       
        // var_dump($new_content);
        // die();
        
        $query = "INSERT INTO content 
        		(title, content, slug, description, created_at, updated_at, admin_id)	VALUES (?,?,?,?,?,?,?)";



        return $this->db->query($query,$new_content);

    }

}