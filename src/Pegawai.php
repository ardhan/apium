<?php
namespace Ardhan\Apium;

use Ardhan\Apium\MainService;

class Pegawai extends MainService
{
    private $search = '';

    public function search($search = '')
    {
        $this->search = $search;
    }
}
