<?php 
class Admin_model extends CI_Model {

	// Admin login
	public function login($email,$password)
	{
		$this->db->select('id, name, email, password');
		$this->db->where(['email' => $email, 'password' => $password]);
		$this->db->from('admin');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}
	// end here

	// admin profile 
	public function Profile($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('admin');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}
	// end here

	// Update admin profile
	public function update($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('admin', $data);
		return true;
	}
	// end here

	// Check Old Password - Change password
	public function getPassword($oldpass)
	{
		$this->db->select('password');
		$this->db->where('password', sha1($oldpass['old_password']));
		$this->db->from('admin');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return true;
		}else{
			return false;
		}
	}
	// end here

	public function getEmail($data)
	{
		$this->db->select(['email','name']);
		$this->db->where('email', $data);
		$this->db->from('admin');
		$query = $this->db->get();

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function updatePassword($data,$email)
	{
		$this->db->where('email', $email);
		$this->db->update('admin', $data);
		return true;
	}

	public function GetAllProductsCount()
	{
		 $query = $this->db->count_all_results('products');
		 return $query;
	}

	public function GetAllDealers($id)
	{
		$this->db->where('admin_id',$id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('dealers'); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function GetEnquiryCount()
	{
		 $query = $this->db->count_all_results('enquiry');
		 return $query;
	}

	public function GetAllEnquiries()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('enquiry'); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function GetAllUsers()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('users'); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function GetNewEnquiries()
	{
		$array = array('status' => 'unread');
		$this->db->select(['id','name','created_at','status']);
		$this->db->where($array);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('enquiry'); 

		if($query->num_rows() > 0 )
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function UpdateEnquiryStatus()
	{
		$status = array('status' => 'read'); 
		$this->db->update('enquiry', $status);
		return true;
	}

	public function GetUsersCount()
	{
		$query = $this->db->count_all_results('users');
		return $query;
	}
}

?>