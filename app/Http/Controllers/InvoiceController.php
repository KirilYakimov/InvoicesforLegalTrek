<?php

namespace App\Http\Controllers;

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
        return view('invoice', compact('issuers', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'client_id' => ['required'],
        //'matter' => ['required', 'string'],
        //'issuer_id' => ['required'],
        //'currency' => ['required'],
        //'invoice_no' => ['required', 'integer'],
        //'issuing_date' => ['required', 'date'],
        //'description' => ['required', 'string'],
        //'price' => ['reqired', 'between:1,1000000']

        Invoice::create([
            'client_id' => $request['client_id'],
            'matter' => $request['matter'],
            'issuer_id' => $request['issuer_id'],
            'currency' => $request['currency'],
            'invoice_no' => $request['invoice_no'],
            'issuing_date' => $request['issuing_date'],
            'description' => $request['description'],
            'price' => $request['price']
        ]);

        return redirect()->back();
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
