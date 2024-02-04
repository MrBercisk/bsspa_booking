<?php

namespace App\Models;

use CodeIgniter\Model;

class TerapisModel extends Model
{
	protected $table = "terapis";
	protected $allowedFields = ['id', 'nama_terapis', 'jenis_kelamin', 'tempat_lahir','tanggal_lahir','status_pernikahan','alamat','no_hp','created_at','updated_at'];
	protected $primaryKey = 'id';
	protected $order = ['terapis.id' => 'desc'];
	protected $useTimestamps = true;
	protected $request;
	protected $session;
	protected $db;
	protected $dt;

}
