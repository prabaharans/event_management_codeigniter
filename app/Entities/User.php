<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

use CodeIgniter\Shield\Entities\User as ShieldUserEntity;

class User extends ShieldUserEntity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    // function colori_html()
    // {
    //     $colori_html_model = new Colori_htmlModel();
    //     return $colori_html_model->find($this->id_colori_html);
    // }
}
