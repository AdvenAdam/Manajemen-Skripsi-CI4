<?php

namespace App\Controllers;

use App\Models\Dokumen;
use App\Models\Bidang;
use App\Models\Jenispenelitian;
use App\Models\Kategoridokumen;
use App\Models\Pengunjung;

class Home extends BaseController
{

	protected $bidang, $pengunjung, $jenis, $kategori, $dokumen;

	function __construct()
	{
		$this->dokumen = new Dokumen();
		$this->pengunjung = new Pengunjung();
		$this->kategori = new Kategoridokumen();
		$this->bidang = new Bidang();
		$this->jenis = new Jenispenelitian();
	}
	public function index()
	{
		if (in_groups('admin') || in_groups('superadmin')) {
			return redirect()->to('/Admin');
		} else if (in_groups('member')) {
			$data = [
				'kategori' 		=> $this->kategori(),
				'bidang' 		=> $this->bidang(),
				'jenis' 		=> $this->jenis(),
				'slider'		=> $this->dataSlider(),
				'title'			=> 'SIDAKI'
			];
			$this->hitungPengunjung();
			return view('user/Home/Home', $data);
		}
		$data = [
			'kategori' 		=> $this->kategori(),
			'bidang' 		=> $this->bidang(),
			'jenis' 		=> $this->jenis(),
			'slider'		=> $this->dataSlider(),
			'title'			=> 'SIDAKI'
		];
		$this->hitungPengunjung();
		return view('user/Home/Home', $data);
	}

	public function dataJudul()
	{
		$data = [
			'title'   => 'Data Judul',
			'dokumen' => $this->dokumen->getDokumen(),
			'kategori' => $this->kategori->findAll(),
		];
		$kategori = $this->kategori->findAll();
		// menampilkan data berdasarkan kategori
		foreach ($kategori as $kategori) {
			$data['kategori' . $kategori['id_kategori_dokumen']] = $this->dokumen->getDokumenByFilter($kategori['id_kategori_dokumen']);
		}
		// dd($data);
		return view('user/dokumen/index', $data);
	}
	public function detail($id)
	{
		$data = [
			'dokumen' => $this->dokumen->getDokumen($id),
			'title'   => 'detail Dokumen'
		];
		return  view('user/dokumen/details', $data);
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
	public function hitungPengunjung()
	{
		$data = $this->pengunjung->getLastData();
		if ($data['created_at'] == date('Y-m-d')) {
			$counter = $data['jml_pengunjung'] + 1;
			$this->pengunjung->save([
				'id'			 => $data['id'],
				'jml_pengunjung' => $counter
			]);
		} else {
			$this->pengunjung->save([
				'jml_pengunjung' => 1
			]);
		}
	}
	public function dataSlider()
	{

		$slider = [
			[
				'gambar'	=> 'slider2.png',
				'prodi'		=> 'PTIK FKIP UNS',
				'judul'		=> 'Profil PTIK-UNS',
				'link'		=> '',
				'isi'		=> 'Fakultas Keguruan dan Ilmu Pendidikan Universitas Sebelas Maret Surakarta merupakan Lembaga Pendidikan Tenaga Kependidikan (LPTK) yang memiliki 24 program studi di 6 jurusan. Masing-masing program studi mempunyai ciri khas dalam menghasilkan tenaga kependidikan yang unggul, berkarakter kuat dan cerdas.'
			],
			[
				'gambar'	=> 'slider1.png',
				'prodi'		=> 'PTIK FKIP UNS',
				'judul'		=> 'Visi, Misi dan Tujuan',
				'link'		=> '',
				'isi'		=> '-::| VISI |::- "Menjadi pusat pendidikan, penelitian dan pelatihan yang unggul dan inovatif di tingkat internasional bidang pendidikan kejuruan teknik informatika dan komputer yang berlandaskan nilai-nilai luhur budaya nasional" -::|…'
			],
		];
		return $slider;
	}
}
