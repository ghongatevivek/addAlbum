<?php 
	
	class registerModel extends CI_Model
	{
		
		public function addRegi($data)
		{
			return $this->db->insert('tbl_register',$data);
		}

		public function login_user($data)
		{

			//  use of array
			$this->db->where($data);
			return $this->db->get('tbl_register');

			// for one by one seprately
			// $this->db->where('email',$email);
			// $this->db->where('pass',$pass);		
		}

		public function albumname($data)
		{
			return $this->db->insert('tbl_addalbum',$data);
		}

		public function getData($id)
		{
			$this->db->where('id',$id);
			return $this->db->get('tbl_addalbum')->result();
		}

		public function deleteAlbum($id)
		{
			$this->db->where('album_id',$id);
			return $this->db->delete('tbl_addalbum');
		}

		public function updateAlbum($id)
		{
			$this->db->where('album_id',$id);
			return $this->db->get('tbl_addalbum')->result();
		}

		public function updatedata($id,$data)
		{
			$this->db->where('album_id',$id);
			return $this->db->update('tbl_addalbum',$data);
		}

		public function multimg($data)
		{
			return $this->db->insert('tbl_addimage',$data);
		}

		public function viewPhotos($id)
		{
			$this->db->where('album_id',$id);
			return $this->db->get('tbl_addimage')->result();
		}

		public function editProfile($id)
		{
			$this->db->where("id",$id);
			return $this->db->get("tbl_register")->result();
		}

		public function updateProfile($id,$data)
		{
			$this->db->where("id",$id);
			return $this->db->update("tbl_register",$data);
		}

		public function getLoginData($data)
		{
			$this->db->where($data);
			return $this->db->get("tbl_register")->result();
		}

		public function passUpdate($id,$data)
		{
			$this->db->where($id);
			return $this->db->update("tbl_register",$data);
		}
	}
 ?>