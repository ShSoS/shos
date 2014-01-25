<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consilium extends CI_Controller {

	public function index()
	{
		$this->home_page();
	}

	public function home_page($start=0){

		$this->load->model("model_get");
		
		$tabela = "general_info";
		$data['general_info'] = $this->model_get->get_users(6,$start,$tabela);
		$tabela = "project";
		$data['projects'] = $this->model_get->get_data_home_page($tabela);
		$tabela = "user_img";
		$data['user_img'] = $this->model_get->get_data_home_page($tabela);

		$this->load->library('pagination');
		$config['base_url']=base_url().'consilium/home_page/';
		$config['total_rows']=$this->model_get->get_users_count();
		$config['per_page']=6;
		$this->pagination->initialize($config);
		$data['pages']=$this->pagination->create_links();

		$data = array(
				'message'      => "",
				'pages'        => $data['pages'],
				'general_info' => $data['general_info'],
				'projects'     => $data['projects'],
				'user_img'     => $data['user_img']
			);
		$title['title'] = "Consilium";

		$this->load->view("home_page/header", $title);
		$this->load->view("home_page/registration");
		$this->load->view("home_page/portfolie", $data);
		$this->load->view("home_page/about_me");
		$this->load->view("home_page/script");
		
	}

	public function send_email(){

		$this->form_validation->set_rules("name", "Full Name", "required|alpha|xss_clean");
		$this->form_validation->set_rules("contact_email", "Email Addrress", "required|valid_email|xss_clean");
		$this->form_validation->set_rules("message", "Message", "required|xss_clean");

		if($this->form_validation->run() == FALSE){
			
			redirect("consilium/home_page");
			//$data["message"] = "";
			//$this->load->view("home_page", $data);
		}else{
			$data["message"] = "The email has successfully been sent!";

			$this->load->library("email");
			$this->email->from(set_value("email"), set_value("full_name"));
			$this->email->to("bojan91ue@gmail.com");
			$this->email->subject("Message: ");
			$this->email->message(set_value("message"));

			$this->email->send();

			//echo $this->email->print_debugger();
			redirect("consilium/home_page");
			//$this->load->view("home_page", $data);
		}
	}

	/*function test_query()
	{
		$this->load->model('membership_model');
		$data['test'] = $this->membership_model->test_query('pekiosecina@hotmail.com','srele');
		$this->load->view('test',$data);
	}*/

	function validate_credentials()
	{
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();

		$email = $this->input->post('email');
		$id = $this->membership_model->get_id($email);
		if($query)
		{
			$user_ses = array(
				'email'        => $email,
				'user_id'      => $id,
				'is_logged_in' => true

			);

			$this->session->set_userdata($user_ses);

			redirect('consilium/user_profil');	
		}
		else
		{
			$this->load->view("home_page");
		}
	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../home_page">Login</a>';	
			die();
		}		
	}
	public function logout()
	{
			$this->session->sess_destroy(); 		 
			redirect('consilium/home_page');
	}

	function create_member()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|require|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
	
		if($this->form_validation->run() == FALSE)
		{	 
			redirect('consilium/home_page');
		}
		else
		{
			$this->load->model("membership_model");
			if($query = $this->membership_model->create_member())
			{
				redirect('consilium/user_profil');
			}
			else
			{	 
				redirect('consilium/home_page');
			}
		}
	}

	function admin() {

		$this->load->model('model_get');
		$this->load->model('model_update');


		$data = array (
				'users'    => $this->model_get->get_data_home_page('users'),
				'projects' => $this->model_get->get_data_home_page('project'),
				'user_img' => $this->model_get->get_data_home_page('user_img')
			);


		$this->load->view("authentication");
		$this->load->view('admin', $data);
	}


	function user_settings()
	{
		$this->load->view("authentication");
		$this->load->view("navigation/site_navigation");

		$this->load->model("model_insert");
        $this->load->model("model_update");
		$this->load->model("model_get");

		$facebook    =$this->input->post("facebook");
		$twitter     =$this->input->post("twitter");
		$google_plus =$this->input->post("google_plus");
		$user_id     = $this->session->userdata('user_id');

		$data = array(
				'user_id'     => $user_id,
				'facebook'    => $facebook,
				'twitter'     => $twitter,
				'google_plus' => $google_plus,
				);
		$tabela = 'social_network';

		if($this->input->post('social_network_submit')){
			$this->model_update->update_data_settings($tabela, $data);
			redirect('consilium/user_settings');
		} else if($this->input->post('social_network_insert')) {
			$this->model_insert->insert_data($tabela, $data);
			redirect('consilium/user_settings');
		}
		$data['result'] = $this->model_get->get_data($tabela);

		$tabela = "user_img";
		$data['img'] = $this->model_get->get_data($tabela);
		$data = array(
				'img'    => $data['img'],
				'result' => $data['result']
			);

		$this->load->view("user_settings", $data);

	}

	function user_edit_profil()
	{
		$this->load->view("authentication");
		$this->load->view("site_header");
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation_edit");
		$this->load->view('user_profil');
	}


	function user_portfolio()
	{
		$this->load->model("model_get");
		$user_id = $this->session->userdata('user_id');
		$tabela                  = 'general_info';
		$general_info['result']  = $this->model_get->get_data_portfolio($tabela, $user_id);
		$tabela                  = 'achivement';
		$achivement['result']    = $this->model_get->get_data_portfolio($tabela, $user_id);
		$tabela                  = 'courses';
		$courses['result']       = $this->model_get->get_data_portfolio($tabela, $user_id);
		$tabela                  = 'education';
		$education['result']     = $this->model_get->get_data_portfolio($tabela, $user_id);
		$tabela                  = 'hobbies';
		$hobbies['result']       = $this->model_get->get_data_portfolio($tabela, $user_id);
		$tabela                  = 'project';
		$project['result']       = $this->model_get->get_data_portfolio($tabela, $user_id);
		$tabela                  = 'qualities';
		$qualities['result']     = $this->model_get->get_data_portfolio($tabela, $user_id);
		$tabela                  = 'work_expience';
		$work_expience['result'] = $this->model_get->get_data_portfolio($tabela, $user_id);
		$tabela                  = 'language';
		$language['result']      = $this->model_get->get_data_portfolio($tabela, $user_id);
		
		$data['general_info']    = $general_info['result'];
		$data['achivement']      = $achivement['result'];
		$data['courses']         = $courses['result'];
		$data['education']       = $education['result'];
		$data['hobbies']         = $hobbies['result'];
		$data['project']         = $project['result'];
		$data['qualities']       = $qualities['result'];
		$data['work_expience']   = $work_expience['result'];
		$data['language']        = $language['result'];

		
		$this->load->view("user_portfolio", $data);
	}

	public function user_profil()
	{	

		$data['user_id'] = array(
				'user_id' => $this->session->userdata('user_id')
			);
		$this->load->view("authentication");
		$this->load->view("site_header");
		$this->load->view("navigation/site_navigation", $data);
		$this->load->view("navigation/profil_navigation");
		$this->load->view('user_profil');


	}

	public function projec_pic_upload(){
		$this->load->model('gallery_model');

		if($this->input->post('upload')){
			$this->gallery_model->project_pic();
		}

		$data['images'] = $this->gallery_model->get_project_images();

		$this->load->view("profil_project", $data);
	}

	public function pdf() {	
		
		$this->load->model("model_get");

		$tabela                    = 'general_info';
		$general_info['result']    = $this->model_get->get_data($tabela);
		$tabela                    = 'achivement';
		$achivement['result']      = $this->model_get->get_data($tabela);
		$tabela                    = 'courses';
		$courses['result']         = $this->model_get->get_data($tabela);
		$tabela                    = 'education';
		$education['result']       = $this->model_get->get_data($tabela);
		$tabela                    = 'hobbies';
		$hobbies['result']         = $this->model_get->get_data($tabela);
		$tabela                    = 'project';
		$project['result']         = $this->model_get->get_data($tabela);
		$tabela                    = 'qualities';
		$qualities['result']       = $this->model_get->get_data($tabela);
		$tabela                    = 'work_expience';
		$work_experience['result'] = $this->model_get->get_data($tabela);
		$tabela                    = 'language';
		$language['result']        = $this->model_get->get_data($tabela);
		
		$data['general_info']      = $general_info['result'];
		$data['achivement']        = $achivement['result'];
		$data['courses']           = $courses['result'];
		$data['education']         = $education['result'];
		$data['hobbies']           = $hobbies['result'];
		$data['project']           = $project['result'];
		$data['qualities']         = $qualities['result'];
		$data['work_experience']   = $work_experience['result'];
		$data['language']          = $language['result'];

		$this->load->view('download_pdf', $data);
		
		$html = $this->output->get_output();
				
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("CV.pdf");
		
	}

	public function download_pdf(){
		
		$this->load->model("model_get");
		
		$tabela                  = 'user_img';
		$user_img['result']  	 = $this->model_get->get_data($tabela);
		$tabela                  = 'general_info';
		$general_info['result']  = $this->model_get->get_data($tabela);
		$tabela                  = 'achivement';
		$achivement['result']    = $this->model_get->get_data($tabela);
		$tabela                  = 'courses';
		$courses['result']       = $this->model_get->get_data($tabela);
		$tabela                  = 'education';
		$education['result']     = $this->model_get->get_data($tabela);
		$tabela                  = 'hobbies';
		$hobbies['result']       = $this->model_get->get_data($tabela);
		$tabela                  = 'project';
		$project['result']       = $this->model_get->get_data($tabela);
		$tabela                  = 'qualities';
		$qualities['result']     = $this->model_get->get_data($tabela);
		$tabela                  = 'work_expience';
		$work_expience['result'] = $this->model_get->get_data($tabela);
		$tabela                  = 'language';
		$language['result']      = $this->model_get->get_data($tabela);
		
		$data['user_img']    	 = $user_img['result'];
		$data['general_info']    = $general_info['result'];
		$data['achivement']      = $achivement['result'];
		$data['courses']         = $courses['result'];
		$data['education']       = $education['result'];
		$data['hobbies']         = $hobbies['result'];
		$data['project']         = $project['result'];
		$data['qualities']       = $qualities['result'];
		$data['work_expience']   = $work_expience['result'];
		$data['language']        = $language['result'];

		$this->load->view("authentication");
		$this->load->view('download_pdf', $data);

		$html = $this->output->get_output();
				
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("CV.pdf");
	}
}

