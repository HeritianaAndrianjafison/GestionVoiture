<?php  
 class Insert_Maintenance_model extends CI_Model  
 {  
      
   /* function saverecords($data)
    {
          $this->db->insert('contenue',$data);
          return true;
    } */

    function __construct() {
        $this->tableName = 'maintenance';
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

    public function getTypeMaitenance()
    {
        $this->db->select('*');
        $this->db->from('typemaintenace');
        return $query = $this->db->get(); 
    }

    public function getVoitureMaintenance()
    {
        
        $this->db->select('*');
        $this->db->from('voiture');
        $this->db->join('maintenance', 'voiture.id = maintenance.idVoiture');
        return $query = $this->db->get();
    }

 }  