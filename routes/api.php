<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('/search_invoice', [InvoiceController::class, 'searchInvoice']);
Route::get('/create', [InvoiceController::class, 'create']);

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

Route::post('/add_invoice', [InvoiceController::class, 'addInvoice']);

Route::get('/show/{id}', [InvoiceController::class, 'showInvoice']);
Route::get('/edit/{id}', [InvoiceController::class, 'editInvoice']);

Route::get('/delete_invoice_items/{id}', [InvoiceController::class, 'deleteInvoiceItems']);

Route::post('/update_invoice/{id}', [InvoiceController::class, 'updateInvoice']);

Route::get('/delete_invoice/{id}', [InvoiceController::class, 'deleteInvoice']);
