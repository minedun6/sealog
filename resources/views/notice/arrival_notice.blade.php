<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Avis</title>

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
            font-size: 7pt;
            font-weight: 200;
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

        .merch-data tbody tr:last-child {
            border-bottom: 1px solid #eee;
        }

        .merch-data thead th {
            border: 1px solid #eee;
        }

        .merch-data td:last-child, .merch-data tfoot {
            border: none;
        }

        .section {
            margin-bottom: 1em;
        }

        .section-payment {
            margin-bottom: 1em;
            margin-top: 4%;
        }

        .section-payment label {
            font-weight: bold;
            font-size: 120%;

        }

        .logo {
            display: block;
            margin-top: 15px;
            padding-top: 15px;
            margin-bottom: 5em;

        }

        .logo img {
            width: 200px;
            text-align: left;
            margin-top: 3%;

        }

        .logo .info {
            float: right;
            text-align: left;
            margin-right: 0%;

        }

        .logo .info span {
            padding-top: 10px;
            line-height: 1.8;
            text-transform: uppercase;

        }

        .logo .info h2 {
            padding-top: 10px;
            line-height: 1.8;
            text-transform: uppercase;
            margin: 0 20px 0 0;

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

        .title {
            text-align: center;
            margin-bottom: 10px;
        }

        a {
            color: #c4443d;
            text-decoration: underline;
        }

        .box {
            border-right: 1px solid #1f5a91;
            width: 47%;
            float: left;
            padding-top: 4px;
        }

        .clear {
            padding-top: 30px;
            overflow: hidden;
            width: 100%;
        }

        .box2 {

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

    <img src="{!! url('/assets/layouts/layout/img/sealog-logo.png') !!}" alt="Tipic"/>

    <div class="info">
        <h2 style="padding-right: 0%">SEALOG</h2>
        <span id="entreprise"></br>
            TEL : +216 71 449 660</br>
            FAX : +216 71 449 734</br>
            E-MAIL :  contact@sealog-tunisia.com</span></br>

    </div>


</div>

<div class="title">
    <h2 style="margin: 0;">Avis d'arrivée</h2>
</div>


<table class="clear">
    <tbody>
    <tr>
        <td class="box">
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
                            <td>BUREAU DOUANE:
                            </td>
                            <td>{{ $folder->rubric_number }}</td>
                        </tr>
                        <tr>
                            <td>ESCALE DOUANE:
                            </td>
                            <td>{{ $folder->escale_number }}</td>
                        </tr>
                        @if(is_object($folder->maritimeFolder))
                            <tr>
                                <td>B/L:
                                </td>
                                <td>{{ $folder->maritimeFolder->bl_number }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </td>
        <td class=" box2">
            <div class="section">
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
                            <td>POUR :</td>
                            <td>{{ $folder->client ? $folder->client->name : '' }}</td>
                        </tr>
                        <tr>
                            <td>RUE :</td>
                            <td>{{ $folder->client ? $folder->client->address : '' }}</td>

                        </tr>
                        <tr>
                            <td>NUMERO
                                :
                            </td>
                            <td>{{ $folder->client ? $folder->client->phone : '' }}</td>
                        </tr>
                        <tr>
                            <td>VILLE :</td>
                            <td>1053 TUNIS</td>
                        </tr>
                        <tr>
                            <td>PAYS :</td>
                            <td></td>
                        </tr>


                        </tbody>

                    </table>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>

<table style="margin-top: 20px" class="clear">
    <tbody>
    <tr>
        <td class="box">


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
                            <td>Code Client :
                            </td>
                            <td> {{ $folder->client ? $folder->client->code : ''  }}</td>
                        </tr>

                        <tr>
                            <td>Numero SH:

                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                Ligne:
                            </td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </td>
        <td class="box2">
            <div class="section">
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
                            <td>Rubrique :</td>
                            <td>
                                {{ $folder->rubric_number }}
                            </td>
                        </tr>
                        @if(is_object($folder->maritimeFolder))
                            <tr>
                                <td>Navire
                                    :
                                </td>
                                <td>{{ $folder->maritimeFolder->ship }}</td>
                            </tr>
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
@if(count($folder->articles) > 0)
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

                @foreach($folder->articles as $article)
                    <tr>
                        <td>{{ $article->container_number }}</td>
                        <td>{{ $article->container_mark }}</td>
                        <td>{{ $article->packages_number }}</td>
                        <td>{{ $article->designation }}</td>
                        <td>{!! $article->gross_weight != 0 ? $article->gross_weight.'kg' : '' !!}</td>
                        <td>{!! $article->volume != 0 ? $article->volume."m<sup>3</sup>" : ''!!}</td>
                    </tr>
                @endforeach
                </tbody>


            </table>
        </div>
    </div>
@endif
@if(count($invoice->details) > 0)
    <div class="section" style="margin-top: 5%">
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
                        <td>
                            {{ $detail->tva != '' ? $detail->tva.'%': '' }}
                        </td>
                        <td>
                            {{ $detail->price }}
                        </td>
                        <td>
                            {{ $detail->quantity }}
                        </td>
                        <td>
                            {{ $detail->price * $detail->quantity }}
                        </td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <td class="bottomleft" colspan="3"></td>
                    <th class="right">Total a payer</th>
                    <td class="right">
                        <div>{{ $invoice->invoice_total }} TND</div>
                    </td>
                </tr>

                </tfoot>
            </table>
        </div>
    </div>
    <div class="section-payment">
        <label>Somme en lettres : </label><span
                id="total">{!! strip_tags($invoice->total_in_chars) !!}</span></br>
    </div>
@endif
<div style="margin-top: 1em;">
    <span style="line-height: 1.8em;">Nous vous prions de bien vouloir retirer le bon à délivrer dés la réception de l'avis d'arrivée et ce sur présentation du connaissement original .
        Notre responsabilité se trouve entièrement dégagée au cas ou la marchandise n'est pas retirée dans le delai réglémentaire prévu par le code des douanes. La marchandise sera vendue sans préavis
        par la douane.
    </span>
    </br>
</div>
<div class="section" style="margin-top: 3em;">

    <span style="float: right;margin-right: 2%">TUNIS {{ \Carbon\Carbon::now()->format('d M Y') }}</span>
</div>

</body>
</html>