<?php
namespace Ardhan\Apium;

use Ardhan\Apium\MainService;

class Mahasiswa extends MainService
{
    private $search = '';
    private $status_mhs = '';
    private $nama_fakultas = '';
    private $jenjang = '';
    private $nama_prodi = '';
    private $limit = '10';
    private $offset = '0';

    /**
     * @param $search
     * @return $this
     */
    public function search($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * @param $status_mhs
     * @return $this
     */
    public function statusMhs($status_mhs)
    {
        $this->status_mhs = $status_mhs;
        return $this;
    }

    /**
     * @param $nama_fakultas
     * @return $this
     */
    public function namaFakultas($nama_fakultas)
    {
        $this->nama_fakultas = $nama_fakultas;
        return $this;
    }

    /**
     * @param $jenjang
     * @return $this
     */
    public function jenjang($jenjang)
    {
        $this->jenjang = $jenjang;
        return $this;
    }

    /**
     * @param $nama_prodi
     * @return $this
     */
    public function namaProdi($nama_prodi)
    {
        $this->nama_prodi = $nama_prodi;
        return $this;
    }

    /**
     * @param $limit
     * @return $this
     */
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param $offset
     * @return $this
     */
    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    public function get()
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

    public function first()
    {
        $data = $this->get();
        return $data[0];
    }
}
