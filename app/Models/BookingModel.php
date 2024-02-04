<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
	protected $table = "booking";
	protected $allowedFields = ['id', 'user_id', 'massage_id', 'jenis_massage', 'harga', 'nomor_booking', 'nama', 'no_hp', 'tanggal_booking','status_booking', 'alamat', 'created_at', 'updated_at'];
	protected $primaryKey = 'id';
	protected $column_search = ['id', 'user_id', 'no_hp', 'tanggal', 'alamat'];
	protected $order = ['booking.id' => 'desc'];
	protected $useTimestamps = true;
	protected $request;
	protected $session;
	protected $db;
	protected $dt;

	public function isTanggalAvailable($tanggal_booking)
	{
		// Cek apakah tanggal booking sudah ada di database
		$count = $this->where('tanggal_booking', $tanggal_booking)->countAllResults();

		return $count === 0;
	}
}
