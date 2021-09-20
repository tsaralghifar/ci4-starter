<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;

class Testing extends BaseController
{

    public function __construct()
    {
        $this->penduduk = new PendudukModel();
    }

    public function index()
    {
        $a = $this->penduduk->findAll();
        $data = [
            'data' => $a,
        ];
        return view('pages/penduduk/index', $data);
    }
}
