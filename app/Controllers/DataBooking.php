<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BookingModel;
use App\Models\UserModel;
use App\Models\MassageModel;
use Config\Services;


class DataBooking extends ResourceController
{
    protected $booking;
    protected $user;
    protected $massage;
    protected $session;
    protected $request;
    protected $form_validation;
    protected $format    = 'json';

    public function __construct()
    {
        $this->booking = new BookingModel();
        $this->user = new UserModel();
        $this->user = new MassageModel();
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
            'nama' =>  $this->session->get('nama'),
            'email' =>  $this->session->get('email'),
            'title' => "BSpa | Data Booking",
            'booking' =>  $this->booking->getAllBookingData()
        ];
        return view('v_admin/databooking', $data);
    }

    public function cetak()
    {
        // Pass the data to the view
        $data['booking'] = $this->booking->getAllBookingData();
        
        //Cetak dengan dompdf
        $dompdf = new \Dompdf\Dompdf();
        $options = new \Dompdf\Options();
        $options->setIsRemoteEnabled(true);

        $dompdf->setOptions($options);
        $dompdf->output();
        $dompdf->loadHtml(view('v_admin/cetakbooking', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporanbooking.pdf', array("Attachment" => false));
    }
}
