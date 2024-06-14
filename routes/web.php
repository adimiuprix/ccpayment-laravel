<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\CcPaymentController;

Route::get('coinlist', [CcPaymentController::class, 'getCoinList']);

Route::post('webhook', [WebhookController::class, 'processWebhook']);
