<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table = "transaksi";
	protected $allowedFields = ['id', 'booking_id', 'terapis_id', 'total_bayar', 'tanggal_transaksi', 'status_transaksi', 'keterangan', 'diskon',  'created_at', 'updated_at'];
	protected $primaryKey = 'id';
	protected $column_search = [ 'booking_id', 'terapis_id', 'total_bayar', 'tanggal_transaksi', 'status_transaksi', 'keterangan','diskon'];
	protected $order = ['transaksi.id' => 'desc'];
	protected $useTimestamps = true;
	protected $request;
	protected $session;
	protected $db;
	protected $dt;

}
