<?php 

	
	class formModel extends CI_Model
	{
		
		public function addData($data)
		{
			return $this->db->insert('tbl_form',$data);
		}

		public function getData()
		{
			return $this->db->get('tbl_form')->result();
		}

		public function deleteData($id)
		{
			$this->db->where('f_id',$id);
			return $this->db->delete('tbl_form');
		}

		public function editData($id)
		{
			$this->db->where('f_id',$id);
			return $this->db->get('tbl_form')->result();
		}

		public function updateData($id,$data)
		{
			$this->db->where('f_id',$id);
			return $this->db->update('tbl_form',$data);
		}
	}
 ?>