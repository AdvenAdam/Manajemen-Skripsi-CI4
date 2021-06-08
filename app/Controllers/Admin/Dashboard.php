<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Bidang;
use App\Models\Jenispenelitian;
use App\Models\Kategoridokumen;
use App\Models\Transaksi;
use App\Models\Dokumen;
use App\Models\Pengunjung;

class Dashboard extends BaseController
{
	protected $bidang, $pengunjung, $jenis, $kategori, $dokumen;
	protected $db, $builder;
	function __construct()
	{
		$this->db		= \Config\Database::connect();
		$this->builder = $this->db->table('users');
		$this->bidang = new Bidang();
		$this->jenis = new Jenispenelitian();
		$this->kategori = new Kategoridokumen();
		$this->dokumen = new Dokumen();
		$this->pengunjung = new Pengunjung();
		$this->transaksi = new Transaksi();
	}
	// $user = new \Myth\Auth\Models\UserModel();
	// 'users' => $user->findAll(),
	public function index()
	{
		$jenis = $this->request->getVar('jenis');
		$jenis_trx = $this->request->getVar('jenis_trx');
		$data = [
			'kategori' 		=> $this->kategori(),
			'bidang' 		=> $this->bidang(),
			'jenis' 		=> $this->jenis(),
			'riwayat_trx'  	=> count($this->transaksi->getTransaksi()),
			'jml_trx'  		=> $this->transaksi->cekJmlTrx(),
			'jml_dokumen' 	=> count($this->dokumen->findAll()),
			'active'		=> 'dashboard',
			'title'			=> 'Dashboard Admin',
			'level'			=> implode(',', user()->getRoles())
		];
		if ($jenis == 'Tahunan') {
			$data['pengunjung'] = $this->pengunjung->getData('Tahunan');
		} else if ($jenis == 'Bulanan') {
			$data['pengunjung'] = $this->pengunjung->getData('Bulanan');
		} else if ($jenis == 'Harian' || $jenis == null) {
			$data['pengunjung'] = $this->pengunjung->getData('Harian');
		}
		if ($jenis_trx == 'Tahunan') {
			$data['transaksi'] = $this->transaksi->getData('Tahunan');
		} else if ($jenis_trx == 'Bulanan') {
			$data['transaksi'] = $this->transaksi->getData('Bulanan');
		} else if ($jenis_trx == 'Harian' || $jenis_trx == null) {
			$data['transaksi'] = $this->transaksi->getData('Harian');
		}

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
				'jumlah' => count($this->dokumen->getByKategori($value['id_kategori_dokumen'])),
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
				'jumlah' => count($this->dokumen->getByBidang($value['id_bidang'])),
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
				'jumlah' 	=> count($this->dokumen->getByJenis($value['id_jenis_penelitian'])),
			];
		}
		return $newArray;
	}
}
