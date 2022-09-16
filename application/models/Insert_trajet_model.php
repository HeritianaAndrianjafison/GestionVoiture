<?php  
 class Insert_trajet_model extends CI_Model  
 {  
      
   /* function saverecords($data)
    {
          $this->db->insert('contenue',$data);
          return true;
    } */

    function __construct() {
        $this->tableName = 'trajet';
        $this->primaryKey = 'id';
    }
    
    public function insert($data = array()){
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

   public function checkDepart()
   {
        $this->db->where('heureArrive', 0);
        $this->db->where('idChauffeur', $this->session->userdata('usernamefo'));   
        $query = $this->db->get('trajet');

        if($query->num_rows() > 0)  
           {  
                return true;  
           } 
   }

    public function getDepart()
   {
        $this->db->where('heureArrive', 0);   
        return $query = $this->db->get('trajet');
   }

   public function checkArrive()
   {
        $this->db->where('heureDepart', 0);   
        $query = $this->db->get('trajet');

        if($query->num_rows() > 0)  
           {  
                return true;  
           } 
   }

   function setArrive($idVoiture , $data)
  {
    
      $this->db->where('id', $idVoiture);
      $this->db->update('trajet', $data);
  }   
       
 }  