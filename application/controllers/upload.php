<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Upload extends CI_Controller {

		public function upload_user_pic(){

			$id = $this->session->userdata('user_id');
			$tabela = 'user_img';
			

			$this->load->model('model_insert');
			$this->load->model('model_update');

			$config = array(
					'user_id'       => $id,
					'upload_path'   => './profil_pic',
					'allowed_types' => 'gif|jpg|jpeg|png',
					'max_size'      => '2000'
				);

			$this->load->library('upload', $config);

			if( $this->input->post('insert_submit') ) {
				if( !$this->upload->do_upload()){
					$error = array('error'=>$this->upload->display_errors());
					$this->load->view('user_settings', $error);
				} else {
					$data = array('uplaod_data' => $this->upload->data());
					$file_name = $data['uplaod_data']['file_name'];
					$this->resize_user_pic($data['uplaod_data']['full_path'], $file_name);
					$data = array(
							'user_id' => $id,
							'img_path' => '../profil_pic/'.$file_name
						);
					$this->model_insert->insert_data( $tabela, $data );
					redirect('/consilium/user_settings', 'refresh');
				}
			} elseif( $this->input->post('update_submit') ) {
				if( !$this->upload->do_upload()){
					$error = array('error'=>$this->upload->display_errors());
					$this->load->view('user_settings', $error);
				} else {
					$data = array('uplaod_data' => $this->upload->data());
					$file_name = $data['uplaod_data']['file_name'];
					$this->resize_user_pic($data['uplaod_data']['full_path'], $file_name);
					$data = array(
							'user_id' => $id,
							'img_path' => '../profil_pic/'.$file_name
						);
					$this->model_update->update_data_settings( $tabela, $data, $id );
				}
					redirect('/consilium/user_settings', 'refresh');
			}
		}

		function resize_user_pic($path, $file){
			$config = array(
					'source_image'   => $path,
					'create_thumb'   => true,
					'maintain_ratio' => true,
					'width'          => 150,
					'height'         => 75,
					'new_image'      => './profil_pic/thumbs/'.$file
				);

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
		}
	

		function get_user_pic(){
			$user_id = $this->session->userdata('user_id');
			$query = $this->db->query("SELECT * FROM user_img WHERE user_id =".$user_id);
			if($query->num_rows()==0)
				die("Picture not found!");
			else{
				$data['img'] = 'img_path';
				$this->load->view('user_settings', $data);
			}
		}

		public function upload_project_pic(){

			$id = $this->session->userdata('user_id');
			$tabela = 'project';
			
			$this->load->model('model_update');

			$config = array(
					'user_id'       => $id,
					'upload_path'   => './project_pic',
					'allowed_types' => 'gif|jpg|jpeg|png',
					'max_size'      => '2000'
				);

			$this->load->library('upload', $config);

			if( !$this->upload->do_upload()){
				$error = array('error'=>$this->upload->display_errors());
			} else {
				$data = array('uplaod_data' => $this->upload->data());
				$file_name = $data['uplaod_data']['file_name'];
				$this->resize_project_pic($data['uplaod_data']['full_path'], $file_name);
				$data = array(
						'user_id'  => $id,
						'img_path' => '../project_pic/'.$file_name
					);

				return $data;
			}
		}

		function resize_project_pic($path, $file){
			$config = array(
					'source_image'   => $path,
					'create_thumb'   => true,
					'maintain_ratio' => true,
					'width'          => 150,
					'height'         => 75,
					'new_image'      => './project_pic/thumbs/'.$file
				);

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
		}
	

		function get_project_pic(){
			$user_id = $this->session->userdata('user_id');
			$query = $this->db->query("SELECT * FROM project_pic WHERE user_id =".$user_id);
			if($query->num_rows()==0)
				die("Picture not found!");
			else{
				$data['img'] = 'img_path';
				$this->load->view('profil_project_edit', $data);
			}
		}



	}
?>
		