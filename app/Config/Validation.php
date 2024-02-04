<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    /* Validasi daftar akun */

    public $daftar = [
        'nama' => [
            'label'  => 'Nama Lengkap',
            'rules'  => 'required|is_unique[user.nama]',
            'errors' => [
                'required' => 'Nama Lengkap Tidak Boleh Kosong!',
                'is_unique' => 'Nama Sudah Terdaftar!'
            ]
        ],
        'email' => [
            'label'  => 'Email',
            'rules'  => 'required|valid_email|is_unique[user.email]',
            'errors' => [
                'required' => 'Email Tidak Boleh Kosong!',
                'valid_email' => 'Email Tidak Valid!',
                'is_unique' => 'Email Sudah Terdaftar!'
            ]
        ],
        'jenis_kelamin' => [
            'label'  => 'Jenis Kelamin',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Jenis Kelamin Tidak Boleh Kosong!'
            ]
        ],
        'password' => [
            'label'  => 'Password',
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password Tidak Boleh Kosong!',
                'min_length' => 'Password Minimal 8 Karakter!'
            ]
        ],
        'confirm_password' => [
            'label'  => 'Confirm Password',
            'rules'  => 'required|min_length[8]|matches[password]',
            'errors' => [
                'required' => 'Confirm Password Tidak Boleh Kosong!',
                'min_length' => 'Confirm Password Minimal 8 Karakter!',
                'matches' => 'Confirm Password Tidak Sama Dengan Password!',
            ]
        ]
    ];

    public $updatePassword  = [
        'password_lama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Password saat ini harus diisi.'
            ],
        ],
        'password_baru' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'Password baru harus diisi.',
                'min_length' => 'Password baru minimal harus memiliki panjang 6 karakter.'
            ],
        ],
        'confirm_password' => [
            'rules' => 'required|matches[password_baru]',
            'errors' => [
                'required' => 'Konfirmasi password harus diisi.',
                'matches' => 'Konfirmasi password tidak sesuai dengan password baru.'
            ],
        ],
    ];

    //Validasi Login
    public $login = [
        'email' => [
            'label'  => 'Email',
            'rules'  => 'required|valid_email',
            'errors' => [
                'required' => 'Email Tidak Boleh Kosong!',
                'valid_email' => 'Email Tidak Valid!'
            ]
        ],
        'password' => [
            'label'  => 'Password',
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password Tidak Boleh Kosong!',
                'min_length' => 'Password Minimal 8 Karakter!'
            ]
        ],

    ];

    public $terapis = [
        'nama_terapis' => [
            'label'  => 'Nama Lengkap',
            'rules'  => 'required|is_unique[terapis.nama_terapis]',
            'errors' => [
                'required' => 'Nama Terapis Tidak Boleh Kosong!',
                'is_unique' => 'Nama Terapis Sudah Terdaftar!'
            ]
        ],
        'jenis_kelamin' => [
            'label'  => 'Jenis Kelamin',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Jenis Kelamin Tidak Boleh Kosong!'
            ]
        ],
        'tempat_lahir' => [
            'label'  => 'Tempat Lahir',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tempat Lahir Tidak Boleh Kosong!'
            ]
        ],
        'tanggal_lahir' => [
            'label'  => 'Tanggal Lahir',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tanggal Lahir Tidak Boleh Kosong!'
            ]
        ],
        'status_pernikahan' => [
            'label'  => 'Status Pernikahan',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Status Pernikahan Tidak Boleh Kosong!'
            ]
        ],
        'alamat' => [
            'label'  => 'Alamat',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Alamat Tidak Boleh Kosong!'
            ]
        ],
        'no_hp' => [
            'label' => 'No Hp',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'No Hp Tidak Boleh Kosong!',
                'numeric' => 'Hanya Dapat Diisi Berupa Angka',
            ],
        ],

    ];

    public $massage = [
        'jenis_massage' => [
            'label'  => 'Jenis Masssage',
            'rules'  => 'required|is_unique[massage_list.jenis_massage]',
            'errors' => [
                'required' => 'Jenis/Tipe Massage Tidak Boleh Kosong!',
                'is_unique' => 'Jenis/Tipe Massage Sudah Terdaftar!'
            ]
        ],
        'harga' => [
            'label' => 'Harga',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Harga Tidak Boleh Kosong!',
                'numeric' => 'Hanya Dapat Diisi Berupa Angka',
            ],
        ],


    ];
}
