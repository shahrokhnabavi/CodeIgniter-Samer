<?php



class Content_model extends CI_Model {

    public $tbl = 'content';
 
    public function add_content($new_content)
    {
        
        $query = "INSERT INTO content 
        		(title, content, slug, description, created_at, updated_at, admin_id)	VALUES (?,?,?,?,?,?,?)";



        return $this->db->query($query,$new_content);

    }

        public function list_of_post()
    {
       
        $sql = "SELECT id, title, content, description FROM content";
                 
        return $this->db->query( $sql)->result_array();

    }


        public function delete( $id )
    {
        $data = array(
            'id' => $id
        );
        $this->db->delete($this->tbl, $data);
    }

}