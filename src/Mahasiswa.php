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

    public function search($search)
    {
        $this->search = $search;
        return $this;
    }


    public function statusMhs($status_mhs)
    {
        $this->status_mhs = $status_mhs;
        return $this;
    }


    public function namaFakultas($nama_fakultas)
    {
        $this->nama_fakultas = $nama_fakultas;
        return $this;
    }


    public function jenjang($jenjang)
    {
        $this->jenjang = $jenjang;
        return $this;
    }

    public function namaProdi($nama_prodi)
    {
        $this->nama_prodi = $nama_prodi;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }
}
