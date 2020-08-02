<?php 
	
	class register extends CI_Controller
	{
		function __construct(){
			parent ::__construct();
			$this->load->model('registerModel',"rm");
		}
		
		public function checkForm()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name','Full Name','required|alpha');
			$this->form_validation->set_rules('email','Email Id','required|valid_email|is_unique[tbl_register.email]');
			$this->form_validation->set_rules('pass','Password','required');
			// $this->form_validation->set_rules('image','Profile Image','required');

			if(!$this->form_validation->run()){
				$this->load->view('register_view');
			}else{
				$i_name=time().".jpg";
				$config['upload_path']='./image';
				$config['allowed_types']='jpeg|png|gif|jpg';
				$config['file_name']=$i_name;
				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('image')){
					echo $this->upload->display_error();
				}else{

					$img=$this->upload->data();
					$regiData=array(
					"name"=>$this->input->post('name'),
					"email"=>$this->input->post('email'),
					"pass"=>md5($this->input->post('pass')),
					"image"=>$i_name,
					);

					$insert=$this->rm->addRegi($regiData);
					
					if($insert){
						$this->session->set_flashdata('msg','Your Account Is Register Successfully..! You Can Login Now....');
						redirect('welcome/');
					}
				}
			}
		}

		public function login()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email','Email Id','required|valid_email');
			$this->form_validation->set_rules('pass','Password','required');

			if(!$this->form_validation->run()){
				$this->load->view('login');
			}else{
				$u_login=array(
					"email"=>$this->input->post('email'),
					"pass"=>md5($this->input->post('pass')),
				);

				$data=$this->rm->login_user($u_login);
				if($data->num_rows()==1){
					$loginData=$data->result();
					$this->session->set_userdata('user_id',$loginData[0]->id);
					$this->session->set_userdata('user_name',$loginData[0]->name);
					$this->session->set_userdata('user_profile',$loginData[0]->image);
					redirect("welcome/home");
				}else{
					$this->session->set_flashdata("msg","Invalid Email Or Password");
					redirect("welcome/login");
				}
				//one by one
				// $data=$this->rm->login_user($this->input->post('email'),$this->input->post('pass'));
			}
		}

		public function addAlbumname()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('aname','Album Name','required');

			if(!$this->form_validation->run()){
				$select['title']="Add New Album";
				$select['url']="register/addAlbumname";
				$this->load->view('addAlbum',$select);
			}else{

				$aname=array(
					"id"=>$this->session->userdata('user_id'),
					"aname"=>$this->input->post('aname'),
				);

				$insert=$this->rm->albumname($aname);

				if($insert){
					$this->session->set_flashdata('msg','Album Is Created Successfully....');
					redirect('welcome/addAlbum');
				}
			}
		}

		public function viewAlbum()
		{
			$select['select']=$this->rm->getData($this->session->userdata('user_id'));
			$this->load->view('viewalbum',$select);	
		}

		public function deleteAlbum($id)
		{
			$delete=$this->rm->deleteAlbum($id);
					
			if($delete){
				$this->session->set_flashdata('msg1','Your Album Is Deleted Successfully....');
						redirect('register/viewAlbum');
			}
		}

		public function updateAlbum($id)
		{
			$select['edit_data']=$this->rm->updateAlbum($id);
			$select['title']="Update Album";
			$select['url']="register/updatedata/$id";
			$this->load->view('addAlbum',$select);
		}

		public function updatedata($id)
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('aname','Album Name','required');

			if(!$this->form_validation->run()){
				$select['edit_data']=$this->rm->updateAlbum($id);
				$select['title']="Add New Album";
				$select['url']="register/updatedata/$id";
			$this->load->view('addAlbum',$select);

			}else{

				$aname=array(
					
					"aname"=>$this->input->post('aname'),
				);

				$insert=$this->rm->updatedata($id,$aname);

				if($insert){
					$this->session->set_flashdata('msg','Album Is Updated Successfully....');
					redirect('register/viewAlbum');
				}
			}
		}

		public function addImage($id)
		{
			$select['title']='Add Photos';
			$select['url']="register/multimg/$id";
			$this->load->view('addimage',$select);
		}

		public function multimg($id)
		{
			$count= count($_FILES['photos']['name']);

			for ($i=0; $i<$count ; $i++) { 
				
				$_FILES['file']['name']=$_FILES['photos']['name'][$i];
				$_FILES['file']['type']=$_FILES['photos']['type'][$i];
				$_FILES['file']['tmp_name']=$_FILES['photos']['tmp_name'][$i];
				$_FILES['file']['error']=$_FILES['photos']['error'][$i];
				$_FILES['file']['size']=$_FILES['photos']['size'][$i];

				$config['upload_path']='./image';
				$config['allowed_types']='jpeg|jpg|png|gif';
				$config['file_name']=$_FILES['photos']['name'][$i];

				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('file')){
					echo $this->upload->display_errors();
				}else{

					$img=$this->upload->data();

					$mult_img=array(
						"album_id"=>$id,
						"image"=>$img['file_name'],
					);

					$insert=$this->rm->multimg($mult_img);
				}
			}

			if($insert){
						$this->session->set_flashdata("msg2","Your Photos Is Added To Your Album...");
						redirect("register/viewalbum");
					}
		}

		public function viewPhotos($id)
		{
			$select['select']=$this->rm->viewPhotos($id);
			$select['title']="Photos Data Table";
			$this->load->view("viewPhotos",$select);
		}

		public function editProfile($id)
		{
			$select['title'] = "Edit Profile";
			$select['url'] = "register/updateProfile/$id";
			$select['editData'] = $this->rm->editProfile($this->session->userdata("user_id"));
			$this->load->view("editProfileView",$select);
		}

		public function updateProfile($id)
		{
			$this->load->library("form_validation");

			$this->form_validation->set_rules("name","User Name","required");
			$this->form_validation->set_rules("email","User Email","required|valid_email");

			if(!$this->form_validation->run()){
				$select['title'] = "Edit Profile";
				$select['url'] = "register/updateProfile/$id";
				$select['editData'] = $this->rm->editProfile($this->session->userdata("user_id"));
				$this->load->view("editProfileView",$select);
			}else{

				$updData = array("name"=>$this->input->post("name"),"email"=>$this->input->post("email"));

				$this->rm->updateProfile($id,$updData);
				$this->session->set_flashdata("msg2","User Profile Updated Successfully..");
				redirect("register/login");
			}
		}

		public function changedPassword()
		{
			$select['title'] = "Changed Password";
			$select['url'] = "register/changedValidation";
			$this->load->view("changedPasswordView",$select);
		}

		public function changedValidation()
		{
			$this->load->library("form_validation");
			$this->form_validation->set_rules("opass","Old Password","required");
			$this->form_validation->set_rules("npass","New Password","required");
			$this->form_validation->set_rules("rnpass","Re-Enter New Password","required|matches[npass]");

			if(!$this->form_validation->run()){
				$select['title'] = "Changed Password";
				$select['url'] = "register/changedValidation";
				$this->load->view("changedPasswordView",$select);
			}else{
				$uData = array("id"=>$this->session->userdata("user_id"));

				$getData = $this->rm->getLoginData($uData);
				// print_r($getData);

				if(md5($this->input->post("opass"))!=$getData[0]->pass){
					$select['old_pass'] = "Old Password Cannot Match...";
					$select['title'] = "Changed Password";
					$select['url'] = "register/changedValidation";
					$this->load->view("changedPasswordView",$select);
				}else{

					$updPass = array("pass"=>md5($this->input->post("npass")));

					$this->rm->passUpdate($uData,$updPass);
					$this->session->set_flashdata("msg","Password Is Reset Successfully...");
					redirect("register/changedPassword");
				}
			}
		}
	}
 ?>