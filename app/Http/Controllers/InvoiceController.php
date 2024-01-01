<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Invoice;
use App\Models\InvoiceItem;
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

    public function create(Request $request)
    {
        $counter = Counter::where('key', 'invoice')->first();

        $invoice = Invoice::orderBy('id', 'DESC')->first();
        if($invoice){
            $invoice = $invoice->id + 1;
            $counters = $counter->value + $invoice;
        }else{
            $counters = $counter->value;
        }

        $formData = [
            'number' => $counter->prefix.$counters,
            'customer_id' => null,
            'customer' => null,
            'issue_date' => date('Y-m-d'),
            'due_date' => null,
            'reference' => null,
            'discount' => 0,
            'term_and_conditions' => 'Default Terms and Conditions',
            'items' => [
                [
                    'product_id' => null,
                    'product' => null,
                    'unit_price' => 0,
                    'quantity' => 1
                ]
            ]
        ];

        return response()->json($formData);
    }

    public function addInvoice(Request $request)
    {
        $invoice_item = $request->input('invoice_item');

        $invoice = Invoice::create([
            'sub_total' => $request->sub_total,
            'total_amount' => $request->total_amount,
            'customer_id' => $request->customer_id,
            'number' => $request->number,
            'issue_date'=> $request->issue_date,
            'due_date' => $request->due_date,
            'discount' => $request->discount,
            'reference' => $request->reference,
            'terms_and_conditions' => $request->terms_and_conditions
        ]);

        foreach(json_decode($invoice_item) as $item){

            InvoiceItem::create([
                'product_id' => $item->id,
                'invoice_id' => $invoice->id,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price
            ]);
        }
    }


    public function showInvoice($id)
    {
        // we fetch the customer details, their invoice items, and products
        $invoice = Invoice::with(['customer', 'invoice_items.product'])->find($id);

        return response()->json([
            'invoice' => $invoice
        ], 200);
    }

}


