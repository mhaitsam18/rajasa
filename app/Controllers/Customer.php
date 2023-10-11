<?php

namespace App\Controllers;

class Customer extends BaseController
{
    private $builderProduk;
    private $builderKategori;
    private $uri;
    private $builderAkun;

    public function __construct()
    {
        $this->builderProduk = new \App\Models\ProdukModel();
        $this->builderKategori = new \App\Models\KategoriModel();
        $this->uri = service('uri');
        $this->builderAkun = new \App\Models\CustomerModel();
    }

    public function index()
    {
        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->get()->getResult();

        $akun = $this->builderAkun->find(session()->get('id'));
        $data = [
            'title' => 'Rajasa Finishing',
            'keyword'  => null,
            'akun' => $akun,
            'kategori' => $kategori,
        ];

        // $sessionData = session()->get();

        // Print or process the session data as needed
        // print_r($sessionData);

        // var_dump($sessionData);
        // die();

        return view('customer/index', $data);
    }

    public function produk($kat, $filter)
    {

        // AKUN
        $akun = $this->builderAkun->find(session()->get('id'));

        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->get()->getResult();

        // PRODUK
        $queryProduk = $this->builderProduk;
        // PRODUK DENGAN KATEGORI
        if ($kat !== 'all') {
            for ($i = 0; $i < count($kategori); $i++) {
                if ($kategori[$i]->kategori === $kat) {
                    $idKategori = $kategori[$i]->id;
                }
            }
            $queryProduk = $queryProduk->where('idKategori', $idKategori);
        }

        // PRODUK DENGAN SEARCH
        $keywords = $this->request->getVar('keyword');
        if ($keywords !== null) {
            $queryProduk = $queryProduk->like('judul', $keywords);
        }

        // PRODUK DENGAN FILTER
        if ($filter === 'terbaru') {
            $queryProduk = $queryProduk->orderBy('created', 'DESC');
        } else if ($filter === 'terendah') {
            $queryProduk = $queryProduk->orderBy('harga', 'ASC');
        } else if ($filter === 'tertinggi') {
            $queryProduk = $queryProduk->orderBy('harga', 'DESC');
        }

        // PAGINATION
        $produk = $queryProduk->paginate(30, 'produk');
        $pager = $queryProduk->pager;

        // MENGHITUNG SEMUA PRODUK
        $countProduk = count($produk);

        $data = [
            'title' => 'Rajasa Finishing | Kalender',
            'segment1' => $this->uri->getSegment(1),
            'segment2' => $this->uri->getSegment(2),
            'segment3' => $this->uri->getSegment(3),
            'keyword'  => $keywords,
            'kategori' => $kategori,
            'produk' => $produk,
            'jumlahProduk' => $countProduk,
            'pager' => $pager,
            'akun' => $akun,
        ];

        return view('customer/produk', $data);
    }

    public function detailProduk($id)
    {
        // AKUN
        $akun = $this->builderAkun->find(session()->get('id'));

        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->get()->getResult();

        // DETAIL PRODUK
        $queryProduk = $this->builderProduk;
        $produk = $queryProduk->find($id);

        $data = [
            'title' => 'Rajasa Finishing | Kalender',
            'keyword'  => null,
            'kategori' => $kategori,
            'produk' => $produk,
            'akun' => $akun,
        ];

        return view('customer/detail-produk', $data);
    }

    public function akun()
    {
        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->get()->getResult();

        // AKUN
        $queryAkun = $this->builderAkun;
        $akun = $queryAkun->find(session()->get('id'));
        $data = [
            'title' => 'Rajasa Finishing',
            'keyword'  => null,
            'segment2' => $this->uri->getSegment(2),
            'kategori' => $kategori,
            'akun' => $akun,
        ];

        return view('customer/akun', $data);
    }

    public function saveAkun()
    {
        // ANCHOR UPDATE AKUN
        $queryAkun = $this->builderAkun;
        $akun = $queryAkun->find(session()->get('id'));

        // ANCHOR FILE UPLOAD
        $avatar = $this->request->getFile('avatar');
        $pathUpload = 'asset/customer/akun';
        // CHECK ADA FILE YANG DI UPLOAD ATAU TIDAK
        if ($avatar->getError() == 4) {
            $namaFileAvatar = $akun['avatar'];
        } else {
            // RENAME FILE UPLOAD
            $namaFile = $avatar->getRandomName();
            // MOVE FILE UPLOAD
            $avatar->move($pathUpload, $namaFile);

            $namaFileAvatar = $pathUpload . '/' . $namaFile;

            // DELETE FILE LAMA
            $oldAvatar = $akun['avatar'];
            if (
                $oldAvatar !== 'asset/customer/akun/avatar-customer.png' &&
                file_exists($oldAvatar)
            ) {
                unlink($oldAvatar);
            }
        }

        // ANCHOR CEK EMAIL
        $newEmail = $this->request->getVar('email');
        $oldEmail = $akun['email'];

        if ($newEmail !== $oldEmail) {
            session()->destroy();
        }

        // ANCHOR CEK PASSWORD
        $newPassword = $this->request->getVar('password');
        $oldPassword = $akun['password'];

        if ($newPassword !== $oldPassword) {
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            session()->destroy();
        }

        $data = [
            'id' => session()->get('id'),
            'email' => $newEmail,
            'password' => $newPassword,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'alamat' => $this->request->getVar('alamat'),
            'kode_pos' => $this->request->getVar('kodepos'),
            'no_hp' => $this->request->getVar('nohp'),
            'avatar' => $namaFileAvatar,
        ];
        $queryAkun->save($data);

        return redirect()->to(base_url('/customer/akun'));
    }
}
