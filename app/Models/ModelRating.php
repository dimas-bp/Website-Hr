<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRating extends Model
{
    protected $table = 'tb_rating';
    protected $primaryKey = 'id_rating';
    protected $allowedFields = [
        'id_calkar',
        'star'
    ];
    protected $returnType = 'App/Entities/Rating';
    protected $useTimestamps = false;
}
