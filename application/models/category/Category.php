<?php 
class Category extends CI_Model {

	public function add_categorydata($data)
	{
		$query = $this->db->insert('category', $data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}

	public function GetSingleCategory($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('category');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

    public function	update_categorydata($data,$id)
    {
    	$this->db->where('id', $id);
		$this->db->update('category', $data);
		return true;
    }

    public function delete_category($id)
    {
    	$this->db->delete('category', array('id' => $id));
    	return true;
    }

    public function category_status($id,$name)
    {
    	if($name == 'active')
    	{
    		$data = array( 
			    'status'      => 1,
			    'updated_at'  => date('Y-m-d H:i:s') 
			);

			$this->db->where('id', $id);

			$this->db->update('category', $data);
    	}else{
    		$data = array( 
			    'status'      => 0,
			    'updated_at'  => date('Y-m-d H:i:s')	
			);

			$this->db->where('id', $id);
			$this->db->update('category', $data);
    	}
    	return true;
    }

	public function GetAllcategories()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('category'); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

}