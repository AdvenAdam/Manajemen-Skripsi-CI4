<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'email', 'username', 'user_image', 'active'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'date';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function getAllUser()
	{
		return $this->findAll();
	}
}
