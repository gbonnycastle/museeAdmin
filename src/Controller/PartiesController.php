<?php
namespace App\Controller;

use App\Controller\AppController;

class PartiesController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'name', 'org'
        ],
        'sortWhitelist' => [
            'id', 'name', 'org'
        ]
    ];
}
