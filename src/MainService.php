<?php
namespace Ardhan\Apium;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * [MainService description]
 */
class MainService
{
    protected $main_uri;
    protected $client_id;
    protected $secret_key;
    protected $client;
    protected $limit = '';
    protected $offset = '';
    protected static $obj = null;

    /**
     * mengambil data konfigurasi dari config/serviceum_config.php
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->main_uri = config('serviceum_config.uri');
        $this->client_id = config('serviceum_config.client_id');
        $this->secret_key = config('serviceum_config.secret_key');
    }


    /**
     * setiap koneksi ke web service memerlukan token. fungsi ini akan menghapilkan token yang
     * akan digunakan untuk setiap koneksi ke webservice
     * @return string token
     */
    public function getToken()
    {
        //uri untuk mendapatkan token
        $uri = $this->main_uri.'/api/gettoken?grant_type=client_credentials';

        //request header
        $headers = [
            'Content-Type' => 'application/json',
            'accept' => '*/*'
        ];

        //request body
        $body = [
            'client_id' => $this->client_id,
            'secret_key' => $this->secret_key
        ];

        //sending request
        $res = $this->client->request('POST', $uri, [
            'headers' => $headers,
            'body' => json_encode($body)
        ]);

        //get result
        $body = json_decode($res->getBody());

        return $body->token;
    }


    protected function requestData($uri, $body, $headers)
    {
        //sending request
        $res = $this->client->request(
            'POST',
            $uri,
            [
                'headers' => $headers,
                'body' => json_encode($body)
            ]
        );

        /**
         * @var $result = [
         *    "response_code" => "000/021",
         *    "error" => "error message",
         *    "data" => Array
         * ]
         */
        $results = json_decode($res->getBody());
        if($results->response_code == "000"){ //jika tidak ada error
            return $results->data;
        }else{
            return false;
        }
    }


    /**
     * [getData description]
     * @return [type] [description]
     */
    public function getData()
    {

    }
}
