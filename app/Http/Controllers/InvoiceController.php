<?php

namespace App\Http\Controllers;

use App\Currency;
use App\User;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issuers = User::where('issuer', '=', true)->get();
        $clients = User::where('issuer', '=', false)->get();
        $currencies = Currency::all();
        return view('invoice', compact('issuers', 'clients', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'client_id' => ['required'],
            'matter' => ['required', 'string'],
            'issuer_id' => ['required'],
            'currency_id' => ['required'],
            'invoice_no' => ['required', 'integer'],
            'issuing_date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'between:1,1000000']
        ]);

        $date = date_format(date_create($request['issuing_date']), 'Y-m-d');
        $invoice = new Invoice([
            'client_id' => $request['client_id'],
            'matter' => $request['matter'],
            'issuer_id' => $request['issuer_id'],
            'currency_id' => $request['currency_id'],
            'invoice_no' => $request['invoice_no'],
            'issuing_date' => $date,
            'description' => $request['description'],
            'price' => $request['price']
        ]);
        $invoice->save();

        return redirect()->back()->with('success', 'Invoice created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
