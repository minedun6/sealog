<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Facture</title>

    <style type="text/css">
        .seperator {
            background-color: #1f5a92;
            height: 3px;
            width: 100%;
            display: block;
            margin-top: 0px;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        body, input, textarea {
            font-family: helvetica, sans-serif;
            font-size: 8pt;
            font-weight: 600;
            margin-top: 0px;
        }

        body {
            color: #464648;
            margin: 2cm 1.5cm;
        }

        h2 {
            color: #535255;
            font-size: 16pt;
            font-weight: 100;
            line-height: 16pt;
            margin: 0 225px 0 0;
        }

        h3 {
            color: #535255;
            font-size: 11pt;
            font-weight: 100;
            margin-top: 2pt;
        }

        table th.right,
        table td.right {
            text-align: right;
        }

        .customer-data {
            padding: 1em 0;
        }

        .customer-data table {
            width: 100%;
        }

        .customer-data table td {
            width: 50%;
        }

        .customer-data td span {
            display: block;
            margin: 0 0 5pt;
            padding-bottom: 2pt;
            border-bottom: 1px solid #DCDCDC;
        }

        .customer-data td span.left {
            margin-right: 1em;
        }

        .customer-data label {
            display: block;
            font-weight: bold;
            font-size: 8pt;
        }

        .payment-data {
            padding: 1em 0;
        }

        .payment-data table {
            width: 100%;
        }

        .payment-data thead {
            border-bottom: 1px solid #eee;
        }

        .payment-data th,
        .payment-data td {
            line-height: 1em;
            padding: 3pt 5pt 3pt;
            border-right: 1px dashed #DCDCDC;
        }

        .payment-data th {
            border: 1px solid #efefef;
            border-style: none solid;
        }

        .payment-data th {
            font-weight: bold;
            white-space: nowrap;
        }

        .payment-data th:first-child, .payment-data th:last-child {
            border: none;
        }

        .payment-data .bottomleft {
            border-color: white;
            border-top: inherit;
            border-right: inherit;
            border-left: 1px solid #eee
        }

        .payment-data span.tax {
            display: block;
            white-space: nowrap;
        }

        .payment-data tbody tr:last-child {
            border-bottom: 1px solid #eee;
        }

        .payment-data td:last-child, .payment-data tfoot {
            border: none;
        }

        .terms, .notes {
            padding: 8pt 0 0;
            font-size: 7pt;
            line-height: 9pt;
        }

        .section {
            margin-bottom: 1em;
            margin-top: 1em;
        }

        .logo {
            margin-top: 0.2em;
            display: inline
        }

        .logo img {
            width: 120px;
            text-align: left;
            margin-bottom: 25px;
        }

        .pied-de-page {
            padding: 5px;
            position: fixed;
            height: 50px;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            clear: both;
        }

        .logo .title {
            width: 200px;
            text-align: center;
            padding: 0px;
            /*margin-top: 25px;
           // margin-left: 300px;*/
            margin: 0 auto;
        }

        .companyName {
            color: #555;
            font-weight: bold;
        }

        a {
            color: #c4443d;
            text-decoration: underline;
        }

        .box {
            border-right: 1px solid #1f5a91;
            width: 47%;
            float: left;
            padding-top: 2.8%;
        }

        .clear {
            padding-top: 30px;
            overflow: hidden;
            width: 100%;
        }

        .box2 {
            padding: 10pt 0 0 10pt;
            float: right;
            width: 50%;
        }

        .payment-data tfoot tr, .payment-data .bottomleft {
            border: none;
        }

        table td {
            border: none;
        }

        body {
            margin: 6px;
        }
        .infos{
            margin-top: 8%;
        }
    </style>

    <style type="text/css">
        /* CSS code for printing */
        @media print {
            body {
                margin: auto;

            }

            .section {
                page-break-inside: avoid;
            }

            div#sfWebDebug {
                display: none;
            }

            .pied-de-page {
                padding: 5px;
                position: fixed;
                height: 50px;
                bottom: 0;
                left: 0;
                width: 100%;
                text-align: center;
                clear: both;
            }
        }
    </style>
</head>
<body>

<div class="seperator"></div>

<div class="logo">
    <div style="float: left"><img src="<?php echo public_path('assets/layouts/layout/img/sealog-logo.png')?>"
                                  alt="Sealog"/></div>
    <center>
        <div class="title"><h1>Facture {{ $invoice->type->value }}
                N° {{ $invoice->prefix.$invoice->invoice_number }}</h1></div>
    </center>
</div>

