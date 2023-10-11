<?php

namespace App\Controllers;

class Tentang extends BaseController
{
    private $builderAkun;
    private $builderKategori;

    public function __construct()
    {
        $this->builderAkun = new \App\Models\CustomerModel();
        $this->builderKategori = new \App\Models\KategoriModel();
    }

    public function index()
    {
        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->get()->getResult();

        $akun = $this->builderAkun->find(session()->get('id'));
        $data = [
            'title' => 'Tentang Kami',
            'keyword'  => null,
            'akun' => $akun,
            'kategori' => $kategori,
        ];

        return view('customer/tentang', $data);
    }
}
