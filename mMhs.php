<?php

class mMhs extends CI_Model
{
	public function getAll()
	{
		$this->db->order_by('id', 'asc');
		return $this->db->get('t_mhs')->result_array();
	}

	public function addItem()
	{
		$data = [
			'name'       => $this->input->post("txt-add-name"),
			'nim'        => $this->input->post("txt-add-nim"),
			'jurusan'    => $this->input->post("txt-add-jurusan"),
			'prodi'      => $this->input->post("txt-add-prodi"),
			'kelas'      => $this->input->post("txt-add-kelas"),
			'photo'      => $this->_uploadImage($this->input->post("txt-add-name"), 'onAdd')
		];

		$query = $this->db->insert('t_mhs', $data);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}



	function editItem()
	{

		$data = [
			'name'       => $this->input->post("txt-edit-name"),
			'nim'        => $this->input->post("txt-edit-nim"),
			'jurusan'    => $this->input->post("txt-edit-jurusan"),
			'prodi'      => $this->input->post("txt-edit-prodi"),
			'kelas'      => $this->input->post("txt-edit-kelas"),
			'photo'      => $this->_uploadImage($this->input->post("txt-edit-name"), 'onEdit')
		];

		$query = $this->db->where('id', $this->input->get('rowID'))->update('t_mhs', $data);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	function getItemById()
	{
		// return $this->db->get_where('t_mhs', ['id =' => $this->input->get('rowID')])->result();
		return $this->db->get_where('t_mhs', ['id =' => $this->input->post('rowID')])->row_array();
	}


	function deleteItem()
	{
		$query = $this->db->delete('t_mhs', ['id' => $this->input->get('rowID')]);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function _uploadImage($_FileName, $_FlagOn)
	{
		$_Mhs_UploadPath = './uploads/Mahasiswa/';

		$config['upload_path'] = $_Mhs_UploadPath;
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['file_name'] = $_FileName;
		$config['overwrite'] = true;
		$config['max_size'] = 1024; // 1MB
		$config['max_widht'] = 1024;
		$config['max_height'] = 768;

		$_UploadFrom = $_FlagOn == 'onAdd' ? 'file-add-upload' : 'file-edit-upload';

		$this->upload->initialize($config);
		// ChromePhp::log($this->upload->initialize($config));
		// ChromePhp::log($this->upload->do_upload($_UploadFrom));
		// die();

		if ($this->upload->do_upload($_UploadFrom)) {
			$_Img = $this->upload->data();

			//Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = $_Mhs_UploadPath . $_Img['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '50%';
			$config['width'] = 600;
			$config['height'] = 400;
			$config['new_image'] = $_Mhs_UploadPath . $_Img['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			return $this->upload->data('file_name');
		}
		return 'default.jpg';
	}
}