<div class="infos">
<table class="clear">
    <tbody>
    <tr>
        <td class="box">
            <div class="h2">
                <h3>Date: {{ $invoice ? $invoice->invoice_date->format('d/m/Y') : '' }}</h3>
            </div>

            <div class="section">
                <div class="company-data">

                    <table width="100%">

                        <thead>
                        <tr>
                            <th width="20%"></th>
                            <th width="30%"></th>
                            <th width="25%"></th>
                            <th width="25%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><b>Dossier N: </b>
                            </td>
                            <td>{{ $invoice->folder ? $invoice->folder->folder_name.$invoice->folder->folder_number : ''}}</td>
                        </tr>

                        <tr>
                            @if($invoice->folder && $invoice->folder->type == 'maritime')
                                <td><b>Navire: </b>
                                </td>
                                <td> {{ $invoice->folder->maritimeFolder->ship }}</td>
                            @endif
                            <td><b>DU :</b>
                            </td>
                            <td>
                                @if($invoice->folder)
                                    {{ $invoice->folder->folder_date ? $invoice->folder->folder_date->format('Y-m-d') :'' }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Escale/Rub: </b>
                            </td>
                            <td>{{ $invoice->folder ? $invoice->folder->escale_number.'/'.$invoice->folder->rubric_number : ''}}</td>
                        </tr>
                        <tr>
                            <td><b>BL:</b>

                            </td>
                            <td>{{ $invoice->folder ? ($invoice->folder->type == 'maritime' ? $invoice->folder->maritimeFolder->bl_number : '') : '' }}</td>
                        </tr>
                        <tr>
                            <td><b>POL :</b></td>
                            <td>
                                @if($invoice->folder && $invoice->folder->type == 'maritime')
                                    {{ $invoice->folder->maritimeFolder->shipment_place }}
                                @endif
                            </td>
                            <td><b>POD :</b></td>
                            <td>
                                @if($invoice->folder && $invoice->folder->type == 'maritime')
                                    {{ $invoice->folder->maritimeFolder->landing_place }}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </td>
            <td class=" box2">
                <div class="section">
                    <h3>Adressé à:</h3>

                    <div class="company-data">

                        <table width="100%">
                            <thead>
                            <tr>
                                <th width="25%"></th>
                                <th width="75%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Nom société :</td>
                                <td>{{ $invoice->client ? $invoice->client->name : '' }}</td>
                            </tr>
                            <tr>
                                <td>Matricule fiscal
                                    :
                                </td>
                                <td>{{ $invoice->client ? $invoice->client->matricule_fiscale : '' }}</td>
                            </tr>
                            <tr>
                                <td>Adresse :</td>
                                <td>{!! $invoice->client ? strip_tags($invoice->client->address) : '' !!}</td>

                            </tr>
                            <tr>
                                <td>Contact
                                    :
                                </td>
                                <td>{!! $invoice->client ? strip_tags($invoice->client->contact_name) : '' !!}</td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td>{{ $invoice->client ? $invoice->client->email : '' }}</td>
                            </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
@if($invoice->folder && count($invoice->folder->articles) > 0)
    <div class="section" style="margin-top: 5%">
        <h3>Marchandises</h3>
        <div class="merch-data">
            <table>
                <thead>
                <tr>
                    <th> Numéro conteneur</th>
                    <th> Type</th>
                    <th> Nombre de colis</th>
                    <th> Désignations</th>
                    <th> Poids brut (KG)</th>
                    <th> Volume (m³)</th>
                </tr>
                </thead>
                <tbody>
                @if($invoice->folder)
                    @foreach($invoice->folder->articles as $article)
                        <tr>
                            <td>{{ $article->container_number }}</td>
                            <td>{{ $article->container_mark }}</td>
                            <td>{{ $article->packages_number }}</td>
                            <td>{{ $article->designation }}</td>
                            <td>{!! $article->gross_weight != 0 ? $article->gross_weight.'kg' : '' !!}</td>
                            <td>{!! $article->volume != 0 ? $article->volume."m<sup>3</sup>" : ''!!}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>


            </table>
        </div>
    </div>
@endif
<div class="section">
    <h3>Détails</h3>
    <div class="payment-data">
        <table>
            <thead>
            <tr>
                <th width="55%">Désignation</th>
                <th width="3%" class="right">TVA</th>
                <th width="15%" class="right">P.U HT</th>
                <th width="2%" class="right">Qté</th>
                <th width="23%" class="right">Total HT</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoice->details as $detail)
                <tr>
                    <td>
                        {{ $detail->description }}
                    </td>
                    <td class="right">
                        <span class="tax">{{ $detail->tva }} %</span>

                    </td>
                    <td class="right">

                        <div>{{ $detail->price }} TND</div>
                    </td>
                    <td class="right">
                        {{ $detail->quantity }}
                    </td>
                    <td class="right">
                        <div>{{ $detail->price * $detail->quantity }} TND</div>
                    </td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td class="right"></td>
                    <td class="right"></td>
                    <td class="right"></td>
                    <td class="right"></td>
                    <td class="right"></td>
                </tr>
            </tbody>
            @endforeach
            <tfoot>
            <tr>
                <td class="bottomleft" colspan="3"></td>
                <th class="right">Total HT</th>
                <td class="right">
                    <div>{{ $invoice->subtotal }} TND</div>
                </td>
            </tr>
            <tr>
                <td class="bottomleft" colspan="3"></td>
                <th class="right">Total Taxes</th>
                <td class="right">
                    <div>{{ $invoice->invoice_total + $invoice->total_discount - $invoice->subtotal - 0.5 }} TND</div>
                </td>
            </tr>
            <tr>
                <td class="bottomleft" colspan="3"></td>
                <th class="right">Timbre Fiscal</th>
                <td class="right">
                    <div>0.5 TND</div>
                </td>
            </tr>
            <tr class="strong">
                <td class="bottomleft" colspan="3"></td>
                <th class="right">Total TTC</th>
                <td class="right">
                    <div>{{ $invoice->invoice_total }} TND</div>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="section">
    Arrêté à {{ $invoice->total_in_chars }} Dinars
    </br>
</div>
<div class="section">
    <h3 style="margin-bottom: 0px;padding-bottom: 0px;">Historique des paiements</h3>
    <div class="notes" style="margin-top: 0px;padding-top: 0px;">
        @foreach($invoice->payments as $payment)
            <p>{!! $payment->created_at->format('d/m/Y')!!} {!! $payment->amount !!} TND ({!! $payment->type->name !!} ,
                REF: {!! $payment->reference !!} )</p> </br>
        @endforeach
    </div>
</div>
<div class="section">
    <h3>Termes et conditions</h3>
    <div class="terms">
        {!! $invoice->termes !!}
        </br>
    </div>
    <div class="notes">{!! $invoice->client_notes !!}</div>
    </br>
</div>

</body>
</html>