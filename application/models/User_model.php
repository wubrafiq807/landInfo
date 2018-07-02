<?php

class User_model extends CI_Model {
  
    public function loginfunctioncheck($data) {
    
        return $this->db->get_where("users",array('email='=>$data['email'],'status'=>1,"password="=> md5($data['password'])))->row_array();
      
        
    }
    
        
    
    
    
    
    
    
}