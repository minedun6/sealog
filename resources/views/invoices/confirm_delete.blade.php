@extends('layouts/main')
@section('second-title')
    - Factures
@endsection
@section('title')
    Supprimer une Facture
@endsection

@section('url-way')
    <li>
        <a href="{{ url('/invoices') }}">Factures</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Supprimer une facture</span>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--<div class="note note-danger">
                <p> NOTE: The below datatable is not connected to a real database so the filter and sorting is just simulated for demo purposes only. </p>
            </div>-->
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <p>
                            Vous êtes sûre de vouloir supprimer cette
                            facture: {{ $invoice->prefix.$invoice->invoice_number }}
                        </p>
                        <a href="{{ url('/invoices/destroy/'.$invoice->id) }}">Confirmer</a>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>

    </div>

@endsection


