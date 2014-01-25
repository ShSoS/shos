<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil_edit_c extends CI_Controller {

	public function general_info_edit()
	{	

		$nav = "navigation/site_navigation";
		$this->load->view("authentication");
        $this->load->model("model_update");
		$this->load->model("model_delete");

		$id = $this->input->post('id');

		$data = array(
				'user_id'        => $this->session->userdata('user_id'),
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

		if($this->input->post('general_submit'))
		{
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('general_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/general_info', 'refresh');
		}

		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$title['title'] = 'GeneralInfo';

		$this->load->view('site_header', $title);
		$this->load->view('navigation/site_navigation');
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}

	public function education_edit()
	{
		$this->load->view("authentication");
		$this->load->model("model_update");
		$this->load->model("model_delete");

		$id = $this->input->post('id');

		$data = array(
			'user_id'       => $this->session->userdata('user_id'),
			'institution'   => $this->input->post("institution"),
			'qualification' => $this->input->post("qualification"),
			'department'    => $this->input->post("department"),
			'education_location'      => $this->input->post("location")				
		);

		$tabela = "education";

		if($this->input->post('education_submit')){
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('education_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/education', 'refresh');
		}

		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$title['title'] = 'Education';

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}
	public function achivement_edit()
	{		
		$this->load->view("authentication");
		$this->load->model("model_update");
		$this->load->model("model_delete");

		$id = $this->input->post('id');

		$data = array(
			'user_id'    => $this->session->userdata('user_id'),
			'achivement' => $this->input->post("achivement"),
			'ach_location'   => $this->input->post("location"),
			'ach_year'       => $this->input->post("year")			
		);

		$tabela = "achivement";

		if($this->input->post('achivement_submit')){
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('achivement_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/achivement', 'refresh');
		}
		
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);

		$title['title'] = 'Achivements';

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}
	public function courses_edit()
	{
		$this->load->view("authentication");
		$this->load->model("model_update");
		$this->load->model("model_delete");

		$id = $this->input->post('id');

		$data = array(
			'user_id'     => $this->session->userdata('user_id'),
			'courses_name'        => $this->input->post("name"),
			'institution' => $this->input->post("institution"),
			'courses_location'    => $this->input->post("location"),
			'courses_additional'  => $this->input->post("additional")
		);
		$tabela = "courses";

		if($this->input->post('courses_submit')){
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('courses_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/courses', 'refresh');
		}
		
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);
		
		$title['title'] = 'Courses';

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}
	public function hobbies_edit()
	{
		$this->load->view("authentication");
		$this->load->model("model_update");
		$this->load->model("model_delete");

		$id = $this->input->post('id');

		$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'hobbies' => $this->input->post('hobbies')
			);
		$tabela = "hobbies";

		if($this->input->post('hobbies_submit')){
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('hobbies_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/hobbies', 'refresh');
		}

		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);
		
		$title['title'] = 'Hobbies';

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}
	public function language_edit()
	{
		$this->load->view("authentication");
		$this->load->model('model_update');
		$this->load->model("model_delete");

		$id = $this->input->post('id');

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
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('language_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/language', 'refresh');
		}
		
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);
		
		$title['title'] = 'Language';

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}
	public function project_edit()
	{
		$this->load->view("authentication");
		$this->load->model("model_update");
		$this->load->model("model_delete");
		$this->load->model("model_get");
		require_once('application/controllers/upload.php');
		$upload= new Upload();
		$file_name = $upload->upload_project_pic();

		$id = $this->input->post('id');

		$data = array(
			'user_id'                  => $this->session->userdata('user_id'),
			'project_name'             => $this->input->post("project_name"),
			'description'              => $this->input->post("description"),
			'project_position'         => $this->input->post("position"),
			'project_responsibilities' => $this->input->post("responsibilities"),
			'project_additional_info'  => $this->input->post("additional_info"),
			'website'                  => $this->input->post("website"),
			'project_pic'			   => $file_name['img_path']
		);

		$tabela = "project";

		if($this->input->post('project_submit')){
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('project_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/project', 'refresh');
		}

		$data['result'] = $this->model_get->get_data($tabela);
		
		$title['title'] = 'Project';

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}
	public function qualities_edit()
	{
		$this->load->view("authentication");
		$this->load->model("model_update");
		$this->load->model("model_delete");

		$id        = $this->input->post('id');

		$data = array(
				'qualities' =>$this->input->post('qualities'),
				'user_id'   => $this->session->userdata('user_id')
			 );

		$tabela = "qualities";

		if($this->input->post('qualities_submit')){
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('qualities_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/qualities', 'refresh');
		}
		
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);
		
		$title['title'] = 'Qualities';

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');
	}
	public function work_exp_edit()
	{
		$this->load->view("authentication");
		$this->load->model("model_update");
		$this->load->model("model_delete");

		$id = $this->input->post('id');

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
			$this->model_update->update_data($tabela, $data, $id);
		}

		if($this->input->post('work_exp_delete')) {
			$this->model_delete->delete( $tabela, $id );
			redirect('profil_insert_c/work_exp', 'refresh');
		}
		
		$this->load->model("model_get");
		$data['result'] = $this->model_get->get_data($tabela);
		
		$title['title'] = 'WorkExpirience';

		$this->load->view('site_header', $title);
		$this->load->view("navigation/site_navigation");
		$this->load->view("navigation/profil_navigation");
		$this->load->view('profil_insert/profil_project', $data);
		$this->load->view('profil_footer');

	}

}