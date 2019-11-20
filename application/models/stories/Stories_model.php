<?php 
class Stories_model extends CI_Model {

	public function add_success_story($data)
	{
		$query = $this->db->insert('success_stories', $data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}

	public function GetAllStories()
	{
		$this->db->select(['s.*','p.name as product_name']);
		$this->db->from('success_stories s');
		$this->db->join('products p', 'p.id = s.crop', 'left');
		$this->db->order_by('s.id', 'desc');
		$query = $this->db->get(); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function GetSingleStory($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('success_stories');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function update_success_story($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('success_stories', $data);
		return true;
	}

	public function delete_story($id)
    {
    	$this->db->delete('success_stories', array('id' => $id));
    	return true;
    }


    public function stories_status($id,$name)
    {
    	if($name == 'active')
    	{
    		$data = array( 
			    'status'      => 1,
			    'updated_at'  => date('Y-m-d H:i:s') 
			);

			$this->db->where('id', $id);

			$this->db->update('success_stories', $data);
    	}else{
    		$data = array( 
			    'status'      => 0,
			    'updated_at'  => date('Y-m-d H:i:s')	
			);

			$this->db->where('id', $id);
			$this->db->update('success_stories', $data);
    	}
    	return true;
    }

    public function GetAllProductsName()
	{
		$this->db->select(['id','name']);
		$this->db->where('status',1);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('products'); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}
}