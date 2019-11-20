<?php 
class Product_model extends CI_Model {

	public function GetAllCategoryName()
	{
		$this->db->select(['id','name']);
		$this->db->where('status',1);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('category'); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function store_product($data)
	{
		$query = $this->db->insert('products', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function GetSingleProduct($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('products');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function updateproduct($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('products', $data);
		return true;
	}

	public function delete_product($id)
    {
    	$this->db->delete('products', array('id' => $id));
    	return true;
    }


    public function product_status($id,$name)
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

	public function GetAllProducts($admin_id)
	{
		$this->db->select(['p.*','c.name as category_name']);
		$this->db->from('products p');
		$this->db->join('category c', 'c.id = p.category_id', 'left');
		$this->db->where('p.admin_id',$admin_id);
		$this->db->order_by('p.id', 'desc');
		$query = $this->db->get(); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
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

	public function store_variety($data)
	{
		$query = $this->db->insert('product_varieties', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function GetAllVarieties()
	{
		$this->db->select(['v.*','p.name as product_name']);
		$this->db->from('product_varieties v');
		$this->db->join('products p', 'v.product_id = p.id', 'left');	
		$this->db->order_by('v.id', 'desc');
		$query = $this->db->get(); 
		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function GetSingleVariety($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('product_varieties');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function update_pvariety($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('product_varieties', $data);
		return true;
	}
}



 ?>