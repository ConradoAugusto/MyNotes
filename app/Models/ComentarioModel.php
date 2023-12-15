<?php

namespace App\Models;

use CodeIgniter\Model;

class ComentarioModel extends Model
{
    protected $table = 'comentarios';

    protected $allowedFields  = [
        'post_id',
        'comentario'
    ];

    protected $validationRules = [
        'post_id'  => [
            'label'  => 'Id do Post',
            'rules'  => 'required'
        ],
        'comentario'   => [
            'label'    => 'comentario',
            'rules'    => 'required'
        ]

    ];
}
