<?php
namespace Ardhan\Apium\Facades;

use Illuminate\Support\Facades\Facade;

class ApiMahasiswa extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api-mahasiswa';
    }


}
