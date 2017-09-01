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

        $sql = "SELECT id, title, content, description FROM content ORDER BY id DESC";

        return $this->db->query( $sql)->result_array();
    }
    public function delete( $id )
    {
        $data = array(
            'id' => $id
        );
        $this->db->delete($this->tbl, $data);
    }
    public function find_content($id)
    {
        $query = $this->db->select(['id', 'title', 'content', 'slug', 'description'])
            ->where('id',$id)
            ->get('content');
        return $query->row();
    }
    public function update_content($data_edited, $content_id)
    {
        // var_dump($data_edited);
        var_dump($content_id);
        $this->db->where('id', $content_id);
        $this->db->update('content',$data_edited );

        return true;
    }
    public function content_home()
    {
        $sql = "SELECT * FROM content ORDER BY id desc LIMIT 3;";

        return $this->db->query( $sql)->result_array();
    }
}