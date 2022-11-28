<?php
namespace App\Services;

use App\Services\MainService;

/**
 * Memanggil Data Mahasiswa dari Web Service UM
 */
class Mahasiswa extends MainService
{
    private $search = '';
    private $status_mhs = '';
    private $nama_fakultas = '';
    private $jenjang = '';
    private $nama_prodi = '';


    /**
     * konstruksi kelas
     * @param string $search        nama/nim
     * @param string $status_mhs    (A: aktif, L: Lulus, D: DO, M: Mengundurkan Diri,W: Wafat)
     * @param string $nama_fakultas Nama Fakultas
     * @param string $jenjang       Jenjang
     * @param string $nama_prodi    Nama Program Studi
     * @param string $limit         limit pencarian
     * @param string $offset        titik awal pencarian
     */
    public function __construct( $search = '', $status_mhs = '', $nama_fakultas = '', $jenjang = '',
        $nama_prodi = '', $limit = '', $offset = '0')
    {
        parent::__construct();
        $this->search = $search;
        $this->status_mhs = $status_mhs;
        $this->nama_fakultas = $nama_fakultas;
        $this->jenjang = $jenjang;
        $this->nama_prodi = $nama_prodi;
        $this->limit = $limit;
        $this->offset = $offset;
    }


    /**
     * [setSearch description]
     * @param [type] $search [description]
     */
    public function setSearch($search)
    {
        $this->search = $search;
    }


    /**
     * [setStatusMhs description]
     * @param [type] $status_mhs [description]
     */
    public function setStatusMhs($status_mhs)
    {
        $this->status_mhs = $status_mhs;
    }


    /**
     * [setNamaFakultas description]
     * @param [type] $nama_fakultas [description]
     */
    public function setNamaFakultas($nama_fakultas)
    {
        $this->nama_fakultas = $nama_fakultas;
    }


    /**
     * [setJenjang description]
     * @param [type] $jenjang [description]
     */
    public function setJenjang($jenjang)
    {
        $this->jenjang = $jenjang;
    }


    /**
     * [setNamaProdi description]
     * @param [type] $nama_prodi [description]
     */
    public function setNamaProdi($nama_prodi)
    {
        $this->nama_prodi = $nama_prodi;
    }


    /**
     * [getMahasiswa description]
     * @return [type] [description]
     */
    public function getData()
    {
        //uri service
        $uri = "https://services.um.ac.id/api/akademik/mahasiswa/getdata";

        //request header
        $headers = [
            'Content-Type' => 'application/json',
            'accept' => '*/*',
            'x-api-key' => $this->client_id
        ];

        //resquest body
        $body = [
            'token' => $this->getToken(),
            'search' => $this->search,
            'status_mhs' => $this->status_mhs,
            'nama_fakultas' => $this->nama_fakultas,
            'jenjang' => $this->jenjang,
            'nama_prodi' => $this->nama_prodi,
            'limit' => $this->limit,
            'offset' => $this->offset
        ];

        return $this->requestData($uri, $body, $headers);
    }

    /**
     * Pemanggilan object secara statis untuk memudahkan
     */

    /**
     * Fungsi ini digunakan untuk mendapatkan seluruh data mahasiswa yang terkait dengan parameter
     * $search. Contoh: $mahasiswa = Mahasiswa::find("201231234123");
     * Mahasiswa::find() akan menghasilkan result seluruh mahasiswa yang nim-nya mirip dengan
     * parameter $search
     * @param  string $search nim/nama mahasiswa
     * @return array          seluruh data mahasiswa yang mirip dengan $search
     */
    public static function find($search)
    {
        $m = new Mahasiswa($search);
        $data = $m->getData();
        if($data){
            return $data;
        }else{
            return false;
        }

    }


    /**
     * Fungsi ini hampir mirip dengan find tapi yang dikembalikan hanyalah data 1 mahasiswa saja.
     * Jika webservice mengembalikan banyak mahasiswa dalam bentuk Array, maka fungsi ini akan
     * mengambil anggota array yang paling atas
     * @param  string $search nim atau nama
     * @return array          array data mahasiswa
     */
    public static function findOne($search)
    {
        $m = new Mahasiswa($search);
        $data = $m->getData();
        if($data){
            return $data[0];
        }else{
            return false;
        }

    }


    /**
     * chaingin method $search = '', $status_mhs = '', $nama_fakultas = '', $jenjang = '',
     * $nama_prodi = '', $limit = '', $offset = '0'
     */

     /**
      * [search description]
      * @param  [type] $search [description]
      * @return [type]         [description]
      */
     public static function search($search)
     {
        if(self::$obj == null){
            self::$obj = new Mahasiswa();
        }
        self::$obj->setSearch($search);
        return self::$obj;
    }

     /**
      * [search description]
      * @param  [type] $search [description]
      * @return [type]         [description]
      */
     public static function status_mhs($status_mhs)
     {
        if(self::$obj == null){
            self::$obj = new Mahasiswa();
        }
        self::$obj->setStatusMhs($status_mhs);
        return self::$obj;
    }


     /**
      * [search description]
      * @param  [type] $search [description]
      * @return [type]         [description]
      */
     public static function nama_fakultas($nama_fakultas)
     {
        if(self::$obj == null){
            self::$obj = new Mahasiswa();
        }
        self::$obj->setNamaFakultas($nama_fakultas);
        return self::$obj;
    }


     /**
      * [search description]
      * @param  [type] $search [description]
      * @return [type]         [description]
      */
     public static function jenjang($jenjang)
     {
        if(self::$obj == null){
            self::$obj = new Mahasiswa();
        }
        self::$obj->setJenjang($jenjang);
        return self::$obj;
    }


     /**
      * [search description]
      * @param  [type] $search [description]
      * @return [type]         [description]
      */
     public static function nama_prodi($nama_prodi)
     {
        if(self::$obj == null){
            self::$obj = new Mahasiswa();
        }
        self::$obj->setNamaProdi($nama_prodi);
        return self::$obj;
    }


     /**
      * [search description]
      * @param  [type] $search [description]
      * @return [type]         [description]
      */
     public static function limit($limit)
     {
        if(self::$obj == null){
            self::$obj = new Mahasiswa();
        }
        self::$obj->setLimit($limit);
        return self::$obj;
    }

    public static function get()
    {
        $data = self::$obj->getData();
        self::$obj = null;
        if($data){
            return $data;
        }else{
            return false;
        }
    }

    /**
     * [get description]
     * @return [type] [description]
     */
    public static function first()
    {
        $data = self::$obj->getData();
        self::$obj = null;
        if($data){
            return $data[0];
        }else{
            return false;
        }
    }
}

