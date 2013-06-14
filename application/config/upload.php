<?php 
function uploadFile(){
	
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('photo'))
			{
				$error = array('error' => $this->upload->display_errors());

				print_r("default"); exit;
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('upload_success', $data);
			}
		}
?>