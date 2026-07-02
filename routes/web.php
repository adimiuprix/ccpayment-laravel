<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\CcPaymentController;

Route::get('/', function () {
    return view('form');
});

Route::get('coinlist', [CcPaymentController::class, 'getCoinList']);

Route::post('create-order', [CcPaymentController::class, 'createOrder']);

Route::post('webhook', [WebhookController::class, 'processWebhook']);
