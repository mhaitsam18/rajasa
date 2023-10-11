<?php

namespace App\Controllers;

class Designer extends BaseController
{
    private $builderAkun;
    private $uri;
    private $builderKategori;
    private $builderTransaksi;
    private $builderDesigner;
    private $builderProduk;

    public function __construct()
    {
        $this->builderAkun = new \App\Models\DesignerModel();
        $this->uri = service('uri');
        $this->builderKategori = new \App\Models\KategoriModel();
        $this->builderTransaksi = new \App\Models\TransaksiModel();
        $this->builderDesigner = new \App\Models\DesignerModel();
        $this->builderProduk = new \App\Models\ProdukModel();
    }

    public function index($tahunKategori = 'all', $tahunProfit = 'all', $tahunPerformansi = null)
    {
        // CHECK TIPE AKUN
        if (session()->get('tipe') !== '2') {
            return redirect()->to(base_url('/logout'));
        }

        // DESIGNER
        $queryDesigner = $this->builderDesigner;
        $designer = $queryDesigner->findAll();

        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->findAll();

        // LIST TAHUN TRANSAKSI
        $queryTahunTransaksi = $this->builderTransaksi;
        $queryTahunTransaksi->select('EXTRACT(year FROM tanggal_pengiriman) AS tahun');
        $queryTahunTransaksi->groupBy('EXTRACT(year FROM tanggal_pengiriman)');
        $tahunTransaksi = $queryTahunTransaksi->findAll();

        // TRANSAKSI KATEGORI
        $queryTransaksiKategori = $this->builderTransaksi;
        $queryTransaksiKategori->select('*');
        $queryTransaksiKategori->selectSum('jumlah');
        $queryTransaksiKategori->groupBy('idKategori');
        if ($tahunKategori !== null && $tahunKategori !== 'all') {
            $queryTransaksiKategori->where('EXTRACT(year FROM tanggal_pengiriman)', $tahunKategori);
        }
        $transaksiKategori = $queryTransaksiKategori->findAll();

        // TAHUN TRANSAKSI
        $queryTahunTransaksi = $this->builderTransaksi;
        $queryTahunTransaksi->select('EXTRACT(year FROM tanggal_pengiriman) AS tahun');
        $queryTahunTransaksi->groupBy('EXTRACT(year FROM tanggal_pengiriman)');
        $tahunTransaksi = $queryTahunTransaksi->findAll();

        // PROFIT PER TAHUN
        $queryProfitPertahun = $this->builderTransaksi;
        $queryProfitPertahun->select(
            'tanggal_pengiriman,
            EXTRACT(month FROM tanggal_pengiriman) AS bulan,
            EXTRACT(year FROM tanggal_pengiriman) AS tahun'
        );
        $queryProfitPertahun->selectSum('total_harga', 'total');
        if ($tahunProfit !== null && $tahunProfit !== 'all') {
            $queryProfitPertahun->groupBy('EXTRACT(month FROM tanggal_pengiriman)');
            $queryProfitPertahun->where('EXTRACT(year FROM tanggal_pengiriman)', $tahunProfit);
        } else {
            $queryProfitPertahun->groupBy('EXTRACT(year FROM tanggal_pengiriman)');
        }
        $profitPertahun = $queryProfitPertahun->findAll();

        // PERFORMANSI DESIGNER
        $keywordPerformansi = $this->request->getVar('keywordPerformansi');

        $queryPerformansiDesigner = $this->builderTransaksi;
        $queryPerformansiDesigner->select(
            'designer.id AS idDesigner, 
            designer.nama AS nama, 
            kategori.id AS idKategori, 
            kategori.kategori AS kategori,
            transaksi.jumlah AS jumlah,
            transaksi.tanggal_pengiriman'
        );
        $queryPerformansiDesigner->join('designer', 'designer.id = transaksi.idDesigner');
        $queryPerformansiDesigner->join('kategori', 'kategori.id = transaksi.idKategori');
        if ($tahunPerformansi !== null && $tahunPerformansi !== 'all') {
            $queryTransaksiKategori->where('EXTRACT(year FROM transaksi.tanggal_pengiriman)', $tahunPerformansi);
        }
        if ($keywordPerformansi !== null) {
            $queryPerformansiDesigner->like('designer.nama', $keywordPerformansi);
        }
        $performansiDesigner = $queryPerformansiDesigner->findAll();

        // KELOMPOK DESIGNER (PERFORMANSI DESIGNER)
        $queryKelompokDesigner = $this->builderTransaksi;
        $queryKelompokDesigner->select(
            'transaksi.idDesigner AS id,
            designer.nama AS nama'
        );
        $queryKelompokDesigner->join('designer', 'designer.id = transaksi.idDesigner');
        if ($keywordPerformansi !== null) {
            $queryKelompokDesigner->like('designer.nama', $keywordPerformansi);
        }
        $queryKelompokDesigner->groupBy('transaksi.idDesigner');
        $kelompokDesigner = $queryKelompokDesigner->findAll();

        // TRANSAKSI TERBARU
        $keywordTransaksiTerbaru = $this->request->getVar('keywordTransaksiTerbaru');

        $queryTransaksiTerbaru = $this->builderTransaksi;
        $queryTransaksiTerbaru->select('
            transaksi.id AS id,
            transaksi.tanggal_transaksi AS tanggal_transaksi,
            customer.nama AS nama_customer,
            produk.judul AS produk,
            kategori.kategori AS kategori,
            transaksi.jumlah AS jumlah,
            transaksi.total_harga AS total,
            transaksi.status AS status,
            transaksi.status_transfer AS status_transfer,
            designer.nama AS nama_designer
        ');
        $queryTransaksiTerbaru->join('customer', 'customer.id = transaksi.idCustomer');
        $queryTransaksiTerbaru->join('produk', 'produk.id = transaksi.idProduk');
        $queryTransaksiTerbaru->join('kategori', 'kategori.id = transaksi.idKategori');
        $queryTransaksiTerbaru->join('designer', 'designer.id = transaksi.idDesigner');
        if ($keywordTransaksiTerbaru !== null) {
            $queryTransaksiTerbaru->like('customer.nama', $keywordTransaksiTerbaru);
        }
        $queryTransaksiTerbaru->where(
            "transaksi.status = 'On Going' OR 
            transaksi.status_transfer = 'Belum' AND
            transaksi.status_transfer = 'Selesai'"
        );
        $queryTransaksiTerbaru->orderBy('transaksi.tanggal_transaksi', 'ASC');

        $transaksiTerbaru = $queryKelompokDesigner->findAll();

        $akun = $this->builderAkun->find(session()->get('id'));
        $data = [
            'title' => 'Dashboard | Rajasa Finishing',
            'keyword'  => null,
            'akun' => $akun,
            'segment2' => $this->uri->getSegment(2),
            'kategori' => $kategori,
            'designer' => $designer,
            'transaksiKategori' => $transaksiKategori,
            'profitPertahun' => $profitPertahun,
            'tahunTransaksi' => $tahunTransaksi,
            'tahunKategori' => $tahunKategori,
            'tahunProfit' => $tahunProfit,
            'tahunPerformansi' => $tahunPerformansi,
            'tahunTransaksi' => $tahunTransaksi,
            'performansiDesigner' => $performansiDesigner,
            'kelompokDesigner' => $kelompokDesigner,
            'transaksiTerbaru' => $transaksiTerbaru,
            'keywordPerformansi' => $keywordPerformansi,
            'keywordTransaksiTerbaru' => $keywordTransaksiTerbaru,
        ];

        return view('designer/index', $data);
    }

    public function chat()
    {
        // CHECK TIPE AKUN
        if (session()->get('tipe') !== '2') {
            return redirect()->to(base_url('/logout'));
        }

        $akun = $this->builderAkun->find(session()->get('id'));
        $data = [
            'title' => 'Chat | Rajasa Finishing',
            'akun' => $akun,
            'segment2' => $this->uri->getSegment(2),
        ];

        return view('designer/chat', $data);
    }

    public function produk($jenisKategori)
    {
        // CHECK TIPE AKUN
        if (session()->get('tipe') !== '2') {
            return redirect()->to(base_url('/logout'));
        }

        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->findAll();

        // SEARCH
        $keyword = $this->request->getVar('keyword');

        $queryProduk = $this->builderProduk;
        $queryProduk->select('
        produk.id AS id,
        produk.judul AS judul,
        produk.harga AS harga,
        produk.gambar1 AS gambar1,
        produk.status AS status,
        produk.rating AS rating,
        produk.terjual AS terjual,
        produk.created AS created,
        kategori.kategori AS kategori,
        designer.nama AS designer,
        ');
        $queryProduk->join('kategori', 'kategori.id = produk.idKategori');
        $queryProduk->join('designer', 'designer.id = produk.idDesigner');
        $queryProduk->where('produk.idDesigner', session()->get('id'));
        if ($jenisKategori !== 'all') {
            $queryProduk->where('kategori.kategori', $jenisKategori);
        }
        if ($keyword !== null) {
            $queryProduk->like('produk.judul', $keyword);
        }

        // PAGINATION
        $produk = $queryProduk->paginate(10, 'produkDesigner');
        $pager = $queryProduk->pager;


        $urutan = $this->request->getVar('page_produkDesigner') ? $this->request->getVar('page_produkDesigner') : 1;

        $akun = $this->builderAkun->find(session()->get('id'));
        $data = [
            'title' => 'Data Produk | Rajasa Finishing',
            'akun' => $akun,
            'segment2' => $this->uri->getSegment(2),
            'segment3' => $this->uri->getSegment(3),
            'kategori' => $kategori,
            'produk' => $produk,
            'pager' => $pager,
            'urutan' => $urutan,
            'keyword' => $keyword,
        ];

        return view('designer/data-produk', $data);
    }

    public function tambahProduk()
    {
        // CHECK TIPE AKUN
        if (session()->get('tipe') !== '2') {
            return redirect()->to(base_url('/logout'));
        }

        if ($this->request->getVar('tambah')) {
            # code...
        }

        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->findAll();

        // DESIGNER
        $queryDesigner = $this->builderDesigner;
        $designer = $queryDesigner->findAll();

        $akun = $this->builderAkun->find(session()->get('id'));
        $data = [
            'title' => 'Tambah Produk | Rajasa Finishing',
            'akun' => $akun,
            'segment2' => $this->uri->getSegment(2),
            'kategori' => $kategori,
            'designer' => $designer,
        ];

        return view('designer/data-produk/tambah', $data);
    }
}
