<?php

namespace App\Controllers;

use App\Models\Dokumen;
use App\Models\Bidang;

class Home extends BaseController
{
	protected $dokumen;
	protected $bidang;
	function __construct()
	{
		$this->dokumen = new Dokumen();
		$this->bidang = new Bidang();
	}
	public function index()
	{
		$result = $this->bidang->getBidang();
		dd($result);
	}
}
