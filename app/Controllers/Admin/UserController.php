<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class UserController extends BaseController
{
	protected $user;
	protected $db, $builder;
	function __construct()
	{
		$this->user   = new User;
		$this->db		= \Config\Database::connect();
		$this->builder = $this->db->table('users');
	}
	public function index()
	{
		$this->builder->select('users.id as userid, username, email, name, active, ');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$this->builder->where('name!=', 'superadmin')->orderBy('userid', 'ASC');
		$query	 = $this->builder->get();
		$data = [
			'title'	=> 'User Manajemen',
			'active' => 'user',
			'users' => $query->getResult(),
		];
		return view('/admin/usermanage/index', $data);
	}

	public function detail($id = 0)
	{
		$this->builder->select('users.id as userid, username, email, name, active, user_image, created_at');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$this->builder->where('users.id', $id);
		$query	 = $this->builder->get();
		$data = [
			'title'	=> 'User Manajemen',
			'active' => 'user',
			'users' => $query->getRow(),
		];
		if (empty($data['users'])) {
			return view('/admin/dashboard', $data);
		}

		return view('/admin/usermanage/detail', $data);
	}

	public function active($id)
	{
		$builder = $this->db->table('auth_groups_users');
		$builder->where('user_id', $id);
		$builder->update([
			'group_id' => 2,
		]);
		return redirect()->to('/Admin/UserManage');
	}
	public function deactive($id)
	{
		$builder = $this->db->table('auth_groups_users');
		$builder->where('user_id', $id);
		$builder->update([
			'group_id' => 1,
		]);
		return redirect()->to('/Admin/UserManage');
	}
}
