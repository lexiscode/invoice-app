<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('/search_invoice', [InvoiceController::class, 'searchInvoice']);
