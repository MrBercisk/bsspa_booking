<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = "user";
	protected $allowedFields = ['id','nama', 'email', 'password', 'role_id', 'status','jenis_kelamin','created_at','token', 'reset_token_created_at'];
	protected $primaryKey = 'id';
	protected $column_search = ['nama', 'email', 'created_at'];
	protected $column_order = [null, 'nama', 'email', 'status', 'created_at', null];
	protected $order = ['user.id' => 'desc'];
	protected $useTimestamps = true;
	protected $request;
	protected $session;
	protected $db;
	protected $dt;

	public function getByUserId($user_id)
	{
		return $this
		->join('user_role', 'user_role.id = user.role_id')
		->select('user.*, user_role.role')
		->where('user.id', $user_id)
		->findAll();
	}

	public function getUserByEmail($email)
	{
		return $this->where('email', $email)->first();
	}
	public function getUserByToken($token)
	{
		return $this->where('token', $token)->first();
	}
	public function resetPassword($token, $password)
	{

		$this->set('password', $password);
		$this->where('token', $token);
		$this->update();

		$this->set('token', NULL);
		$this->where('token', $token);
		$this->update();
	}
}
