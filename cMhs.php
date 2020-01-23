<?php
defined('BASEPATH') or exit('No direct script access allowed');
include($_SERVER['DOCUMENT_ROOT'] . '/cs_uptk/application/helpers/ChromePhp.php');

class cMhs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mMhs');
	}

	public function index()
	{
		$data['tabTitle'] = 'MAHASISWA';
		$data['mahasiswa'] = $this->mMhs->getAll();

		$this->load->view('Template/header', $data);
		$this->load->view('Mhs/list');
		$this->load->view('Mhs/list_script');
		$this->load->view('Mhs/modal');
		$this->load->view('Mhs/modal_script');
		$this->load->view('Template/footer');
	}
	public function getItemById()
	{
		$data['_DataMahasiswa'] = $this->mMhs->getItemById();

		echo json_encode($data);
	}

	public function showAddForm()
	{
		$data['tabTitle'] = 'MAHASISWA';
		$data['pageTitle'] = 'Tambah Data Mahasiswa';

		$this->load->view('Template/header', $data);
		$this->load->view('Mhs/add', $data);
		$this->load->view('Template/footer');
	}

	public function addItem()
	{
		$queryResult = $this->mMhs->addItem();

		$flashName = 'mhs_flash';
		$msg = '';
		$alertClass = '';
		$redirect = 'cMhs';
		if ($queryResult) {
			$msg = 'DATA <strong>BERHASIL</strong> DITAMBAHKAN!';
			$alertClass = 'alert alert-success mhs_alert';
		} else {
			$msg = 'DATA <strong>GAGAL</strong> DITAMBAHKAN!';
			$alertClass = 'alert alert-danger mhs_alert';
		}
		$this->session->set_flashdata($flashName, '<div class="' . $alertClass . '" role="alert">' . $msg . '</div>');
		redirect($redirect);
	}

	// public function showEditForm()
	// {
	// 	$data['tabTitle'] = 'MAHASISWA';
	// 	$data['pageTitle'] = 'EDIT';
	// 	$data['mahasiswa'] = $this->mMhs->getItemById();

	// 	$this->load->view('Template/header', $data);
	// 	$this->load->view('Mhs/edit', $data);
	// 	$this->load->view('Template/footer');
	// }

	function editItem()
	{
		$queryResult = $this->mMhs->editItem();

		$flashName = 'mhs_flash';
		$msg = '';
		$alertClass = '';
		$redirect = 'cMhs';
		if ($queryResult) {
			$msg = 'DATA <strong>BERHASIL</strong> DITAMBAHKAN!';
			$alertClass = 'alert alert-success mhs_alert';
		} else {
			$msg = 'DATA <strong>GAGAL</strong> DITAMBAHKAN!';
			$alertClass = 'alert alert-danger mhs_alert';
		}
		$this->session->set_flashdata($flashName, '<div class="' . $alertClass . '" role="alert">' . $msg . '</div>');
		redirect($redirect);
	}

	function deleteItem()
	{
		$this->mMhs->deleteItem();
		redirect('cMhs');
	}

	public function showDetail()
	{
		$data['tabTitle'] = 'MAHASISWA';
		$data['pageTitle'] = 'DETAIL';
		$data['mahasiswa'] = $this->mMhs->getItemById();

		$this->load->view('Template/header', $data);
		$this->load->view('Mhs/detail', $data);
		$this->load->view('Template/footer');
	}

	public function Detail()
	{
		redirect('cMhs');
	}
}
