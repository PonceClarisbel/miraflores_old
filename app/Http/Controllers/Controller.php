<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            'timeout'  => 1000.0,
        ]);
        $response = $client->request('GET', 'posts');
        $orders = json_decode($response->getBody()->getContents());
        return view('orders.index', compact('orders'));
    }
}
