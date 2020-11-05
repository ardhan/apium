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
    private $limit = '';
    private $offset = '';

    public function search($search = '')
    {
        $this->search = $search;
    }

    public function kodeUnitInduk($kode_unit_induk)
    {
        $this->kode_unit_induk = $kode_unit_induk;
    }

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
}
