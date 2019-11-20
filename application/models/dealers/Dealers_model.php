<?php 
class Dealers_model extends CI_Model {

	public function add_dealer($data)
	{
		$query = $this->db->insert('dealers', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function GetSingleDealer($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('dealers');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}


	public function update_dealer($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('dealers', $data);
		return true;
	}

	public function delete_dealers($id)
    {
    	$this->db->delete('dealers', array('id' => $id));
    	return true;
    }

    public function dealers_status($id,$name)
    {
        if($name == 'active')
        {
            $data = array( 
                'status'      => 1,
                'updated_at'  => date('Y-m-d H:i:s') 
            );

            $this->db->where('id', $id);

            $this->db->update('dealers', $data);
        }else{
            $data = array( 
                'status'      => 0,
                'updated_at'  => date('Y-m-d H:i:s')    
            );

            $this->db->where('id', $id);
            $this->db->update('dealers', $data);
        }
        return true;
    }
}

?>