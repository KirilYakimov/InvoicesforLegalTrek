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
        //Validate the input data
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

        //Format date to be able to be inserted into mysql database
        $issuing_date = date_format(date_create($request['issuing_date']), 'Y-m-d');

        //Create a new invoice and save it to the database
        $invoice = new Invoice([
            'client_id' => $request['client_id'],
            'matter' => $request['matter'],
            'issuer_id' => $request['issuer_id'],
            'currency_id' => $request['currency_id'],
            'invoice_no' => $request['invoice_no'],
            'issuing_date' => $issuing_date,
            'description' => $request['description'],
            'price' => $request['price']
        ]);

        // Create a docx file in public storage
        $template = new \PhpOffice\PhpWord\TemplateProcessor('Template.docx');
        $template->setValue('client', $invoice->client->name);
        $template->setValue('matter', $invoice->matter);
        $template->setValue('issue_no', $invoice->invoice_no . '/' . date('Y'));
        $template->setValue('description', $invoice->description);
        $template->setValue('price', number_format($invoice->price, 2));
        $template->setValue('total', number_format($invoice->price * 1, 2));
        $template->setValue('vat', '20');
        $template->setValue('total_vat', number_format($invoice->price * 1.20, 2));
        $template->setValue('currency', ($invoice->currency->id == 1) ? "€" : "$");
        $template->setValue('issuer', $invoice->issuer->name);
        $filename =  $invoice->invoice_no . '-' .  $invoice->client->name . '.docx';

        $template->saveAs(public_path('storage/' . $filename));

        $invoice->file_location = public_path('storage/' . $filename);
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
