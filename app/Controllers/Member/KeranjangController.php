<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Controllers\Checker;
use App\Models\Transaksi;
use DateTime;

class KeranjangController extends BaseController
{
	protected $trx, $cekDenda;

	function __construct()
	{
		$this->trx = new Transaksi();
		$this->cekDenda = new Checker();
	}
	public function index()
	{
		$this->cekDenda->cekDendaUser();
		$user = user()->id;
		$data = [
			'title' 	=> 'Keranjang',
			'transaksi' => $this->trx->getDataKeranjang($user)
		];

		return view('user/keranjang/index', $data);
	}
}
