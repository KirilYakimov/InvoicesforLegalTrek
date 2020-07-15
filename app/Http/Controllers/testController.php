<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        //Session::flash('success', 'You have successfully created an invoice!');

        //'client_id' => ['required'],
        //'matter' => ['required', 'string'],
        //'issuer_id' => ['required'],
        //'currency' => ['required'],
        //'invoice_no' => ['required', 'integer'],
        //'issuing_date' => ['required', 'date'],
        //'description' => ['required', 'string'],
        //'price' => ['reqired', 'between:1,1000000']

        /*Invoice::create([
            'client_id' => $data['client_id'],
            'matter' => $data['matter'],
            'issuer_id' => $data['issuer_id'],
            'currency' => $data['currency'],
            'invoice_no' => $data['invoice_no'],
            'issuing_date' => $data['issuing_date'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);*/

        return redirect()->back();
    }
}
