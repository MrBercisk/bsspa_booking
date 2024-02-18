<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use \Firebase\JWT\JWT;
use CodeIgniter\Email\Email;
use CodeIgniter\Config\Services;

class ForgotPassword extends ResourceController
{
    protected $encrypter;
    protected $form_validation;
    protected $user;
    protected $session;


    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->form_validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->user = new UserModel();
    }

    public function index()
    {
        $data['title'] = "BSpa | Login";
        return view('v_login/forgot_password', $data);
    }

    public function create()
    {
        $email = $this->request->getVar('email');
        // Ambil data pengguna dari database berdasarkan email
        $user = $this->user->getUserByEmail($email);
    
        if (!$user) {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message'=> 'User Tidak Ada..!']));
            return redirect()->to(base_url('ForgotPassword'));
        }
    
        $token = bin2hex(random_bytes(32));
        $this->user->update($user['id'], ['token' => $token]);
    
        $email = Services::email();
        $email->setTo($user['email']);
        $email->setFrom('noreply@tm.bsdev@mail.com', 'BSDev');
        $email->setSubject('Reset Password - BSpa Massage');
    
        // Buat pesan email dengan format HTML
        $emailMessage = '<p>Kami menerima permintaan untuk mereset password akun Anda.</p>';
        $emailMessage .= '<p>Silakan klik tombol di bawah ini untuk melanjutkan proses reset password:</p>';
        $emailMessage .= '<a href="' . base_url() . '/forgotPassword/resetPassword/' . $token . '" style="background-color: #1E88E5; color: #FFFFFF; display: inline-block; font-size: 14px; line-height: 36px; text-align: center; text-decoration: none; width: 200px; border-radius: 18px; -webkit-border-radius: 18px; -moz-border-radius: 18px;">Reset Password</a>';
        $emailMessage .= '<p>Jika Anda tidak melakukan permintaan ini, silakan abaikan email ini.</p>';
        $emailMessage .= '<p>Terima kasih,</p><p>BSDev</p>';
    
        // Set pesan email
        $email->setMessage($emailMessage);
    
        // Kirim email
        if ($email->send()) {
            $this->session->setFlashdata('sweet_alert', json_encode(['success' => true, 'message'=> 'Email terkirim. Silakan periksa email Anda untuk instruksi selanjutnya.']));
            return redirect()->to(base_url('login'));
        } else {
            $this->session->setFlashdata('sweet_alert', json_encode(['error' => true, 'message'=> 'Gagal Mengirim Email..!']));
            return redirect()->to(base_url('ForgotPassword'));
        }
    }
    public function resetPassword($token)
    {

        $data['title'] = 'Reset Password';
        $data['token'] = $token;

        $user = $this->user->getUserByToken($token);
        if (!$user) {
            http_response_code(404);
            echo "<div class=\"error-container\">
                      <h2 class=\"error-heading\">Maaf, Token Telah Expired</h2>
                      <p class=\"error-message\">Kami mohon maaf atas ketidaknyamanan yang terjadi. Permintaan Anda tidak dapat kami proses karena token sudah expired atau sudah digunakan. Silahkan untuk melakukan request reset password kembali!</p>
                      <div style=\"width: 400px; height: 400px;\" id=\"lottie-player\"></div>
                  </div>
                  <style>
                  .error-container {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                    padding: 1rem;
                    text-align: center;
                    background-color: #f2f2f2;
                  }
                  
                  .error-heading {
                    font-size: 3rem;
                    margin-bottom: 1rem;
                    font-family: 'Montserrat', sans-serif;
                    color: #333333;
                  }
                  
                  .error-message {
                    font-size: 1.5rem;
                    margin-bottom: 2rem;
                    font-family: 'Montserrat', sans-serif;
                    color: #555555;
                  }
            
                  
                  </style>
                  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.9/lottie.min.js\"></script>
                  <script>
                    var animation = bodymovin.loadAnimation({
                        container: document.getElementById('lottie-player'),
                        renderer: 'svg',
                        loop: true,
                        autoplay: true,
                        path: 'https://assets2.lottiefiles.com/packages/lf20_ttvteyvs.json'
                    });
                  </script>";
            exit;
        }

        $this->user->resetPassword($user['token'], base64_encode($this->encrypter->encrypt($this->request->getPost('password'))));
        session()->setFlashdata('message', 'Password telah berhasil direset');
        return redirect()->to(base_url('login'))->with('success', 'Password telah berhasil direset. Silakan masuk dengan password baru Anda.');
        return view('v_login/reset_password', $data);
    }
}
