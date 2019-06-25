@extends('layouts/main')
@section('title')
    Détails facture
@endsection
@section('second-title')
    - Factures
@endsection
@section('url')
    Détails facture
@endsection
@section('url-way')
    <li>
        <a href="#">Facture</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Détails</span>
    </li>
@endsection

@section('content')

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-plus font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Facture #{{ $invoice->prefix.$invoice->invoice_number }} </span>
                @if( $invoice->state->value =='créée')<span class="label label-sm label-default">créée</span>@endif
                @if( $invoice->state->value =='envoyée')<span class="label label-sm label-info">envoyée</span>@endif
                @if( $invoice->state->value =='échouée')<span class="label label-sm label-danger">échouée</span>@endif
                @if( $invoice->state->value =='en paiement')<span
                        class="label label-sm label-warning">en paiement</span>@endif
                @if( $invoice->state->value =='payée')<span class="label label-sm label-success">payée</span>@endif
            </div>
            <div class="actions">
                <a class="btn btn-sm purple-medium" data-target="#msg_form" data-toggle="modal"></i>
                    Changer état</a>
                <a class="btn btn-sm blue-soft" href="{{ url('/invoices/edit/'.$invoice->id) }}"><i
                            class="fa fa-edit"></i>
                    Editer</a>
                <a class="btn btn-sm red" href="{{ url('/invoices/delete/'.$invoice->id) }}"><i
                            class="fa fa-remove"></i>
                    Supprimer</a>
                <a class="btn btn-sm green-soft" href="{{ url('/invoices/payment/'.$invoice->id) }}"><i
                            class="glyphicon glyphicon-usd"></i>
                    Ajouter un paiment</a>
                <a class="btn btn-sm red-haze" href="{{ url('invoices/print/'.$invoice->id) }}"><i
                            class="fa fa-print"></i>
                    Imprimer</a>
                @if($invoice->folder)
                    @if($invoice->folder->operation_type == 'import')
                        <a class="btn btn-sm red-haze" href="{{ url('/notice/arrival/'.$invoice->id) }}">Avis</a>
                    @elseif($invoice->folder->operation_type == 'export')
                        <a class="btn btn-sm red-haze" href="{{ url('/notice/boarding/'.$invoice->id) }}">
                            Avis</a>
                    @endif
                    <a class="btn btn-sm yellow-crusta" href="{{ url('/folder/'.$invoice->folder_id) }}">
                        Dossier</a>
                @endif
            </div>
        </div>
        <div class="portlet-body form">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#portlet_tab_1_1" data-toggle="tab" aria-expanded="true"> Détails </a>
                </li>

                <li class="">
                    <a href="#portlet_tab_1_3" data-toggle="tab" aria-expanded="false"> Historique de paiement </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="portlet_tab_1_1">
                    <form role="form" action="" method="post">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Client : </b></label></br>
                                        <label class="control-label">{{ $invoice->client->name }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Date de facturation :</b></label></br>
                                        <label class="control-label">{{ $invoice->invoice_date ? $invoice->invoice_date->format('d/m/Y') : '' }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Numéro facture :</b></label></br>
                                        <label class="control-label">#{{ $invoice->invoice_number }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Dossier :</b></label></br>
                                        <label class="control-label">{{ $invoice->folder ? $invoice->folder->folder_name.$invoice->folder->folder_number : '' }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>date d'échéance :</b></label></br>
                                        <label class="control-label">{{ $invoice->deadline ? $invoice->deadline->format('d/m/Y') : '' }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Bon de commande :</b></label></br>
                                        <label class="control-label">#{{ $invoice->order_form }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Type facture :</b></label></br>
                                        <label class="control-label">{{ $invoice->type->value }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 50px">
                                <div class="col-lg-8 col-sm-8 col-sm-offset-4" style="padding-top: 10px">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 20px;">
                            </div>
                            <div class="row">
                                <table class="table table-striped table-hover table-bordered" id="my_table">
                                    <thead>
                                    <tr>
                                        <th width="30%"> Description</th>
                                        <th width="15%"> Coût unitaire</th>
                                        <th width="15%"> Quantité</th>
                                        <th width="15%"> TVA</th>
                                        <th width="15%"> Remise (%)</th>
                                        <th width="10%"> Total (dt)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoice->details as $detail)
                                        <tr>
                                            <td>{{ $detail->description }}</td>
                                            <td>{{ $detail->price }}</td>
                                            <td>{{ $detail->quantity }}</td>
                                            <td>{{ $detail->tva }} %</td>
                                            <td>{{ $detail->discount }} %</td>
                                            <td>{{ $detail->total }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td class="hide-border" colspan="3" rowspan="8" style="vertical-align:top">
                                            <br>
                                            <div role="tabpanel">
                                                <ul class="nav nav-pills">
                                                    <li class="active">
                                                        <a href="#tab_2_1" data-toggle="tab"> Termes et conditions </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_2_2" data-toggle="tab"> Notes </a>
                                                    </li>

                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active in" id="tab_2_1">
                                                <textarea class="form-control" rows="4"
                                                          cols="1">{!! strip_tags($invoice->termes) !!}</textarea>
                                                    </div>
                                                    <div class="tab-pane fade" id="tab_2_2">
                                                <textarea class="form-control" rows="4"
                                                          cols="1">{!! strip_tags($invoice->client_notes) !!}</textarea>
                                                    </div>

                                                </div>

                                            </div>

                                        </td>
                                        <td class="hide-border" style="display:none">
                                        </td>
                                        <td colspan="2">Sous total (dt)</td>
                                        <td style="text-align: right"><span
                                                    id="subtotal">{{ round($invoice->subtotal, 3) }}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="display:none" class="hide-border">
                                        </td>
                                        <td colspan="2">
                                            Total remises
                                        </td>
                                        <td style="text-align: right"><span>{{ $invoice->total_discount }} </span></td>
                                    </tr>
                                    <tr>
                                        <td style="display:none" class="hide-border">
                                        </td>
                                        <td colspan="2">
                                            Total après remises
                                        </td>
                                        <td style="text-align: right">
                                            <span>{{ round($invoice->subtotal - $invoice->total_discount, 3) }} </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="display:none" class="hide-border">
                                        </td>
                                        <td colspan="2">Total taxes (dt)</td>
                                        <td style="text-align: right">
                                            <span>{{ round($invoice->invoice_total + $invoice->total_discount - $invoice->subtotal - 0.5, 3) }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="display:none" class="hide-border">
                                        </td>
                                        <td colspan="2">
                                            Timbre fiscal (dt)
                                        </td>
                                        <td style="text-align: right"><span>0.5</span></td>
                                    </tr>

                                    <tr style="font-size:1.05em">
                                        <td class="hide-border" style="display:none">
                                        </td>
                                        <td class="hide-border" colspan="2"><b>Total facture (dt)</b></td>
                                        <td class="hide-border" style="text-align: right">
                                            <span>{{ $invoice->invoice_total }}</span></td>
                                    </tr>
                                    <tr style="font-size:1.05em">
                                        <td class="hide-border" style="display:none">
                                        </td>
                                        <td class="hide-border" colspan="2">Somme payée (dt)</td>
                                        <td class="hide-border" style="text-align: right">
                                            <span>{{ $invoice->payed_sum }}</span>
                                        </td>
                                    </tr>
                                    <tr style="font-size:1.05em">
                                        <td class="hide-border" style="display:none">
                                        </td>
                                        <td class="hide-border" colspan="2">Reste à payer (dt)</td>
                                        <td class="hide-border" style="text-align: right">
                                            <span>{{ $invoice->invoice_total - $invoice->payed_sum }}</span></td>
                                    </tr>
                                    <tr style="font-size:1.05em">
                                        <td class="hide-border" style="display:none">
                                        </td>
                                        <td class="hide-border" colspan="1">
                                            Total en lettres
                                        </td>
                                        <td class="hide-border" style="text-align: right" colspan="5">
                                            <span>{{ $invoice->total_in_chars }}</span></td>
                                    </tr>

                                    </tfoot>
                                </table>


                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="portlet_tab_1_3">
                    <div class="portlet blue-steel box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-dollar"></i>Paiements
                            </div>
                            <div class="actions">
                            </div>
                        </div>
                        <div class="portlet-body">

                            <table class="table table-striped table-bordered table-hover"
                                   id="payment_table">
                                <thead>
                                <tr role="row" class="heading">
                                    <th style=" width : 20%;"> Numéro</th>
                                    <th style=" width : 20%;"> Montant</th>
                                    <th style=" width : 20%;"> Référence</th>
                                    <th style=" width : 20%;"> Type de paiment</th>
                                    <th style=" width : 20%;"> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoice->payments as $payment)
                                    <tr>
                                        <td>{{ $payment->payment_number }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->reference }}</td>
                                        <td>{{ $payment->type ? $payment->type->name : '' }}</td>

                                        <td style="text-align: center"><a class="btn btn-sm blue"
                                                                          href="{{ url('/invoices/payments/edit/'.$payment->id) }}">Edit</a>
                                            <a class="btn btn-sm blue"
                                               href="{{ url('/invoices/payments/delete/'.$payment->id) }}">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="msg_form" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Changer état de facture</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{ url('/invoices/update_state/'.$invoice->id) }}" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <label for="message">Etat de facture</label>
                            <select class="form-control" name="invoice_state_id" id="etat">
                                @foreach($invoice_states as $state)
                                    @if($state->id == $invoice->state_id)
                                        <option selected value="{{ $state->id }}">{{ $state->value }}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->value }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="modal-footer">
                                <button class="btn blue" type="submit">Envoyer</button>
                            </div>
                        </form>
                    </div>


                </div>
                <!-- /.modal-content -->
            </div>

        </div>
        @endsection
        @section('footer')

            <script>
                function calcul_total(x) {

                    var prixu = parseFloat(document.getElementById("prixunite[" + x + "]").value);
                    var quantite = parseFloat(document.getElementById("qte[" + x + "]").value);
                    var total = parseFloat(document.getElementById("ttl[" + x + "]").value);

                    total = (prixu * quantite);


                    document.getElementById("ttl[" + x + "]").value = total ? total : 0;
                    length = $("#my_table > tbody > tr").length;
                    var sbtotal = 0;
                    for (i = 0; i < length; i++) {
                        sbtotal = sbtotal + parseFloat(document.getElementById("ttl[" + i + "]").value);
                    }
                    document.getElementById("subtotal").textContent = sbtotal;
                }


            </script>


            <script>
                $(document).ready(function () {
                    $('.date-picker').datepicker();
                    $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
                        console.log('show tab');
                        $($.fn.dataTable.tables(true)).DataTable()
                                .columns.adjust()
                                .responsive.recalc();
                    });

                    $('#payment_table').DataTable({
                        responsive: true

                    });

                });
            </script>

@endsection