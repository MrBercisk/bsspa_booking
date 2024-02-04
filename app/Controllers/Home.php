<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Panggil function untuk menambah jumlah pengunjung
        /* $this->addVisitor(); */

        $data['title'] = "BSpa Massage";
        // Ambil jumlah pengunjung dari function
       /*  $data['visitorCount'] = $this->getVisitorCount(); */

        return view('home/index', $data);
    }

    // Function untuk menambah jumlah pengunjung
    private function addVisitor()
    {
        // Ambil path ke file penyimpanan jumlah pengunjung
        $file = WRITEPATH . 'logs/visitor_count.txt';

        if (!file_exists($file)) {
            // Jika file belum ada, buat file dan set jumlah pengunjung ke 1
            file_put_contents($file, '1');
        } else {
            // Jika file sudah ada, baca jumlah pengunjung, tambahkan 1, dan simpan kembali
            $visitorCount = (int) file_get_contents($file);
            $visitorCount++;
            file_put_contents($file, (string) $visitorCount);
        }
    }

    // Function untuk mendapatkan jumlah pengunjung
    private function getVisitorCount()
    {
        // Ambil path ke file penyimpanan jumlah pengunjung
        $file = WRITEPATH . 'logs/visitor_count.txt';

        if (file_exists($file)) {
            // Jika file ada, baca dan kembalikan jumlah pengunjung
            return (int) file_get_contents($file);
        }

        // Jika file tidak ada, kembalikan 0
        return 0;
    }
    
}
