<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BookingModel;
use App\Models\UserModel;
use App\Models\MassageModel;
use App\Models\TerapisModel;
use App\Models\TransaksiModel;
use Config\Services;


class Laporan extends ResourceController
{
    use ResponseTrait;
    protected $booking;
    protected $user;
    protected $massage;
    protected $transaksi;
    protected $terapis;
    protected $session;
    protected $request;
    protected $form_validation;
    protected $format    = 'json';

    public function __construct()
    {
        $this->booking = new BookingModel();
        $this->user = new UserModel();
        $this->massage = new MassageModel();
        $this->transaksi = new TransaksiModel();
        $this->terapis = new TerapisModel();
        $this->session = \Config\Services::session();
        $this->request = Services::request();
        $this->form_validation =  \Config\Services::validation();
    }

    public function index()
    {
        // Cek apakah session 'nama' dan 'email' sudah ada
        if (!$this->session->has('nama') || !$this->session->has('email')) {
            // Jika tidak ada, mungkin arahkan ke halaman login atau lakukan tindakan lain
            return redirect()->to(base_url('login'));
        }

        $data = [
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'massage_list' => $this->massage->findAll(),
            'transaksi' => $this->transaksi->getTransaksiData(),
            'booking' => $this->booking->getBookingData(),
            'title' => "BSpa | Transaksi",
        ];

        return view('v_admin/historytransaksi', $data);
    }

    public function show($id = null)
    {
        // Cek apakah session 'nama' dan 'email' sudah ada
        if (!$this->session->has('nama') || !$this->session->has('email')) {
            // Jika tidak ada, mungkin arahkan ke halaman login atau lakukan tindakan lain
            return redirect()->to(base_url('login'));
        }
        $data = [
            'nama' =>  $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'transaksi' => $this->transaksi->getTransaksiId($id),
            'terapis' => $this->terapis->findAll(),
            'title' => "BSpa | Proses Transaksi"
        ];

        $confirm = $this->booking->find($id);

        $data['konfirmasi'] = $confirm;
        if ($confirm) {
            $massage_id = $confirm['massage_id'];
            $booking_id = $confirm['id'];

            // Mengambil data massage berdasarkan massage_id dari data booking
            $massage = $this->massage->where('id', $massage_id)->first();
            $booking = $this->booking->where('id', $booking_id)->first();

            // Memasukkan data ke dalam array $data
            $data['konfirmasi']    = $confirm;
            $data['jenis_massage']  = $massage['jenis_massage'];
            $data['harga']          = $massage['harga'];
            $data['id']          = $booking['id'];
            $diskon     = $massage['diskon'];
            $diskon_persen = $diskon * 100 / 100;
            $data['diskon'] = number_format($diskon_persen) . '%';
        } else {
            // Handle jika data booking tidak ditemukan untuk user_id tertentu
            $data['konfirmasi']    = null;
            $data['jenis_massage']  = null;
            $data['harga']          = null;
            $data['diskon']          = null;
        }

        // Mengembalikan data dalam format JSON
        return view('v_admin/edittransaksi', $data);
    }

    public function create()
    {

        $tanggal_transaksi = $this->request->getVar('tanggal_transaksi');
        $keterangan = $this->request->getVar('keterangan');
        $booking = $this->request->getVar('booking_id');
        $terapis = $this->request->getVar('terapis_id');
        $total_bayar = $this->request->getVar('total_bayar');

        $data = [
            'tanggal_transaksi' => $tanggal_transaksi,
            'keterangan' => $keterangan,
            'booking_id' => $booking,
            'terapis_id' => $terapis,
            'total_bayar' => $total_bayar,
            'status_transaksi' => 'Pending',
        ];
        /*  dd($data); */

        $transaksi = $this->transaksi->insert($data);

        if ($transaksi) {
            // Data berhasil ditambahkan
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Tambah Data berhasil!']));

            // Redirect ke halaman login
            return redirect()->to(base_url('transaksi'));
        } else {
            // Gagal menambahkan data
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message' => 'Gagal tambah data']));
        }
    }
    public function update($id = null)
    {
        $transaksi = $this->transaksi->find($id);

        if ($transaksi) {

            // Mengambil data dari request
            $data = [
                'id' => $id,
                'status_transaksi' => $this->request->getVar('status_transaksi'),
            ];

            // Melakukan update data
            $transaksi = $this->transaksi->save($data);

            if ($transaksi) {
                // Data berhasil ditambahkan
                $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message' => 'Update data berhasil!']));

                // Redirect ke halaman login
                return redirect()->to(base_url('laporan'));
            }

            return $this->fail('Sorry! not updated');
        }

        return $this->failNotFound('Sorry! no user found');
    }
    public function cetak()
    {
        // Pass the data to the view
        $data['transaksi'] = $this->transaksi->getTransaksiData();
        
        //Cetak dengan dompdf
        $dompdf = new \Dompdf\Dompdf();
        $options = new \Dompdf\Options();
        $options->setIsRemoteEnabled(true);

        $dompdf->setOptions($options);
        $dompdf->output();
        $dompdf->loadHtml(view('v_admin/cetaktransaksi', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporantransaksi.pdf', array("Attachment" => false));
    }
}
