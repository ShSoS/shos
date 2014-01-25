<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil_insert_c extends CI_Controller {

	public function index(){
		$this->load->view('home_page');
	}

	public function general_info_save() {
		$this->load->view("authentication");
        $this->load->model("model_get");

        $user_id = $this->session->userdata('user_id');

		$data = array(
			'user_id'        => $user_id,
			'first_name'     => $this->input->post("first_name"),
			'last_name'      => $this->input->post("last_name"),
			'bio'            => $this->input->post("bio"),
			'gender'         => $this->input->post("gender"),
			'birth_date'     => $this->input->post("birth_date"),
			'country'        => $this->input->post("country"),
			'city'           => $this->input->post("city"),
			'address'        => $this->input->post("address"),
			'citizenship'    => $this->input->post("citizenship"),
			'marital_status' => $this->input->post("marital_status"),
			'phone'          => $this->input->post("phone"),
			'email'          => $this->input->post("email")
		);

		$tabela = "general_info";

		$data_get = $this->model_get->get_data($tabela);
		
		if($this->input->post('general_submit'))
		{
			if(empty($data_get)){
        		$this->load->model("model_insert");
				$this->model_insert->insert_data($tabela, $data);
			} else {
       			$this->load->model("model_update");
				$this->model_update->update_data_general_info($tabela, $data, $user_id);
			}
		}

		redirect('profil_insert_c/general_info');

	}

	public function general_info()
	{	
		$tabela = "general_info";

		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$title['title'] = 'GeneralInfo';

		$this->load->view('site_header', $title);
		$this->load->view('navigation/site_navigation');
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_general_info', $data);	
		$this->load->view('profil_footer');
	}

	public function education()
	{
		$this->load->view("authentication");
		$this->load->model("model_insert");

		$data = array(
			'user_id'       => $this->session->userdata('user_id'),
			'institution'   => $this->input->post("institution"),
			'qualification' => $this->input->post("qualification"),
			'department'    => $this->input->post("department"),
			'education_location'      => $this->input->post("location")				
		);

		$tabela = "education";

		if($this->input->post('education_submit')){
			$this->model_insert->insert_data($tabela, $data);
		} 

		$title['title'] = 'Education';	

		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_education', $data);
		$this->load->view('profil_footer');
	}

	public function achivement()
	{		
		$this->load->view("authentication");
		$this->load->model("model_insert");

		$data = array(
			'user_id'    => $this->session->userdata('user_id'),
			'achivement' => $this->input->post("achivement"),
			'ach_location'   => $this->input->post("location"),
			'ach_year'       => $this->input->post("year")			
		);

		$tabela = "achivement";

		if($this->input->post('achivement_submit')){
			$this->model_insert->insert_data($tabela, $data);
		}

		$title['title'] = 'Achivements';	
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_achivement', $data);
		$this->load->view('profil_footer');
	}
	
	public function courses()
	{
		$this->load->view("authentication");
		$this->load->model("model_insert");

		$data = array(
			'user_id'     => $this->session->userdata('user_id'),
			'courses_name'        => $this->input->post("name"),
			'institution' => $this->input->post("institution"),
			'courses_location'    => $this->input->post("location"),
			'courses_additional'  => $this->input->post("additional")
		);
		$tabela = "courses";

		if($this->input->post('courses_submit')){
			$this->model_insert->insert_data($tabela, $data);
		}

		$title['title'] = 'Courses';	
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_courses', $data);
		$this->load->view('profil_footer');
	}

	public function hobbies()
	{
		$this->load->view("authentication");
		$this->load->model("model_insert");

		$data = array(
			'user_id' => $this->session->userdata('user_id'),
			'hobbies' =>$this->input->post('hobbies')
		);

		$tabela = "hobbies";

		if($this->input->post('hobbies_submit')){
			$this->model_insert->insert_data($tabela, $data);
		}

		$title['title'] = 'Hobbies';	
		
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_hobbies', $data);
		$this->load->view('profil_footer');
	}

	public function language()
	{
		$this->load->view("authentication");
		$this->load->model('model_insert');

		$data = array(
			'user_id'   => $this->session->userdata('user_id'),
			'language'  => $this->input->post('language'),
			'speaking'  => $this->input->post('speaking'),
			'listening' => $this->input->post('listening'),
			'reading'   => $this->input->post('reading'),
			'writing'   => $this->input->post('writing')
		);

		$tabela = 'language';

		if($this->input->post('language_submit')){
			$this->model_insert->insert_data($tabela, $data);
		}
		
		$title['title'] = 'Language';

		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_language', $data);
		$this->load->view('profil_footer');
	}

	public function project_save()
	{
		$this->load->view("authentication");
		$this->load->model("model_insert");
		$this->load->model("model_get");
       	$this->load->model("model_update");
		if($_FILES['userfile']['tmp_name'] != "") {
			require_once('application/controllers/upload.php');
			$upload= new Upload();
			$file_name = $upload->upload_project_pic();
		}
		$user_id = $this->session->userdata('user_id');
		$project_id = $this->input->post('id');
		$data = array(
			'user_id'                  => $user_id,
			'project_name'             => $this->input->post("project_name"),
			'description'              => $this->input->post("description"),
			'project_position'         => $this->input->post("position"),
			'project_responsibilities' => $this->input->post("responsibilities"),
			'project_additional_info'  => $this->input->post("additional_info"),
			'website'                  => $this->input->post("website")
		);

		if($file_name['img_path'] != ''){
			$data['project_pic'] = $file_name['img_path'];
		}
		
		$tabela = "project";

		$data_get = $this->model_get->get_data($tabela);

		if($this->input->post('project_submit'))
		{
			if(empty($data_get)){
				if($file_name['img_path'] != ''){
					$data['project_pic'] = "";
				}
        		$this->load->model("model_insert");
				$this->model_insert->insert_data($tabela, $data);
			} else {
       			$this->load->model("model_update");
				$this->model_update->update_data_project($tabela, $data, $project_id);
			}
		}

		redirect('profil_insert_c/project');
	}

	public function project() {
		$title['title'] = 'Project';

		$this->load->model("model_get");

		$tabela = "project";
		$data['result'] = $this->model_get->get_data($tabela);

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}

	public function qualities()
	{
		$this->load->view("authentication");
		$this->load->model("model_insert");

		$data = array(
			'qualities' =>$this->input->post('qualities'),
			'user_id' => $this->session->userdata('user_id')
		);

		$tabela = "qualities";

		if($this->input->post('qualities_submit')){
			$this->model_insert->insert_data($tabela, $data);
		}

		$title['title'] = 'Qualities';	
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_qualities', $data);
		$this->load->view('profil_footer');
	}

	public function work_exp()
	{
		$this->load->view("authentication");
		$this->load->model("model_insert");

		$data = array(
			'user_id'             => $this->session->userdata('user_id'),
			'company'             => $this->input->post('company'),
			'we_position'         => $this->input->post('we_position'),
			'we_responsibilities' => $this->input->post('we_responsibilities'),
			'we_location'         => $this->input->post('we_location'),
			'company_contact'     => $this->input->post('company_contact')
		);

		$tabela = "work_expience";

		if($this->input->post('work_exp_submit')){
			$this->model_insert->insert_data($tabela, $data);
		}

		$title['title'] = 'WorkExpirience';	
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_work_exp', $data);
		$this->load->view('profil_footer');

	}

}