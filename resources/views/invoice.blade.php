@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="justify-content-center">
            <div class="bg-light rounded-lg">
                <form id="invoiceForm" method="POST" action="{{ route('invoice.store') }}">
                    @csrf

                    <div class="form-group row mr-3 ml-3 pt-3">
                        <label for="client_id" class="col-md-3 col-form-label">Client *</label>
                        <div class="col-md-7">
                            <select name="client_id" class="form-control custom-select @error('client_id') is-invalid @enderror" id="client_id" value="{{ old('client_id') }}">
                                <option value="" disabled selected hidden>Select client</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client -> id}}">{{ $client->name }}</option>
                                @endforeach
                            </select>

                            @error('client_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mr-3 ml-3">
                        <label for="matter" class="col-md-3 col-form-label ">Matter</label>

                        <div class="col-md-7">
                            <input id="matter" type="text" class="form-control @error('matter') is-invalid @enderror" name="matter" value="{{ old('matter') }}" autocomplete="" autofocus>

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
                                        <select name="issuer_id" class="form-control @error('issuer_id') is-invalid @enderror custom-select mb-3" id="issuer_id" value="{{ old('issuer_id') }}">
                                            <option value="" disabled selected hidden>Select issuer</option>
                                            @foreach ($issuers as $issuer)
                                            <option value="{{ $issuer -> id}}">{{ $issuer->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('issuer_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="currency_id" class="col-md-3 col-form-label">Currency</label>

                                    <div class="col-md-7">
                                        <select id="currency_id" name="currency_id" class="form-control @error('currency_id') is-invalid @enderror custom-select mb-3" value="{{ old('currency_id') }}">
                                            <option value="" disabled selected hidden>Select currency</option>
                                            @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->currency }}</option>
                                            @endforeach
                                        </select>

                                        @error('currency_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-md-3 col-form-label ">Invoice No:</label>

                                    <div class="col-md-7">
                                        <input id="invoice_no" type="text" class="form-control @error('invoice_no') is-invalid @enderror" name="invoice_no" value="{{ old('invoice_no') }}" placeholder="Invoice no" autocomplete="" autofocus>

                                        @error('invoice_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-md-3 col-form-label ">Issuing date:</label>
                                    <div class="col-md-7">
                                        <input id="date" type="text" class="form-control @error('date') is-invalid @enderror" name="issuing_date" value="{{ old('issuing_date') }}" placeholder="Select date" autocomplete="" autofocus>

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
                                        <textarea id="description" type="text" style="resize: none" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Description of services" autocomplete="" autofocus></textarea>
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
                                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="price" autocomplete="" autofocus>

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
                                            <input id="vat" type="text" value="20" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" disabled>
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
                        <a id="cleareForm" class="btn btn-lg btn-primary text-white">
                            Clear
                        </a>
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