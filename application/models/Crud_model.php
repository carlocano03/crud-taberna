<?php
class Crud_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_students($stu_id = FALSE)
    {

        if ($stu_id === FALSE) {
            $query = $this->db->get('student_details');
            return $query->result_array(); 
        }
        $query = $this->db->get_where('student_details', array('student_id'=> $stu_id));
        return $query->row_array(); 
        
    }
  

    
}
