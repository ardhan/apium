<?php
namespace Ardhan\Apium;

use Ardhan\Apium\MainService;

class Pegawai extends MainService
{
    private $search = '';
    private $kode_unit_induk = '';
    private $kode_unit = '';
    private $jenis_pegawai = '';
    private $status_pegawai = '';
    private $limit = '10';
    private $offset = '0';


    /**
     * @param string $search
     * @return $this
     */
    public function search($search = '')
    {
        $this->search = $search;
        return $this;
    }


    /**
     * @param $kode_unit_induk
     * @return $this
     */
    public function kodeUnitInduk($kode_unit_induk)
    {
        $this->kode_unit_induk = $kode_unit_induk;
        return $this;
    }


    /**
     * @param $kode_unit
     * @return $this
     */
    public function kodeUnit($kode_unit)
    {
        $this->kode_unit = $kode_unit;
        return $this;
    }


    /**
     * @param $jenis_pegawai
     * @return $this
     */
    public function jenisPegawai($jenis_pegawai)
    {
        $this->jenis_pegawai = $jenis_pegawai;
        return $this;
    }


    /**
     * @param $status_pegawai
     * @return $this
     */
    public function statusPegawai($status_pegawai)
    {
        $this->status_pegawai = $status_pegawai;
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


    /**
     * @return false
     */
    public function get()
    {
        $uri = $this->main_uri."/api/kepegawaian/pegawai/getdata?access_token=".$this->getToken();

        $headers = [
            'Content-Type' => 'application/json',
            'accept' => '*/*',
            'x-api-key' => $this->client_id
        ];

        $body = [
            'search' => $this->search,
            'kode_unit_induk' => $this->kode_unit_induk,
            'kode_unit' => $this->kode_unit,
            'jenis_pegawai' => $this->jenis_pegawai,
            'status_pegawai' => $this->status_pegawai,
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
