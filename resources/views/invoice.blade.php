@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="justify-content-center">
            <div class="bg-light rounded-lg">
                <form method="POST" action="{{ route('invoice.store') }}">
                    @csrf

                    <div class="form-group row mr-3 ml-3 pt-3">
                        <label for="client" class="col-md-3 col-form-label">Client *</label>
                        <div class="col-md-7">
                            <select name="client_id" class="form-control custom-select" id="client_id" required>
                                <option value="" disabled selected hidden>Select client</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client -> id}}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mr-3 ml-3">
                        <label for="matter" class="col-md-3 col-form-label ">Matter</label>

                        <div class="col-md-7">
                            <input id="matter" type="text" class="form-control @error('matter') is-invalid @enderror" name="matter" value="{{ old('matter') }}" required autocomplete="" autofocus>

                            @error('matter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group container">
                        <div class="bg-white rounded-lg">
                            <div class="ml-3 pt-3 pb-3">
                                <div class="form-group row">
                                    <label for="clientName" class="col-md-3 col-form-label ">Client:</label>

                                    <div class="col-md-7">
                                        <b id="clientName">Please select a client.</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="matterText" class="col-md-3 col-form-label ">Matter:</label>

                                    <div class="col-md-7">
                                        <b id="matterText" class="overflow-auto" style="word-wrap: break-word">Please enter a matter.</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="issuer_id" class="col-md-3 col-form-label">Issuer:</label>

                                    <div class="col-md-7">
                                        <select name="issuer_id" class="form-control custom-select mb-3" id="issuer_id" required>
                                            <option value="" disabled selected hidden>Select issuer</option>
                                            @foreach ($issuers as $issuer)
                                            <option value="{{ $issuer -> id}}">{{ $issuer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="currency" class="col-md-3 col-form-label">Currency</label>

                                    <div class="col-md-7">
                                        <select name="currency" class="form-control custom-select mb-3" id="currency" required>
                                            <option value="" disabled selected hidden>Select currency</option>
                                            <option value="Euro">Euro</option>
                                            <option value="US dollars">US dollars</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-md-3 col-form-label ">Invoice No:</label>

                                    <div class="col-md-7">
                                        <input id="invoice_no" type="text" class="form-control @error('invoiceNo') is-invalid @enderror" name="invoice_no" value="{{ old('invoiceNo') }}" placeholder="Invoice no" required autocomplete="" autofocus>

                                        @error('invoiceNo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-md-3 col-form-label ">Issuing date:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="issuing_date" placeholder="MM/DD/YYYY" required autocomplete="" autofocus>
                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- style="white-space: pre-line" -->
                                <div class="form-group row">
                                    <label for="description" class="col-md-3 col-form-label ">Description:</label>
                                    <div class="col-md-7">
                                        <textarea type="text" style="resize: none" rows="3" class="form-control @error('date') is-invalid @enderror" name="description" placeholder="Description of services" required autocomplete="" autofocus></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-md-3 col-form-label ">Price:</label>

                                    <div class="col-md-7">
                                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="price" required autocomplete="" autofocus>

                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vat" class="col-md-3 col-form-label ">VAT:</label>

                                    <div class="row col-md-7">
                                        <div class="col-md-7">
                                            <input id="vat" type="text" value="20" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required disabled>
                                        </div>
                                        <div class="col-md-5 d-flex">
                                            <p>% </p>
                                            <p id="selectedCurrency">$</p>
                                            <p id="priceWithVAT">0,00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-center mx-auto d-block pb-3">
                        <button id="cleareForm" class="btn btn-lg btn-primary">
                            Clear
                        </button>
                        <button type="submit" class="btn btn-lg btn-primary">
                            Create invoice
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection