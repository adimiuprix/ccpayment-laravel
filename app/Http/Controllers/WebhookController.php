<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    private function getAppIdSecret()
    {
        return [
            'app_id' => '9uWkOaQcHcipuk6z',
            'app_secret' => '6b1f3587ef18d7fb0577f961f0329741'
        ];
    }

    public function processWebhook(Request $request)
    {
        $appIdSecret = $this->getAppIdSecret();
        $appId = $appIdSecret['app_id'];
        $appSecret = $appIdSecret['app_secret'];

        $timestamp = $request->header('Timestamp');
        $signature = $request->header('Sign');
        $signText = $request->getContent();

        if ($this->verifySignature($signText, $signature, $appId, $appSecret, $timestamp)) {
            return response()->json(['message' => 'success'], 200);
        } else {
            return response()->json(['message' => 'Invalid signature'], 401);
        }
    }

    function verifySignature($content, $signature, $appID, $appSecret, $timestamp)
    {
        $signText = $appID . $timestamp . $content;
        $serverSign = hash_hmac('sha256', $signText, $appSecret);
        return $signature === $serverSign;
    }

}
