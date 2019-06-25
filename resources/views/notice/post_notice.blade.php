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

        .terms, .notes {
            padding: 8pt 0 0;
            font-size: 7pt;
            line-height: 9pt;
        }

        .section-intro {
            margin-bottom: 2em;
            display: block;
        }

        .section-intro span {
            font-size: medium;
        }

        .section-intro h2 {
            margin-bottom: 10px;
        }

        .section-intro label {
            text-transform: uppercase;
            font-size: 180%;
            font-weight: bold;
        }

        .instruction {
            margin-top: 30px;

        }

        .instruction span {
            font-size: medium;
        }

        .logo {
            display: block;
            margin-top: 15px;
            padding-top: 15px;
            margin-bottom: 10em;

        }

        .logo img {
            width: 200px;
            text-align: left;
            margin-top: 2%;
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

        a {
            color: #c4443d;
            text-decoration: underline;
        }

        .payment-data tfoot tr, .payment-data .bottomleft {

        }

        table td {

        }

        body {
            margin: 6px;
        }

        .mytable {
            border: 1px solid;
            width: 100%;
            border-collapse: collapse;
            cellspacing: "0";
            word-wrap: break-word;
        }

        .mytable td {
            border: 1px solid;
            text-align: center;
            font-size: 150%;
        }

        .mytable th {
            border: 1px solid;
            text-align: center;
            font-size: 150%;
            valign: "middle";
        }

        .mytable tr {
            border: 1px solid;
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

            .seperator {
                background-color: #1f5a92;
                height: 3px;
                width: 100%;
                display: block;
                margin-top: 0px;
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

<div class="section-intro">
    <h2>PREAVIS D'ARRIVEE </br>
        DATE : {{ \Carbon\Carbon::now()->format('d/m/Y') }}
    </h2>
    @if(is_object($folder->maritimeFolder))
        <span>Nous avons le plaisir de vous informer que le navire : {{ $folder->maritimeFolder->ship }} en provenance de: {{ $folder->maritimeFolder->shipment_place }}
            est prévu à: {{ $folder->maritimeFolder->landing_place }} avec à bord les marchandises détaillées comme suit pour votre compte :</span>
    @elseif(is_object($folder->arialFolder))
        <span>Nous avons le plaisir de vous informer que le vol N° : {{ $folder->arialFolder->flight_number }}
            en provenance de: {{ $folder->arialFolder->shipment_place }}
            est prévu à: {{ $folder->arialFolder->landing_place }} avec à bord les marchandises détaillées comme suit pour votre compte :</span>
    @elseif(is_object($folder->roadFolder))
        <span>Nous avons le plaisir de vous informer que le camion : {{ $folder->roadFolder->truck }}
            en provenance de: {{ $folder->roadFolder->shipment_place }}
            est prévu à: {{ $folder->roadFolder->landing_place }} avec à bord les marchandises détaillées comme suit pour votre compte :</span>
    @endif
</div>

<div class="section-intro">
    <label>BLN :</label></br>
    <label>FOURNISSEUR : </label></br>
    <label>P/C : </label></br>

</div>
@if(count($folder->articles) > 0)
    <div class="section">
        <table class="mytable">
            <thead>
            <tr>
                <th>
                    Marques et Numéros
                </th>
                <th>
                    Colis
                </th>
                <th>
                    Désignation Marchandises
                </th>
                <th>
                    Poids
                </th>
            </tr>
            </thead>
            <tbdoy>
                @foreach($folder->articles as $article)
                    <tr>
                        <td>
                            {{ $article->container_mark.' '.$article->container_number }}
                        </td>
                        <td>
                            {{ $article->packages_number }}
                        </td>
                        <td>
                            {{ $article->designation }}
                        </td>
                        <td>
                            {!! $article->gross_weight > 0 ? $article->gross_weight.'kg' : $article->volume.'m <sup>3</sup>'  !!}
                        </td>
                    </tr>
                @endforeach
            </tbdoy>
        </table>
    </div>
@endif
<div class="instruction">
    <h3 style="font-weight: bold">Instructions :</h3>
    <span>
        Toute réclamation concernant la nature, le poids, le nombre de colis, nom et adresse, ou autres erreurs éventuelles doit être signalée par écrit nos services contre décharge
        au plus tard le jour d'arrivée du navire.Passé ce delai toute modification sera à la charge du réceptionnaire. </br>
        Veuillez <b>SVP</b> nous indiquer le nom du transitaire mandaé eventuellement par ses soiens pour effectuer le timbrage pour votre compte.</br>
        </br>
        Meilleures Salutations</br>
        Service Import
    </span>

</div>


</body>
</html>