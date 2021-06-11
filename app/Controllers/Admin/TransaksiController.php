<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Transaksi;
use App\Models\Dokumen;
use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
			$bts_pinjam = $tgl_pinjam->modify("+3 days")->format('Y-m-d');
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

	public function lapExcel()
	{
		$spreadsheet = new Spreadsheet;
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Peminjam');
		$sheet->setCellValue('C1', 'Judul Dokumen');
		$sheet->setCellValue('D1', 'Status');
		$sheet->setCellValue('E1', 'Tanggal Pinjam');
		$sheet->setCellValue('F1', 'Tanggal Kembali');
		$sheet->setCellValue('G1', 'Denda');


		$transaksi = $this->transaksi->getTransaksi();
		$no = 1;
		$x = 2;
		foreach ($transaksi as $val) :
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $val['username']);
			$sheet->setCellValue('C' . $x, $val['judul']);
			if ($val['status'] == 1) {
				$status = 'Menunggu Acc';
			} else if ($val['status'] == 2) {
				$status = 'Dipinjam';
			} else if ($val['status'] == 3) {
				$status = 'Dikembalikan';
			} else if ($val['status'] == 4) {
				$status = 'Selesai';
			}
			$sheet->setCellValue('D' . $x, $status);
			$sheet->setCellValue('E' . $x, $val['tanggal_pinjam']);
			$sheet->setCellValue('F' . $x, $val['tanggal_kembali']);
			$sheet->setCellValue('G' . $x, $val['denda']);
			$x++;
		endforeach;

		$writer = new xlsx($spreadsheet);
		$filename = 'laporan-data-transaksi';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
