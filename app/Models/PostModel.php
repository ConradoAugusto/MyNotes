<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'post';

    protected $allowedFields  = [
        'title',
        'slug',
        'body'
    ];

    protected $validationRules = [
        'title'  => [
            'label'  => 'title',
            'rules'  => 'required'
        ],
        'slug'   => [
            'label'    => 'slug',
            'rules'    => 'required'
        ],
        'body'   => [
            'label'    => 'post',
            'rules'    => 'required'
        ]

    ];
}
