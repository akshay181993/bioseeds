<?php 
class News_model extends CI_Model {

	public function add_news($data)
	{
		$query = $this->db->insert('news', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function GetAllNews($admin_id)
	{
		$this->db->where('admin_id', $admin_id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('news'); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function GetSingleNews($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('news');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}
	public function update_news($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('news', $data);
		return true;
	}

	public function delete_news($id)
    {
    	$this->db->delete('news', array('id' => $id));
    	return true;
    }

    public function news_status($id,$name)
    {
        if($name == 'active')
        {
            $data = array( 
                'status'      => 1,
                'updated_at'  => date('Y-m-d H:i:s') 
            );

            $this->db->where('id', $id);

            $this->db->update('news', $data);
        }else{
            $data = array( 
                'status'      => 0,
                'updated_at'  => date('Y-m-d H:i:s')    
            );

            $this->db->where('id', $id);
            $this->db->update('news', $data);
        }
        return true;
    }
}

?>