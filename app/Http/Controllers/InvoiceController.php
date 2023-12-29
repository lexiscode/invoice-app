<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();

        return response()->json([
            'invoices' => $invoices
        ], 200);
    }

    public function searchInvoice(Request $request)
    {

        $query = $request->input('s');

        if ($query != null){
            $invoices = Invoice::with('customer')
                ->where('id', 'like', "%$query%")
                ->get();

            return response()->json([
                'invoices' => $invoices
            ], 200);
        }else{
            return $this->index();
        }
    }
}
