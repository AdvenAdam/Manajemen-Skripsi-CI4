<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Transaksi;
use App\Models\Dokumen;
use DateTime;

class TransaksiController extends BaseController
{
	protected $transaksi, $dokumen;
	function __construct()
	{
		$this->transaksi = new Transaksi();
		$this->dokumen = new Dokumen();
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$this->cekDenda();
		$data = [
			'title' => 'Manajemen Transaksi',
			'transaksi'	=> $this->transaksi->getTransaksi(),
			'active' => 'transaksi',
		];
		return view('/Admin/transaksi/index', $data);
	}

	public function pinjam($id)
	{
		// pengecekan maksimal trx user di tbl transaksi
		$jumlah_trx = $this->transaksi->cekJmlTrx(user()->id);
		if ($jumlah_trx < 2) {
			//mengubah status di dokumen menjadi diproses
			$this->dokumen->save([
				'id' => $id,
				'status_peminjaman' => 'diproses',
			]);

			$this->transaksi->save([
				'id_dokumen'		=> $id,
				'id_user'			=> user()->id,
				'status'			=> '1'

			]);

			session()->setFlashdata('success', 'Peminjaman Berhasil Diproses, Silahkan Hubungi Admin Untuk Validasi Peminjaman');
		} else {
			session()->setFlashdata('danger', 'Anda Tidak Boleh Meminjam Dokumen Lebih Dari 2');
			return redirect()->to('/');
		}
		return redirect()->to('/Admin/Dokumen');
	}

	// bagian inii cek lagi logikanya menghindari load data tdk efektif

	//id adalah id transaksi
	public function AccPinjam($id)
	{
		$dataTrx = $this->transaksi->find($id);
		$this->transaksi->save([
			'id' 			 => $id,
			'tanggal_pinjam' => date('Y-m-d'),
			'status'		 => 2
		]);
		$this->dokumen->save([
			'id' 				=> $dataTrx['id_dokumen'],
			'status_peminjaman' => 'tidak tersedia'
		]);
		return redirect()->to('/Admin/Transaksi');
	}
	//id adalah id transaksi
	public function kembali($id)
	{
		$dataTrx = $this->transaksi->find($id);
		$this->transaksi->save([
			'id' 			 => $id,
			'status'		 => 3
		]);
		$this->dokumen->save([
			'id' 				=> $dataTrx['id_dokumen'],
			'status_peminjaman' => 'diproses'
		]);
		//tempat return2nya wkwkw
	}
	//id adalah id transaksi
	public function AccKembali($id)
	{
		$dataTrx = $this->transaksi->find($id);
		$this->dokumen->save([
			'id' 				=> $dataTrx['id_dokumen'],
			'status_peminjaman' => 'tersedia',
		]);
		$this->transaksi->save([
			'id' 			 	=> $id,
			'tanggal_kembali' 	=> date('Y-m-d'),
			'denda'				=> $this->cekDenda($id),
			'status'			=> 4
		]);
		return redirect()->to('/Admin/Transaksi');
		//tempat return2nya wkwkw
	}
	public function cekDenda($id = false)
	{
		$data = $this->transaksi->getTransaksi($id);
		$denda_perhari = 5000;
		foreach ($data as $list) {
			$tgl_pinjam = new DateTime($list['tanggal_pinjam']);
			$bts_pinjam = $tgl_pinjam->modify("+5 days")->format('Y-m-d');
			$bts_pinjam = strtotime($bts_pinjam);
			$tgl_kembali = strtotime($list['tanggal_kembali']);

			if ($list['tanggal_pinjam'] != null && $list['tanggal_kembali'] != null && $list['status'] != 4) {
				$beda = $tgl_kembali - $bts_pinjam;
				$beda = round($beda / (60 * 60 * 24));
				$denda = 0;
				if ($beda > 0) {
					$denda = $denda_perhari * $beda;
					$this->transaksi->save([
						'id' => $list['id_trx'],
						'denda' => $denda
					]);
				}
			}
		}
	}

	public function cekDendaUser()
	{
		$id	 = user()->id;
		$data = $this->transaksi->cekDendaPerUser($id);
		$denda_perhari  = 5000;
		foreach ($data as $list) {
			$tgl_pinjam = new DateTime($list['tanggal_pinjam']);
			$bts_pinjam = $tgl_pinjam->modify("+5 days")->format('Y-m-d');
			$bts_pinjam = strtotime($bts_pinjam);
			$tgl_kembali = strtotime($list['tanggal_kembali']);

			$beda = $tgl_kembali - $bts_pinjam;
			$beda = round($beda / (60 * 60 * 24));
			$denda = 0;
			if ($beda > 0) {
				$denda = $denda_perhari * $beda;
				$this->transaksi->save([
					'id' => $list['id_trx'],
					'denda' => $denda
				]);
			}
		}
	}

	public function deleteBatch()
	{
		$hapus = $this->transaksi->deleteBatch();
		if ($hapus) {
			return redirect()->to('/Admin/Transaksi');
		}
	}
}
