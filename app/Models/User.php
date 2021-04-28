<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $table                = 'tbl_dokumen';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'nama', 'no_hp', 'alamat', 'email', 'password', 'foto', 'status'
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
