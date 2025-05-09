<?php
namespace App\Defaults;

use Illuminate\Support\Facades\Http;

trait Wallet{

    private $privyKey;
    private $pubKey;
    private $url;

    public function __construct()
    {
        $this->url = 'https://sandbox.nextropay.com/api/';
        $this->pubKey = 'CBX_TEST_PUB_1652721949385464170';
        $this->privyKey = 'CBX_TEST_SEC_16527219491168518163';
    }

    public function createInvoice($data)
    {
        $url = $this->url.'invoice/create';

        return  $this->curlPost($url,$data);
    }

    public function checkInvoice($ref)
    {
        $url = 'https://sandbox.nextropay.com/api/invoice/'.$ref.'/details';
        return $this->curlGet($url);
    }
    public function curlGet($url)
    {
        return Http::withHeaders([
            'x-api-key'=>'CBX_TEST_PUB_1652721949385464170',
            'Content-Type'=>'application/json'
        ])->get($url);
    }

    public function curlPost($url,$data = null)
    {
        return Http::withHeaders([
            'x-api-key'=>$this->pubKey,
            'x-api-sec'=>$this->privyKey
        ])->post($url,$data);
    }
}
