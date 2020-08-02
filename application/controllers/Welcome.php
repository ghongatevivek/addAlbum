<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$this->load->view('register_view');
	}

	public function login()
	{
		$this->load->view('login');
	}
	public function Home()
	{
		$this->load->view('welcome_message');
		
	}
	public function Logout()
	{
		$data=array("user_id","user_name","user_profile");
		$this->session->unset_userdata($data);
		redirect("welcome/login");
	}
	
	public function addAlbum()
	{
		$select['title']="Add New Album";
		$select['url']="register/addAlbumname";
		$this->load->view('addAlbum',$select);
	}


}

?>
