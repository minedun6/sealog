@extends('layouts/main')
@section('title')
    Ajouter un paiement
@endsection
@section('second-title')
    - paiements
@endsection
@section('url')
    Ajouter un paiement
@endsection
@section('url-way')
    <li>
        <a href="#">Facture</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Ajouter un paiement</span>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 ">


            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-plus font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Ajouter un paiement pour facture# {{ $invoice->prefix.$invoice->invoice_number }} </span>
                    </div>

                </div>
                <div class="portlet-body form">
                    <form role="form" action="{{ url('/invoices/payment/'.$invoice->id) }}" method="post"
                          id="form_client">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-info">
                                        <input name="amount" type="text" class="form-control" id="amount_id"
                                               placeholder="">
                                        <label for="form_control_1">Montant</label>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-info">
                                        <input name="ref" type="text" class="form-control"
                                               placeholder="">
                                        <label for="form_control_1">Référence</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-info">
                                        <select name="payment_type" class="form-control">
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="form_control_1">Type de paiment</label>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                            </div>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <div class="form-actions noborder">
                                        <button type="submit" class="btn blue">Ajouter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->


            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->

            <!-- END SAMPLE FORM PORTLET-->
        </div>
        <div class="col-md-1"></div>
    </div>

@endsection

@section('footer')


    <script type="text/javascript" src="{{ URL::asset('assets/scripts/form-val.js') }}"></script>


@endsection

