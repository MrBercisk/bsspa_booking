<?php

namespace App\Models;

use CodeIgniter\Model;

class MassageModel extends Model
{
    protected $table = 'massage_list';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'jenis_massage', 'harga','diskon'];
}
