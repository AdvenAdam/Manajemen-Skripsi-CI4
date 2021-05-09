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
	function __construct()
	{
		$this->bidang = new Bidang();
		$this->jenis = new Jenispenelitian();
		$this->kategori = new Kategoridokumen();
		$this->dokumen = new Dokumen();
	}
	public function index()
	{
		$data = [
			'kategori' => $this->kategori(),
			'bidang' => $this->bidang(),
			'jenis' => $this->jenis(),
			'jml_dokumen' => count($this->dokumen->findAll())
		];

		return view('/admin/dashboard', $data);
	}
	public function kategori()
	{
		$kategori = $this->kategori->findAll();
		$newKategori = array();
		foreach ($kategori as $key => $value) {
			$newKategori[$key] = [
				'kategori' => $value['kategori_dokumen'],
				'jumlah' => count($this->dokumen->getDokumenByKategori($value['id_kategori_dokumen'])),
			];
		}

		return $newKategori;
	}
	public function bidang()
	{
		$bidang = $this->bidang->findAll();
		$newKategori = array();
		foreach ($bidang as $key => $value) {
			$newKategori[$key] = [
				'bidang' => $value['bidang'],
				'jumlah' => count($this->dokumen->getDokumenByBidang($value['id_bidang'])),
			];
		}
		return $newKategori;
	}
	public function jenis()
	{
		$jenis = $this->jenis->findAll();
		$newKategori = array();
		foreach ($jenis as $key => $value) {
			$newKategori[$key] = [
				'jenis' 	=> $value['jenis_penelitian'],
				'jumlah' 	=> count($this->dokumen->getDokumenByJenis($value['id_jenis_penelitian'])),
			];
		}
		return $newKategori;
	}
}
