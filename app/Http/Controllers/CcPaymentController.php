<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CcPaymentController extends Controller
{
    public function getCoinList()
    {
        $app_id = "9uWkOaQcHcipuk6z";
        $app_secret = "4c1d09ae3e977f7ef12946822cfad213";
        $url = "https://ccpayment.com/ccpayment/v2/getCoinList";
        $content = [];

        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp . ($body ?? '');

        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        // Setting up the request
        $response = Http::withHeaders([
            "Content-Type" => "application/json;charset=utf-8",
            "Appid" => $app_id,
            "Sign" => $server_sign,
            "Timestamp" => $timestamp
        ])->post($url, $content);

        $result = $response->json();
        dd($result);
    }
}
