<?php

namespace App\Controllers;

use App\Models\Dokumen;
use App\Models\Bidang;

class Home extends BaseController
{
	public function index()
	{
		if (in_groups('admin') || in_groups('superadmin')) {
			return redirect()->to('/Admin');
		} else if (in_groups('member')) {
			return redirect()->to('User');
		}

		return view('member/Home/Home');
	}
}
