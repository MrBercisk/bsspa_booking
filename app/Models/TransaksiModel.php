<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table = "transaksi";
	protected $allowedFields = ['id', 'booking_id', 'terapis_id', 'total_bayar', 'tanggal_transaksi', 'status_transaksi', 'keterangan', 'diskon',  'created_at', 'updated_at'];
	protected $primaryKey = 'id';
	protected $column_search = ['booking_id', 'terapis_id', 'total_bayar', 'tanggal_transaksi', 'status_transaksi', 'keterangan', 'diskon'];
	protected $order = ['transaksi.id' => 'desc'];
	protected $useTimestamps = true;
	protected $request;
	protected $session;
	protected $db;
	protected $dt;


	public function getTransaksiData()
	{
		return $this
			->join('booking', 'booking.id = transaksi.booking_id')
			->join('user', 'user.id = booking.user_id')
			->join('massage_list', 'massage_list.id = booking.massage_id')
			->join('terapis', 'terapis.id = transaksi.terapis_id')
			->select('transaksi.*, booking.nomor_booking, booking.tanggal_booking, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga, terapis.nama_terapis, terapis.no_hp')
			->where('status_booking', 'Selesai')
			->findAll();
	}

	/* Mengambil data transaksi berdasarkan transaksi ID */
	public function getTransaksiId($id)
	{
		return $this
			->join('booking', 'booking.id = transaksi.booking_id')
			->join('user', 'user.id = booking.user_id')
			->join('massage_list', 'massage_list.id = booking.massage_id')
			->join('terapis', 'terapis.id = transaksi.terapis_id')
			->select('transaksi.*, booking.nomor_booking, booking.tanggal_booking, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga,massage_list.diskon, terapis.nama_terapis, terapis.no_hp')
			->where('status_booking', 'Selesai')
			->where('transaksi.id', $id)
			->first();
	}
	public function getTransaksiIdProses($id)
	{
		return $this
			->join('booking', 'booking.id = transaksi.booking_id')
			->join('user', 'user.id = booking.user_id')
			->join('massage_list', 'massage_list.id = booking.massage_id')
			->join('terapis', 'terapis.id = transaksi.terapis_id')
			->select('transaksi.*, booking.nomor_booking, booking.tanggal_booking, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga,massage_list.diskon, terapis.nama_terapis, terapis.no_hp')
			->where('transaksi.id', $id)
			->first();
	}

	/* Mengambil data berdasarkan booking id */

	public function getByBookingId($id)
	{
		return $this
			->join('booking', 'booking.id = transaksi.booking_id')
			->join('user', 'user.id = booking.user_id')
			->join('massage_list', 'massage_list.id = booking.massage_id')
			->join('terapis', 'terapis.id = transaksi.terapis_id')
			->select('transaksi.*, booking.nomor_booking, booking.tanggal_booking, user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga, terapis.nama_terapis, terapis.no_hp')
			->where('status_booking', 'Selesai')
			->where('booking.id', $id)
			->findAll();
	}

	public function getByUserId($user_id)
	{
		return $this
			->join('booking', 'booking.id = transaksi.booking_id')
			->join('user', 'user.id = booking.user_id')
			->join('massage_list', 'massage_list.id = booking.massage_id')
			->join('terapis', 'terapis.id = transaksi.terapis_id')
			->select('transaksi.*,booking.status_booking, booking.nomor_booking, booking.tanggal_booking,  user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga, terapis.nama_terapis, terapis.no_hp')
			->where('user.id', $user_id)
			->findAll();
	}

	public function getTransaksiBaru($user_id)
	{
		return $this
			->join('booking', 'booking.id = transaksi.booking_id')
			->join('user', 'user.id = booking.user_id')
			->join('massage_list', 'massage_list.id = booking.massage_id')
			->join('terapis', 'terapis.id = transaksi.terapis_id')
			->select('transaksi.*,booking.status_booking, booking.nomor_booking, booking.tanggal_booking,  user.nama, user.jenis_kelamin, massage_list.jenis_massage, massage_list.harga, terapis.nama_terapis, terapis.no_hp')
			->where('user.id', $user_id)
			->where('status_transaksi', 'Pending')
			->countAllResults('transaksi');
	}
}
