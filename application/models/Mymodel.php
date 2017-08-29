<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mymodel extends CI_Model {

 public function file_upload($data)
    {
  
        
var_dump($data);
die();
        $query = $this->db->insert('galary', $data);



        if($query)
            {
                echo "success";
            }
        else{
                echo "error";
            }

    }


}



?>