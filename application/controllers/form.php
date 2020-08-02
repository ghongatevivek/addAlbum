<?php 
	
	class form extends CI_Controller
	{
		function __construct(){
			parent ::__construct();
			$this->load->model('formModel',"fm");
		}
		
		public function Design()
		{
			$select['url']="form/checkForm";
			$this->load->view('form',$select);
		}

		public function index()
		{
			$select['select']=$this->fm->getData();
			$this->load->view('formselect',$select);
		}

		public function checkForm()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name','Full Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');

			if(!$this->form_validation->run()){
				$select['url']="form/checkForm";
				$this->load->view('form',$select);
			}else{

				$form=array(
					"name"=>$this->input->post('name'),
					"email"=>$this->input->post('email'),
				);

				$insert=$this->fm->addData($form);

				if($insert){
					$this->session->set_flashdata('msg','Data Is Addedd To Database');
					redirect('form/Design');
				}
			}
		}

		public function deleteData($id)
		{
			$delete=$this->fm->deleteData($id);

				if($delete){
					$this->session->set_flashdata('msg','Data Is Deleted To Database');
					redirect('form/');
				}
		}

		public function editData($id)
		{
			$select['edit_data']=$this->fm->editData($id);
			$select['url']="form/updateData/$id";
			$this->load->view('form',$select);
		}

		public function updateData($id)
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name','Full Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');

			if(!$this->form_validation->run()){
				$select['edit_data']=$this->fm->editData($id);
				$select['url']="form/updateData/$id";
				$this->load->view('form',$select);
			}else{

				$form=array(
					"name"=>$this->input->post('name'),
					"email"=>$this->input->post('email'),
				);

				$update=$this->fm->updateData($id,$form);

				if($update){
					$this->session->set_flashdata('msg','Data Is Updated To Database');
					redirect('form/');
				}
			}

		}
	}
 ?>