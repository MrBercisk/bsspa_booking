<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
	protected $table = "booking";
	protected $allowedFields = ['id', 'user_id', 'massage_id', 'jenis_massage', 'harga', 'nomor_booking', 'nama', 'no_hp', 'tanggal_booking', 'status_booking', 'alamat', 'created_at', 'updated_at'];
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
	/* Admin */
	public function getAllBookingData()
	{
		return $this
		->join('user', 'user.id = booking.user_id')
		->join('massage_list', 'massage_list.id = booking.massage_id')
		->select('booking.*, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga')
		->findAll();
	}

	/* User */
	public function getBookingData()
	{
		return $this
			->join('user', 'user.id = booking.user_id')
			->join('massage_list', 'massage_list.id = booking.massage_id')
			->select('booking.*, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga')
			->join('transaksi', 'transaksi.booking_id = booking.id', 'left') 
			->where('transaksi.booking_id IS NULL', null, false)
			->findAll();
	}

	public function getByUserId($user_id)
	{
		return $this
		->join('massage_list', 'massage_list.id = booking.massage_id')
		->select('booking.*, massage_list.jenis_massage, massage_list.harga')
		->where('user_id', $user_id)->findAll();
	}
}
