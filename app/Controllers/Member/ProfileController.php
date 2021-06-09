<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class ProfileController extends BaseController
{
	protected $user, $usr;
	protected $db, $builder;
	function __construct()
	{
		$this->user   = new User;
		$this->usr    = new UserModel();
		$this->db		= \Config\Database::connect();
		$this->builder = $this->db->table('users');
	}
	public function index()
	{
		$this->builder->select('users.id as userid, username, email, name, active, user_image');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$this->builder->where('users.id=', user()->id);
		$query	 = $this->builder->get();
		$data = [
			'title'	=> 'Edit Profile',
			'active' => 'user',
			'user' => $query->getResultArray(),
			'validation' =>  \Config\Services::validation()
		];
		// dd($data);
		return view('/user/profile/profile', $data);
	}

	public function validationRule()
	{
		return [
			'username' => [
				'rules' => 'required',
			],
			'email' => [
				'rules' => 'required',
			],
			'user_image' => [
				'rules' => 'is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]|max_size[user_image,2048]',
				'errors' => [
					'is_image' => 'File yang diupload bukan file gambar',
					'max_size' => 'File yang anda pilih terlalu besar (maks 2MB)',
					'is_mime'  => 'File yang diupload bukan file gambar',
				]
			],
		];
	}

	public function update($id)
	{
		if (!$this->validate($this->validationRule())) {
			return redirect()->to('/Profile')->withInput();
		} else {
			$dataLama = user()->user_image;
			$fileFoto = $this->request->getFile('user_image');
			if ($fileFoto->getError() == 4) {
				$namaFoto = $dataLama;
			} else {
				$namaFoto = $fileFoto->getRandomName();
				$fileFoto->move('image/foto', $namaFoto);
				if ($dataLama != 'default.jpg') {
					unlink('image/foto/' . $dataLama);
				}
			}
			// dd($dataLama);
			$data = [
				'id'		=> $id,
				'username'  => $this->request->getVar('username'),
				'email'     => $this->request->getVar('email'),
				'user_image'      => $namaFoto
			];
			// dd($data);
			$this->usr->save($data);
			return redirect()->to('/Profile');
		}
	}
}
