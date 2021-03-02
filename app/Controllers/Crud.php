<?php

namespace App\Controllers;

use App\Models\Mdata;

class Crud extends BaseController
{

	public function __construct()
	{
		$this->mdata = new Mdata;
	}

	public function index()
	{
		$data = [
			'title' => 'Login Aplikasi',
			'uri' => base_url('crud/data-crud'),
			'con' => 'content',
		];
		echo view('template/layer', $data);
	}

	public function edit()
	{
		$uri = getSegment(3);
		$cc = $this->mdata->cr(array('Pelanggan_ID' => $uri), 'pelanggan');

		if ($cc) {

			$data = [
				'da' => $cc,
				'title' => 'Login Aplikasi',
				'uri' => base_url('crud/data-crud'),
				'con' => 'edit',
			];
			echo view('template/layer', $data);
		} else {
			echo view('404');
		}
	}

	public function dcommon()
	{
		$da = $this->request->getPost('Id');
		$clientc = $this->mdata->cc(array('Pelanggan_ID' => $da), 'pelanggan');
		if ($clientc) {
			$this->mdata->dc(array('Pelanggan_ID' => $da), 'pelanggan');
		}
	}


	public function data_crud()
	{
		$fetch_data = $this->mdata->view('pelanggan');
		$data = array();
		$no = 1;
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $no++;
			$sub_array[] = $row->Pelanggan_Nama;
			$sub_array[] = $row->Pelanggan_Alamat;
			$sub_array[] = $row->Pelanggan_HP;
			$sub_array[] = $row->Pelanggan_PIC;
			$sub_array[] = '<button type="button" uri="' . base_url('crud/dcommon') . '"  name="delete" id="' . $row->Pelanggan_ID . '" class="btn btn-danger btn-xs del"><i class="fa fa-trash"></i></button>&nbsp;
			<a href="' . base_url('crud/edit/' . $row->Pelanggan_ID) . '"  class="btn btn-primary btn-xs ekar"><i class="fa fa-edit"></i></a>';
			$data[] = $sub_array;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}

	public function act()
	{
		$data = array('success' => false, 'messages' => array());
		$this->valid->setRule('nama', 'Nama', 'required|alpha_numeric');
		$this->valid->setRule('al', 'Alamat', 'required');
		$this->valid->setRule('pic', 'PIC', 'required');
		$this->valid->setRule('hp', 'HP', 'required|numeric');
		$this->valid->setRule('telp', 'telp', 'required|alpha_numeric');

		$val = $this->valid->withRequest($this->request);
		if ($val->run() == FALSE) {

			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = $this->valid->showError($key, 'errtemp');
			}
		} else {
			$data['success'] = true;

			$id = $this->request->getPost('id');
			$cc = $this->mdata->cc(array('Pelanggan_ID' => $id), 'pelanggan');
			if (!$cc) {
				$da = [
					'Pelanggan_ID' => random_string('numeric', 3),
					'Pelanggan_Nama' => trim($this->request->getPost('nama')),
					'Pelanggan_Alamat' => trim($this->request->getPost('al')),
					'Pelanggan_Telp' => trim($this->request->getPost('telp')),
					'Pelanggan_HP' => trim($this->request->getPost('hp')),
					'Pelanggan_PIC' => trim($this->request->getPost('pic')),
					'Pelanggan_crated_Date' => date("Y-m-d H:i:s"),
					'Pelanggan_Created_By' => 'user',
					'Pelanggan_Modified_Date' => date("Y-m-d H:i:s"),
					'Pelanggan_Modified_By' => 'user',
					'Harga_ID' => random_string('numeric', 4)
				];
				$this->mdata->safe($da, 'pelanggan');
			} else {
				$da = [
					'Pelanggan_ID' => random_string('numeric', 3),
					'Pelanggan_Nama' => trim($this->request->getPost('nama')),
					'Pelanggan_Alamat' => trim($this->request->getPost('al')),
					'Pelanggan_Telp' => trim($this->request->getPost('telp')),
					'Pelanggan_HP' => trim($this->request->getPost('hp')),
					'Pelanggan_PIC' => trim($this->request->getPost('pic')),
					'Pelanggan_crated_Date' => date("Y-m-d H:i:s"),
					'Pelanggan_Created_By' => 'user',
					'Pelanggan_Modified_Date' => date("Y-m-d H:i:s"),
					'Pelanggan_Modified_By' => 'user',
					'Harga_ID' => random_string('numeric', 4)
				];
				$this->mdata->ud(array('Pelanggan_ID' => $id), 'pelanggan', $da);

				$data['redirect'] = base_url('crud');
			}
		}

		echo json_encode($data);
	}
}
