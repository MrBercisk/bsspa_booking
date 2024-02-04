<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = "user";
	protected $allowedFields = ['id','nama', 'email', 'password', 'role_id', 'status','jenis_kelamin','created_at'];
	protected $primaryKey = 'id';
	protected $column_search = ['nama', 'email', 'created_at'];
	protected $column_order = [null, 'nama', 'email', 'status', 'created_at', null];
	protected $order = ['user.id' => 'desc'];
	protected $useTimestamps = true;
	protected $request;
	protected $session;
	protected $db;
	protected $dt;


}
