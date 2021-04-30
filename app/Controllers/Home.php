<?php

namespace App\Controllers;

use App\Models\Dokumen;
use App\Models\Bidang;

class Home extends BaseController
{
	public function index()
	{
		return view('/admin/layout/content');
	}
}
