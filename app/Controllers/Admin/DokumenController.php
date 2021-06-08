<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Bidang;
use App\Models\Jenispenelitian;
use App\Models\Kategoridokumen;
use App\Models\Dokumen;
use CodeIgniter\HTTP\Request;

class DokumenController extends BaseController
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
		$jenis = $this->request->getVar('jenis_penelitian');
		$jurusan = $this->request->getVar('jurusan');
		$kategori = $this->request->getVar('kategori_dokumen');
		$data = [
			'bidang' => $this->bidang->findAll(),
			'jenis' => $this->jenis->findAll(),
			'kategori' => $this->kategori->findAll(),
			'title'		=> 'Manajemen Dokumen',
			'active'	=> 'dokumen',

		];

		if (empty($jurusan) && empty($jenis) && empty($kategori)) {
			$data['dokumen'] = $this->dokumen->getDokumen();
		} else {
			$data['dokumen'] = $this->dokumen->getDokumenByFilter($kategori, $jenis, $jurusan);
		}

		return view('/admin/dokumen/index', $data);
	}
	public function create()
	{
		$data = [
			'bidang' => $this->bidang->findAll(),
			'jenis' => $this->jenis->findAll(),
			'kategori' => $this->kategori->findAll(),
			'validation' =>  \Config\Services::validation(),
		];

		return view('/admin/dokumen/input', $data);
	}
	public function edit($id)
	{
		$data = [
			'bidang' => $this->bidang->findAll(),
			'jenis' => $this->jenis->findAll(),
			'kategori' => $this->kategori->findAll(),
			'dokumen'  => $this->dokumen->getDokumen($id),
			'validation' =>  \Config\Services::validation(),
		];
		return view('/admin/dokumen/edit', $data);
	}
	public function setFilename()
	{
		$judul = $this->request->getVar('judul');
		$waktu = date("d-m-Y");
		$penulis = $this->request->getVar('penulis');
		$filename = $waktu . '_' . $penulis . '_' . $judul;
		return $filename;
	}
	public function validationRule()
	{
		return [
			'penulis' => [
				'rules' => 'required',
			],
			'tahun' => [
				'rules' => 'required',
			],
			'pembimbing' => [
				'rules' => 'required',
			],
			'judul' => [
				'rules' => 'required',
			],
			'pendahuluan' => [
				'rules' => 'required',
			],
			'kategori_dokumen' => [
				'rules' => 'required',
				'label'	=> 'Kategori Dokumen'
			],
			'dokumen' => [
				'rules' => 'mime_in[dokumen,application/pdf]|ext_in[dokumen,pdf]',
				'errors' => [
					'mime_in' => 'File yang diupload bukan file PDF',
					'ext_in'  => 'File yang diupload harus berformat PDF',
				]
			],
		];
	}
	public function save()
	{
		if (!$this->validate($this->validationRule())) {
			return redirect()->to('/Admin/Dokumen/create')->withInput();
		}
		$fileDokumen = $this->request->getFile('dokumen');
		$id_kategori = $this->request->getVar('kategori_dokumen');
		// menentukan nama folder tempat file yg di upload berdasarkan kategori
		$kategori    = $this->kategori->getKategoriById($id_kategori);
		// $namaDokumen = $fileDokumen->getRandomName();
		$namaDokumen = $this->setFilename() . '.' . $fileDokumen->getClientExtension();
		$fileDokumen->move('dokumen/' . $kategori['kategori_dokumen'], $namaDokumen);
		$data = [

			'penulis'				=> $this->request->getVar('penulis'),
			'tahun'					=> $this->request->getVar('tahun'),
			'pembimbing'			=> $this->request->getVar('pembimbing'),
			'judul'					=> $this->request->getVar('judul'),
			'pendahuluan'			=> $this->request->getVar('pendahuluan'),
			'status_peminjaman'		=> 'tersedia',
			'id_bidang'				=> $this->request->getVar('bidang'),
			'id_kategori_dokumen'	=> $id_kategori,
			'id_jenis_penelitian'	=> $this->request->getVar('jenis_penelitian'),
			'dokumen'				=> $namaDokumen
		];
		$this->dokumen->save($data);
		return redirect()->to('/Admin/Dokumen');
	}
	public function update($id)
	{
		// melakukan validasi
		if (!$this->validate($this->validationRule())) {
			return redirect()->to('/Admin/Dokumen/edit/' . $id)->withInput();
		}
		// mndapatkan data file lama berdasarkan id
		$dataLama = $this->dokumen->getDokumen($id);
		$namaDokumenLama = $dataLama['dokumen'];
		$DokumenLama = ('dokumen/' . $dataLama['kategori_dokumen'] . '/' . $namaDokumenLama);
		$lokasi = (ROOTPATH . 'dokumen/' . $dataLama['kategori_dokumen'] . '/' . $namaDokumenLama);
		$extension = pathinfo($lokasi, PATHINFO_EXTENSION);

		// mendapatkan file dari input type file 
		$fileDokumen = $this->request->getFile('dokumen');


		// mendapatkan kategori berdasarkan id_kategori yang dinputka di field
		$id_kategori = $this->request->getVar('kategori_dokumen');
		$kategori    = $this->kategori->getKategoriById($id_kategori);

		// jika tidak ada file diupload dan kategori tidak diubah
		if ($fileDokumen->getError() == 4 && $dataLama['id_kategori_dokumen'] == $id_kategori) {
			$namaDokumen = 'dokumen/' . $kategori['kategori_dokumen'] . '/' . $this->setFilename() . '.' . $extension;
			rename($DokumenLama, $namaDokumen);
			$namaDokumen = $this->setFilename() . '.' . $extension;
			// jika tidak ada file di upload dan kategori masih sama
		} else if ($fileDokumen->getError() == 4 && $dataLama['id_kategori_dokumen'] != $id_kategori) {
			$namaDokumen = $this->setFilename() . '.' . $extension;
			rename($DokumenLama, 'dokumen/' . $kategori['kategori_dokumen'] . '/' .  $namaDokumen);
			$namaDokumen = $this->setFilename() . '.' . $extension;
			// jika upload file
		} else if ($fileDokumen->getError() != 4) {
			//membuat nama baru file upload
			$namaDokumen = $this->setFilename() . '.' . $fileDokumen->getClientExtension();
			if (file_exists($DokumenLama)) {
				unlink($DokumenLama);
			}
			$fileDokumen->move('dokumen/' . $kategori['kategori_dokumen'], $namaDokumen);
		}

		$data = [
			'id'					=> $id,
			'penulis'				=> $this->request->getVar('penulis'),
			'tahun'					=> $this->request->getVar('tahun'),
			'pembimbing'			=> $this->request->getVar('pembimbing'),
			'judul'					=> $this->request->getVar('judul'),
			'pendahuluan'			=> $this->request->getVar('pendahuluan'),
			'status_peminjaman'		=> 'tersedia',
			'id_bidang'				=> $this->request->getVar('bidang'),
			'id_kategori_dokumen'	=> $id_kategori,
			'id_jenis_penelitian'	=> $this->request->getVar('jenis_penelitian'),
			'dokumen'				=> $namaDokumen
		];
		$this->dokumen->save($data);
		return redirect()->to('/Admin/Dokumen');
	}
	public function detail($id)
	{
		$data = [
			'dokumen'	=> $this->dokumen->getDokumen($id),
		];
		return view('/admin/dokumen/detail', $data);
	}
	public function delete($id)
	{
		$dokumen = $this->dokumen->getDokumen($id);
		$lokasi  = ('dokumen/' . $dokumen['kategori_dokumen'] . '/' . $dokumen['dokumen']);
		if (file_exists($lokasi)) {
			unlink($lokasi);
		}

		$this->dokumen->delete($dokumen['id']);
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/Admin/Dokumen');
	}
}
