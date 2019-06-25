@extends('layouts/main')
@section('second-title')
    - Factures
@endsection
@section('title')
    Liste des factures

@endsection

@section('url')
    Liste des factures

@endsection
@section('url-way')
    <li>
        <a href="#">Factures</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Liste des factures</span>
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
                    <div class="caption">
                        <i class="icon-folder-alt font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Factures</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <div class="table-actions-wrapper">

                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable"
                               id="invoices_table">
                            <thead>
                            <tr role="row" class="heading">
                                <th width="20%"> Numéro facture</th>
                                <th width="10%"> Type</th>
                                <th width="20%"> Date de facturation</th>
                                <th width="15%"> Etat</th>
                                <th width="25%"> Total</th>
                                <th width="10%"> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->prefix.$invoice->invoice_number }}</td>
                                    <td>{{ $invoice->type->value }}</td>
                                    <td>{{ $invoice->invoice_date ? $invoice->invoice_date->format('d/m/Y'):'' }}</td>
                                    <td>@if( $invoice->state->value =='créée')<span
                                                class="label label-sm label-default">créée</span>@endif
                                        @if( $invoice->state->value =='envoyée')<span class="label label-sm label-info">envoyée</span>@endif
                                        @if( $invoice->state->value =='échouée')<span
                                                class="label label-sm label-danger">échouée</span>@endif
                                        @if( $invoice->state->value =='en paiement')<span
                                                class="label label-sm label-warning">en paiement</span>@endif
                                        @if( $invoice->state->value =='payée')<span
                                                class="label label-sm label-success">payée</span>@endif

                                    </td>
                                    <td>{{ $invoice->invoice_total != '' ? $invoice->invoice_total.' dt' : '' }} </td>
                                    <td style="text-align: center"><a class="btn btn-sm blue"
                                                                      href="{{ url('/invoices/'.$invoice->id) }}">Détails</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>

    </div>

@endsection

@section('footer')
    <script>
        $("#invoices_table").DataTable({
            "columnDefs": [

                {
                    "targets": [2],
                    "type": 'date-eu'
                }
            ],
            responsive : true
        });
    </script>

@endsection

