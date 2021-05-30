<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Bidang;
use App\Models\Jenispenelitian;
use App\Models\Kategoridokumen;
use App\Models\Dokumen;

class Dashboard extends BaseController
{
	protected $bidang;
	protected $jenis;
	protected $kategori;
	protected $dokumen;
	protected $db, $builder;
	function __construct()
	{
		$this->db		= \Config\Database::connect();
		$this->builder = $this->db->table('users');
		$this->bidang = new Bidang();
		$this->jenis = new Jenispenelitian();
		$this->kategori = new Kategoridokumen();
		$this->dokumen = new Dokumen();
	}
	public function index()
	{
		// $user = new \Myth\Auth\Models\UserModel();
		// 'users' => $user->findAll(),

		$data = [
			'kategori' => $this->kategori(),
			'bidang' => $this->bidang(),
			'jenis' => $this->jenis(),
			'jml_dokumen' => count($this->dokumen->findAll())
		];
		//mendapatkan data login dalam session
		//user()->user_image;
		return view('/admin/dashboard', $data);
	}
	public function detail($id = 0)
	{
		$this->builder->select('users.id as userid, username, email, name, ');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$this->builder->where('users.id', $id);
		$query	 = $this->builder->get();
		$data = [
			'users' => $query->getRow(),
		];
		if (empty($data['users'])) {
			return view('/admin/dashboard', $data);
		}
		return view('/admin/dashboard', $data);
	}



	public function kategori()
	{
		$kategori = $this->kategori->findAll();
		$newArray = array();
		foreach ($kategori as $key => $value) {
			$newArray[$key] = [
				'kategori' => $value['kategori_dokumen'],
				'jumlah' => count($this->dokumen->getDokumenByKategori($value['id_kategori_dokumen'])),
			];
		}

		return $newArray;
	}
	public function bidang()
	{
		$bidang = $this->bidang->findAll();
		$newArray = array();
		foreach ($bidang as $key => $value) {
			$newArray[$key] = [
				'bidang' => $value['bidang'],
				'jumlah' => count($this->dokumen->getDokumenByBidang($value['id_bidang'])),
			];
		}
		return $newArray;
	}
	public function jenis()
	{
		$jenis = $this->jenis->findAll();
		$newArray = array();
		foreach ($jenis as $key => $value) {
			$newArray[$key] = [
				'jenis' 	=> $value['jenis_penelitian'],
				'jumlah' 	=> count($this->dokumen->getDokumenByJenis($value['id_jenis_penelitian'])),
			];
		}
		return $newArray;
	}
}
