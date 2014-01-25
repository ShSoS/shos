<?php 
class Ajax_controller extends CI_Controller {

	public function on_change() {
		$id = $_POST['id'];
		$table = $_POST['table'];
		if($table == 'project'){
			if($id == 0){
			echo "<table><tr><td>";
				echo form_open_multipart("profil_insert_c/project");
				echo "<img border='1' src='' width='200' height='250'></td><td>";
					$data = array (
						'type' => 'file',
						'name' =>'userfile',
						'id'   => 'userfile'
					);
				echo form_upload($data);
				echo "</td></tr><tr><td>";
				echo form_label("Project Name: ", "project_name");
				echo "</td><td>";
				echo form_input("project_name");
				echo "</td></tr><tr><td>";
				echo form_label("Description: ", "descrition");
				echo "</td><td>";
				echo form_textarea("descrition");
				echo "</td></tr><tr><td>";
				echo form_label("Position: ", "position");
				echo "</td><td>";
				echo form_input("position");
				echo "</td></tr><tr><td>";
				echo form_label("Responsibilities: ", "responsibilities");
				echo "</td><td>";
				echo form_input("responsibilities");
				echo "</td></tr><tr><td>";
				echo form_label("Year Start: ", "year_start");
				echo "</td><td>";
				echo form_input('year_start');
				echo "</td></tr><tr><td>";
				echo form_label("Month Start: ", "month_start");
				echo "</td><td>";
				echo form_input('month_start');
				echo "</td></tr><tr><td>";
				echo form_label("Year Finish: ", "year_finish");
				echo "</td><td>";
				echo form_input('year_finish');
				echo "</td></tr><tr><td>";
				echo form_label("Month Finish: ", "month_finish");
				echo "</td><td>";
				echo form_input('month_finish');
				echo "</td></tr><tr><td>";
				echo form_label("Website: ", "website");
				echo "</td><td>";
				echo form_input("website");
				echo "</td></tr><tr><td>";
				echo form_label("Additionnal Info: ", "additionnal_info");
				echo "</td><td>";
				echo form_textarea("additionnal_info");
				echo "</td></tr><tr><td>";
				$data = array (
						"type"  => "submit",
						"name"  => "project_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
				echo form_submit($data);
				echo "</td></tr>";
				echo form_close();
				echo "</table>";
			} else {

				$tabela = "project";
				
				$this->load->model("model_get");
				$result = $this->model_get->get_data_unique($tabela, $id, "id");


				foreach ($result as $row) {
					echo "<table><tr><td>";
					echo form_open_multipart("profil_edit_c/project_edit");

					echo "<img border='1' src='$row->project_pic' width='200' height='250'></td><td>";
						$data = array (
							'type' => 'file',
							'name' =>'userfile',
							'id'   => 'userfile'
						);
					echo form_hidden("id", $row->id);
					echo form_upload($data);
					echo "</td></tr><tr><td>";
					echo form_hidden("id", $row->id);
					echo form_label("Project Name: ", "project_name");
					echo "</td><td>";
					echo form_input("project_name", $row ->project_name);
					echo "</td></tr><tr><td>";
					echo form_label("Description: ", "descrition");
					echo "</td><td>";
					echo form_textarea("descrition", $row ->description);
					echo "</td></tr><tr><td>";
					echo form_label("Position: ", "position");
					echo "</td><td>";
					echo form_input("position", $row ->project_position);
					echo "</td></tr><tr><td>";
					echo form_label("Responsibilities: ", "responsibilities");
					echo "</td><td>";
					echo form_input("responsibilities", $row ->project_responsibilities);
					echo "</td></tr><tr><td>";
					echo form_label("Year Start: ", "year_start");
					echo "</td><td>";
					echo form_input('year_start', $row ->project_year_start);
					echo "</td></tr><tr><td>";
					echo form_label("Month Start: ", "month_start");
					echo "</td><td>";
					echo form_input('month_start', $row ->project_month_start);
					echo "</td></tr><tr><td>";
					echo form_label("Year Finish: ", "year_finish");
					echo "</td><td>";
					echo form_input('year_finish', $row ->project_year_finish);
					echo "</td></tr><tr><td>";
					echo form_label("Month Finish: ", "month_finish");
					echo "</td><td>";
					echo form_input('month_finish', $row ->project_month_finish);
					echo "</td></tr><tr><td>";
					echo form_label("Website: ", "website");
					echo "</td><td>";
					echo form_input("website", $row ->website);
					echo "</td></tr><tr><td>";
					echo form_label("Additionnal Info: ", "additionnal_info");
					echo "</td><td>";
					echo form_textarea("additionnal_info", $row ->project_additional_info);
					echo "</td></tr><tr><td>";
					$data = array (
						"type"  => "submit",
						"name"  => "project_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
					echo form_submit($data);
					$data = array (
							"type"  => "submit",
							"name"  => "project_delete",
							"value" => "Remove",
							"id"    => "button_submit"
						);
					echo "</td><td>";
					echo form_submit($data);
					echo "</td></tr>";
					echo form_close();
					echo "</table>";
				}
			}
		} elseif($table == 'achivement') {
			if($id == 0){
				echo "<table><tr><td>";
				echo form_open("profil_insert_c/achivement");

				echo form_label("Achivement: ", "achivement");
				echo "</td><td>";
				echo form_textarea("achivement");
				echo "</td></tr><tr><td>";
				echo form_label("Location: ", "location");
				echo "</td><td>";
				echo form_input("location");
				echo "</td></tr><tr><td>";
				echo form_label("Year: ", "year");
				echo "</td><td>";
				echo form_input("year");
				echo "</td></tr><tr><td>";
				$data = array (
						"type"  => "submit",
						"name"  => "achivement_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
				echo form_submit($data);
				echo "</td></tr>";
				echo form_close();
				echo "</table>";
			} else {

				$tabela = "achivement";
				
				$this->load->model("model_get");
				$result = $this->model_get->get_data_unique($tabela, $id, "id");

				foreach ($result as $row) {
					echo "<table><tr><td>";
					echo form_open("profil_edit_c/achivement_edit");

					echo form_hidden("id", $row->id);
					echo form_label("Achivement: ", "achivement");
					echo "</td><td>";
					echo form_textarea("achivement", $row ->achivement);
					echo "</td></tr><tr><td>";
					echo form_label("Location: ", "location");
					echo "</td><td>";
					echo form_input("location", $row ->ach_location);
					echo "</td></tr><tr><td>";
					echo form_label("Year: ", "year");
					echo "</td><td>";
					echo form_input("year", $row ->ach_year);
					echo "</td></tr><tr><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "achivement_submit",
							"value" => "Save",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "achivement_delete",
							"value" => "Remove",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td></tr>";
					echo form_close();
					echo "</table>";
				}
			}
			
		} elseif($table == 'courses') {
			if($id == 0){
				echo "<table><tr><td>";
				echo form_open("profil_insert_c/courses");

				echo form_label("Cours Name: ", "cours_name");
				echo "</td><td>";
				echo form_input("name");
				echo "</td></tr><tr><td>";
				echo form_label("Institution: ", "institution");
				echo "</td><td>";
				echo form_input("institution");
				echo "</td></tr><tr><td>";
				echo form_label("Location: ", "location");
				echo "</td><td>";
				echo form_input("location");
				echo "</td></tr><tr><td>";
				echo form_label("Year Start", "year_start");
				echo "</td><td>";
				echo form_input('year_start');
				echo "</td></tr><tr><td>";
				echo form_label("Month Start", "month_start");
				echo "</td><td>";
				echo form_input('month_start');
				echo "</td></tr><tr><td>";
				echo form_label("Year Finish:", "year_finish");
				echo "</td><td>";
				echo form_input('year_finish');
				echo "</td></tr><tr><td>";
				echo form_label("Month Finish: ", "month_finish");
				echo "</td><td>";
				echo form_input('month_finish');
				echo "</td></tr><tr><td>";
				echo form_label("Additionnal Info: ", "add_info");
				echo "</td><td>";
				echo form_textarea("additional");
				echo "</td></tr><tr><td>";
				$data = array (
						"type"  => "submit",
						"name"  => "courses_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
				echo form_submit($data);
				echo "</td></tr>";
				echo form_close();
				echo "</table>";
			} else {
				$tabela = "courses";
				
				$this->load->model("model_get");
				$result = $this->model_get->get_data_unique($tabela, $id, "id");
				foreach ($result as $row) {
					echo "<table><tr><td>";
					echo form_open("profil_edit_c/courses_edit");

					echo form_hidden("id", $row->id);
					echo form_label("Cours Name: ", "cours_name");
					echo "</td><td>";
					echo form_input("name", $row ->courses_name);
					echo "</td></tr><tr><td>";
					echo form_label("Institution: ", "institution");
					echo "</td><td>";
					echo form_input("institution", $row ->institution);
					echo "</td></tr><tr><td>";
					echo form_label("Location: ", "location");
					echo "</td><td>";
					echo form_input("location", $row ->courses_location);
					echo "</td></tr><tr><td>";
					echo form_label("Year Start", "year_start");
					echo "</td><td>";
					echo form_input('year_start', $row ->courses_year_start);
					echo "</td></tr><tr><td>";
					echo form_label("Month Start", "month_start");
					echo "</td><td>";
					echo form_input('month_start', $row ->courses_month_start);
					echo "</td></tr><tr><td>";
					echo form_label("Year Finish:", "year_finish");
					echo "</td><td>";
					echo form_input('year_finish', $row ->courses_year_finish);
					echo "</td></tr><tr><td>";
					echo form_label("Month Finish: ", "month_finish");
					echo "</td><td>";
					echo form_input('month_finish', $row ->courses_month_finish);
					echo "</td></tr><tr><td>";
					echo form_label("Additionnal Info: ", "add_info");
					echo "</td><td>";
					echo form_textarea("additional", $row ->courses_additional);
					echo "</td></tr><tr><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "courses_submit",
							"value" => "Save",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "courses_delete",
							"value" => "Remove",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td></tr>";
					echo form_close();
					echo "</table>";
				}
			}
			
		} elseif($table == 'education') {
			if($id == 0){
				echo "<table><tr><td>";
				echo form_open("profil_insert_c/education");

				echo form_label("Institution: ", "institution");
				echo "</td><td>";
				echo form_input("institution");
				echo "</td></tr><tr><td>";
				echo form_label("Qualification: ", "qualification");
				echo "</td><td>";
				echo form_input("qualification");
				echo "</td></tr><tr><td>";
				echo form_label("Department: ", "department");
				echo "</td><td>";
				echo form_input("department");
				echo "</td></tr><tr><td>";
				echo form_label("Location: ", "location");
				echo "</td><td>";
				echo form_input("location");
				echo "</td></tr><tr><td>";
				echo form_label("Year Start: ", "year_start");
				echo "</td><td>";
				echo form_input('year_start');
				echo "</td></tr><tr><td>";
				echo form_label("Year Finish:", "year_finish");
				echo "</td><td>";
				echo form_input('year_finish');
				echo "</td></tr><tr><td>";
				$data = array (
						"type"  => "submit",
						"name"  => "education_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
				echo form_submit($data);
				echo "</td></tr>";
				echo form_close();
				echo "</table>";
			} else {
				$tabela = "education";
				
				$this->load->model("model_get");
				$result = $this->model_get->get_data_unique($tabela, $id, "id");
				foreach ($result as $row) {
					echo "<table><tr><td>";
					echo form_open("profil_edit_c/education_edit");

					echo form_hidden("id", $row->id);
					echo form_label("Institution: ", "institution");
					echo "</td><td>";
					echo form_input("institution", $row->institution);
					echo "</td></tr><tr><td>";
					echo form_label("Qualification: ", "qualification");
					echo "</td><td>";
					echo form_input("qualification", $row->qualification);
					echo "</td></tr><tr><td>";
					echo form_label("Department: ", "department");
					echo "</td><td>";
					echo form_input("department", $row->department);
					echo "</td></tr><tr><td>";
					echo form_label("Location: ", "location");
					echo "</td><td>";
					echo form_input("location", $row->education_location);
					echo "</td></tr><tr><td>";
					echo form_label("Year Start: ", "year_start");
					echo "</td><td>";
					echo form_input('year_start', $row->education_year_start);
					echo "</td></tr><tr><td>";
					echo form_label("Year Finish:", "year_finish");
					echo "</td><td>";
					echo form_input('year_finish', $row->education_year_finish);
					echo "</td></tr><tr><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "education_submit",
							"value" => "Save",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "education_delete",
							"value" => "Remove",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td></tr>";
					echo form_close();
					echo "</table>";
				}
			}
			
		} elseif($table == 'hobbies') {
			if($id == 0){
				echo "<table><tr><td>";
				echo form_open("profil_insert_c/hobbies");

				echo form_label("Hobbies: ", "hobbies");
				echo "</td><td>";
				echo form_textarea("hobbies");
				echo "</td></tr><tr><td>";
				$data = array (
						"type"  => "submit",
						"name"  => "hobbies_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
				echo form_submit($data);
				echo "</td></tr>";
				echo form_close();
				echo "</table>";
			} else {
				$tabela = "hobbies";
				
				$this->load->model("model_get");
				$result = $this->model_get->get_data_unique($tabela, $id, "id");
				foreach ($result as $row) {
					echo "<table><tr><td>";
					echo form_open("profil_edit_c/hobbies_edit");
					
					echo form_hidden("id", $row->id);
					echo form_label("Hobbies: ", "hobbies");
					echo "</td><td>";
					echo form_textarea("hobbies", $row ->hobbies);
					echo "</td></tr><tr><td>";
					$data = array (
						"type"  => "submit",
						"name"  => "hobbies_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
					echo form_submit($data);
					echo "</td><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "hobbies_delete",
							"value" => "Remove",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td></tr>";
					echo form_close();
					echo "</table>";
				}
			}
			
		} elseif($table == 'language') {
			if($id == 0){
				echo "<table><tr><td>";
				echo form_open("profil_insert_c/language");

				$speaking = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
				$listening = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
				$reading = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
				$writing = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');

				echo form_label("Language: ", "language");
				echo "</td><td>";
				echo form_input('language');
				echo "</td></tr><tr><td>";
				echo form_label("Speaking: ", "speaking");
				echo "</td><td>";
				echo form_dropdown('speaking', $speaking, 'a1');
				echo "</td></tr><tr><td>";
				echo form_label("Listening: ", "listening");
				echo "</td><td>";
				echo form_dropdown('listening', $listening, 'a1');
				echo "</td></tr><tr><td>";
				echo form_label("Reading: ", "reading");
				echo "</td><td>";
				echo form_dropdown('reading', $reading, 'a1');
				echo "</td></tr><tr><td>";
				echo form_label("Writing: ", "writing");
				echo "</td><td>";
				echo form_dropdown('writing', $writing, 'a1');
				echo "</td></tr><tr><td>";
				$data = array (
						"type"  => "submit",
						"name"  => "language_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
				echo form_submit($data);
				echo "</td></tr>";
				echo form_close();
				echo "</table>";
			} else {
				$tabela = "language";
				
				$this->load->model("model_get");
				$result = $this->model_get->get_data_unique($tabela, $id, "id");
				foreach ($result as $row) {
					echo "<table><tr><td>";
					echo form_open("profil_edit_c/language_edit");

					$speaking = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
					$listening = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
					$reading = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
					$writing = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');

					echo form_hidden("id", $row->id);
					echo form_label("Language: ", "language");
					echo "</td><td>";
					echo form_input('language', $row ->language);
					echo "</td></tr><tr><td>";
					echo form_label("Speaking: ", "speaking");
					echo "</td><td>";
					echo form_dropdown('speaking', $speaking, $row ->speaking, 'a1');
					echo "</td></tr><tr><td>";
					echo form_label("Listening: ", "listening");
					echo "</td><td>";
					echo form_dropdown('listening', $listening, $row ->listening, 'a1');
					echo "</td></tr><tr><td>";
					echo form_label("Reading: ", "reading");
					echo "</td><td>";
					echo form_dropdown('reading', $reading, $row ->reading, 'a1');
					echo "</td></tr><tr><td>";
					echo form_label("Writing: ", "writing");
					echo "</td><td>";
					echo form_dropdown('writing', $writing, $row ->writing, 'a1');
					echo "</td></tr><tr><td>";
					$data = array (
						"type"  => "submit",
						"name"  => "language_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
					echo form_submit($data);
					echo "</td><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "language_delete",
							"value" => "Remove",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td></tr>";
					echo form_close();
					echo "</table>";
				}
			}
			
		} elseif($table == 'qualities') {
			if($id == 0){
				echo "<table><tr><td>";
				echo form_open("profil_insert_c/qualities");

				echo form_label("Qualities: ", "qualities");
				echo "</td><td>";
				echo form_textarea("qualities");
				echo "</td></tr><tr><td>";
				$data = array (
						"type"  => "submit",
						"name"  => "qualities_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
				echo form_submit($data);
				echo "</td></tr>";
				echo form_close();
				echo "</table>";
			} else {
				$tabela = "qualities";
				
				$this->load->model("model_get");
				$result = $this->model_get->get_data_unique($tabela, $id, "id");
				foreach ($result as $row) {
					echo "<table><tr><td>";
					echo form_open("profil_edit_c/qualities_edit");

					echo form_hidden("id", $row->id);
					echo form_label("Qualities: ", "qualities");
					echo "</td><td>";
					echo form_textarea("qualities", $row->qualities);
					echo "</td></tr><tr><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "qualities_submit",
							"value" => "Save",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "qualities_delete",
							"value" => "Remove",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td></tr>";
					echo form_close();
					echo "</table>";
				}
			}
			
		} elseif($table == 'work_expience') {
			if($id == 0){
				echo "<table><tr><td>";
				echo form_open("profil_insert_c/work_exp");

				echo form_label("Company: ", "company");
				echo "</td><td>";
				echo form_input("company");
				echo "</td></tr><tr><td>";
				echo form_label("Position: ", "we_position");
				echo "</td><td>";
				echo form_input("we_position");
				echo "</td></tr><tr><td>";
				echo form_label("Responsibilities: ", "we_responsibilities");
				echo "</td><td>";
				echo form_textarea("we_responsibilities");
				echo "</td></tr><tr><td>";
				echo form_label("Location: ", "we_location");
				echo "</td><td>";
				echo form_input("we_location");
				echo "</td></tr><tr><td>";
				echo form_label("Date", 'date');
				echo "</td><td></td></tr><tr><td>";
				// echo form_label("Year Start: ", "year_start");
				// echo "</td><td>";
				// echo form_input('year_start');
				// echo "</td></tr><tr><td>";
				// echo form_label("Month Start: ", "month_start");
				// echo "</td><td>";
				// echo form_input('month_start');
				// echo "</td></tr><tr><td>";
				// echo form_label("Year Finish: ", "year_finish");
				// echo "</td><td>";
				// echo form_input('year_finish');
				// echo "</td></tr><tr><td>";
				// echo form_label("Month Finish: ", "month_finish");
				// echo "</td><td>";
				// echo form_input('month_finish');
				echo form_label("Company Contact: ", "company_contact");
				echo "</td><td>";
				echo form_input("company_contact");
				echo "</td></tr><tr><td>";$data = array (
						"type"  => "submit",
						"name"  => "work_exp_submit",
						"value" => "Save",
						"id"    => "button_submit"
					);
				echo form_submit($data);
				echo "</td></tr>";
				echo form_close();
				echo "</table>";
			} else {
				$tabela = "work_expience";
				
				$this->load->model("model_get");
				$result = $this->model_get->get_data_unique($tabela, $id, "id");
				foreach ($result as $row) {
					echo "<table><tr><td>";
					echo form_open("profil_edit_c/work_exp_edit");
					
					echo form_hidden("id", $row->id);
					echo form_label("Company: ", "company");
					echo "</td><td>";
					echo form_input("company", $row ->company);
					echo "</td></tr><tr><td>";
					echo form_label("Position: ", "we_position");
					echo "</td><td>";
					echo form_input("we_position", $row ->we_position);
					echo "</td></tr><tr><td>";
					echo form_label("Responsibilities: ", "we_responsibilities");
					echo "</td><td>";
					echo form_textarea("we_responsibilities", $row ->we_responsibilities);
					echo "</td></tr><tr><td>";
					echo form_label("Location: ", "we_location");
					echo "</td><td>";
					echo form_input("we_location", $row ->we_location);
					echo "</td></tr><tr><td>";
					// echo form_label("Year Start: ", "year_start");
					// echo "</td><td>";
					// echo form_input('year_start', $row ->we_year_start);
					// echo "</td></tr><tr><td>";
					// echo form_label("Month Start: ", "month_start");
					// echo "</td><td>";
					// echo form_input('month_start', $row ->we_month_start);
					// echo "</td></tr><tr><td>";
					// echo form_label("Year Finish: ", "year_finish");
					// echo "</td><td>";
					// echo form_input('year_finish', $row ->we_year_finish);
					// echo "</td></tr><tr><td>";
					// echo form_label("Month Finish: ", "month_finish");
					// echo "</td><td>";
					// echo form_input('month_finish', $row ->we_month_finish);
					echo "</td></tr><tr><td>";
					echo form_label("Company Contact: ", "company_contact");
					echo "</td><td>";
					echo form_input("company_contact", $row ->company_contact);
					echo "</td></tr><tr><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "work_exp_submit",
							"value" => "Save",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td><td>";
					$data = array (
							"type"  => "submit",
							"name"  => "work_exp_delete",
							"value" => "Remove",
							"id"    => "button_submit"
						);
					echo form_submit($data);
					echo "</td></tr>";
					echo form_close();
					echo "</table>";
				}
			}
		}
	}
}
?>