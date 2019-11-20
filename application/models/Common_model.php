<?php 
class Common_model extends CI_Model {
	public function all_delete($id,$name,$imgname="")
    {
        if( $imgname != ""){
            if($name != "success_stories"){
                unlink("./public/uploads/cat_image/".$imgname);
            }else{           
                $expload_img = explode('~', $imgname);
                for ($i=0; $i < count($expload_img) ; $i++) { 
                    unlink("./public/uploads/cat_image/".$expload_img[$i]);
                }
            }
        }
        $this->db->delete($name, array('id' => $id));
    	return true;
    }

    public function all_status($id,$name,$model)
    {
        if($name == 'active')
        {
            $data = array( 
                'status'      => 1,
                'updated_at'  => date('Y-m-d H:i:s') 
            );

            $this->db->where('id', $id);

            $this->db->update($model, $data);
        }else{
            $data = array( 
                'status'      => 0,
                'updated_at'  => date('Y-m-d H:i:s')    
            );

            $this->db->where('id', $id);
            $this->db->update($model, $data);
        }
        return true;
    }

    public function SaveTechSupportNo($data)
    {
        $query = $this->db->insert('tech_support',$data);
        if($query)
        {
            return true;
        }else{
            return false;
        }
    }

    public function GetAllNumbers()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tech_support');
        if($query->num_rows() > 0 )
        {
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function GetSingleNumber($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('tech_support');
        $query = $this->db->get();

        if($query->num_rows() > 0 )
        {
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function UpdateTechSupportNo($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('tech_support', $data);
        return true;
    }
}

?>