<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;

class Penduduk extends BaseController
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

    public function add()
    {
        return view('pages/penduduk/add');
    }

    public function save()
    {
        $this->penduduk->save([
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        return redirect()->to('/penduduk');
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->penduduk->where('id', $id)->first()
        ];
        return view('pages/penduduk/edit', $data);
    }

    public function update($id)
    {
        $this->penduduk->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        return redirect()->to('/penduduk');
    }

    public function delete($id)
    {
        $this->penduduk->delete($id);
        return redirect()->to('/penduduk');
    }
}
